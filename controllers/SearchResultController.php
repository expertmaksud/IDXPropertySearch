<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchResultController
 *
 * @author maksud ul alam
 */
if (!class_exists("SearchResultController")) {

    class SearchResultController {

        private static $instance;
        private $dbAceesHelper;
        //Quick Search Form properties
        private $searchParam;

        private function __construct() {
            $this->dbAceesHelper = DBAccessHelper::getInstance();
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new SearchResultController();
            }
            return self::$instance;
        }

        public function index() {
            ob_start();
            require(IPS_ROOT_DIR . "/views/searchresult/index.php");
            //return "Checked index";
            return ob_get_clean();
        }

        public function handleSubmit() {

            $this->searchParam = array('locations' => $_GET['ips_locations'],
                'propertyType' => $_GET['ips_propert_type'],
                'minPrice' => floatval($_GET['ips_minprice']),
                'maxPrice' => floatval($_GET['ips_maxprice']),
                'minSqft' => intval($_GET['ips_sqft']),
                'beds' => $_GET['ips_bed'],
                'baths' => $_GET['ips_bath']);

            $searchResult = $this->dbAceesHelper->getQuickSearchResult($this->searchParam);

            return $searchResult;

            /* foreach ($this->searchParam['locations'] as $loc) {
              echo $loc;
              } */
        }

        public function handleWidgetSubmit() {

            $this->searchParam = array('locations' => $_GET['cityOrZip'],
                'minPrice' => floatval($_GET['minListPrice']),
                'maxPrice' => floatval($_GET['maxListPrice']),
                'beds' => $_GET['bedrooms'],
                'baths' => $_GET['bathCount']);

            $searchResult = $this->dbAceesHelper->getWidgetQuickSearchResult($this->searchParam);

            return $searchResult;
        }
        
        public function handleHeaderSubmit()
        {
            $this->searchParam = array('locations' => $_GET['city_zip_add']);

            $searchResult = $this->dbAceesHelper->getWidgetQuickSearchResult($this->searchParam);

            return $searchResult;
        }

    }

}