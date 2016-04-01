<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InfrastructureHelper
 *
 * @author Maksud Ul Alam
 */
if (!class_exists("InfrastructureHelper")) {

    class InfrastructureHelper {

        private static $instance;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new InfrastructureHelper();
            }
            return self::$instance;
        }

        public function createNewPage($slug, $title, $page_content) {

            // Initialize the page ID to -1. This indicates no action has been taken.
            $post_id = -1;

            // Setup the author, slug, and title for the post

            $author_id = 1;

            // If the page doesn't already exist, then create it

            if (null == get_page_by_title($title)) {

                $catObj = get_category_by_slug('iwh-search-category');

                $catId = $catObj ? $catObj->term_id : 1;
                // Set the post ID so that we know the post was created successfully

                $post_id = wp_insert_post(
                        array(
                            'comment_status' => 'closed',
                            'ping_status' => 'closed',
                            'post_author' => $author_id,
                            'post_name' => $slug,
                            'post_title' => $title,
                            'post_content' => $page_content,
                            'post_status' => 'publish',
                            'post_type' => 'page',
                            'post_category' => array($catId)
                        )
                );
                // Otherwise, we'll stop
            } else {
                // Arbitrarily use -2 to indicate that the page with the title already exists
                $post_id = -2;
            }

            return $post_id;
        }

        public function onPluginActivation() {

            //Create Quick search page
            $qsPageId = $this->createNewPage("IWH Quick Search", "Quick Search", "[ips_quick_search]");
            if ($qsPageId > 0) {
                delete_option(IPropertySearchConfig::quickSearchPageName);
                add_option(IPropertySearchConfig::quickSearchPageName, $qsPageId, '', 'yes');
            }

            //add after quick serch page so quick search not able to add this 
            wp_insert_term('Propert Search Category', 'category', array(
                'description' => 'Propert Search category.',
                'slug' => 'iwh-search-category'
                    )
            );
            //Create Propert details page
            $pageId = $this->createNewPage("IWH Property Details", "Property Details", "[ips_details_result]");
            if ($pageId > 0) {
                delete_option(IPropertySearchConfig::detailPageName);
                add_option(IPropertySearchConfig::detailPageName, $pageId, '', 'yes');
            }


            //Create Quick search result page
            $srPageId = $this->createNewPage("IWH Search Result", "Search Result", "[ips_search_result]");
            if ($srPageId > 0) {
                delete_option(IPropertySearchConfig::searchResultPageName);
                add_option(IPropertySearchConfig::searchResultPageName, $srPageId, '', 'yes');
            }
        }

        public function onPluginDeactivation() {
            //Delete details page info from post and option
            $detailPageId = get_option(IPropertySearchConfig::detailPageName);
            if ($detailPageId) {
                wp_delete_post($detailPageId, true);
                delete_option(IPropertySearchConfig::detailPageName);
            }

            //Delete quick search page info from post and option
            $searchPageId = get_option(IPropertySearchConfig::quickSearchPageName);
            if ($searchPageId) {
                wp_delete_post($searchPageId, true);
                delete_option(IPropertySearchConfig::quickSearchPageName);
            }

            //Delete result search page info from post and option
            $resultPageId = get_option(IPropertySearchConfig::searchResultPageName);
            if ($resultPageId) {
                wp_delete_post($resultPageId, true);
                delete_option(IPropertySearchConfig::searchResultPageName);
            }

            //Deleting the category
            $catObj = get_category_by_slug('iwh-search-category');
            if ($catObj) {
                wp_delete_term($catObj->term_id, 'category');
            }
        }

        public function addNewRewriteRule() {
            //Rewrite url rule for details page
            add_rewrite_tag('%listingID%', '([^/]*)');

            add_rewrite_rule('^' . IPropertySearchConfig::propertyDetailsBaseUri . '/([^/]*)$', 'index.php?listingID=$matches[1]', 'top');
        }

    }

}
