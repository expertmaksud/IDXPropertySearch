<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DetailsResultContoller
 *
 * @author Maksud-Ul-Alam
 */
if (!class_exists("DetailsResultController")) {

    class DetailsResultController {

        private static $instance;
        private $dbAceesHelper;

        private function __construct() {
            $this->dbAceesHelper = DBAccessHelper::getInstance();
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new DetailsResultController();
            }
            return self::$instance;
        }

        public function index() {
            ob_start();
            require(IPS_ROOT_DIR . "/views/details/index.php");
            //return "Checked index";
            return ob_get_clean();
        }

        public function getListingID() {
            global $wp_query, $wp_rewrite;

            if ($wp_rewrite->using_permalinks()) { // WordPress using Pretty Permalink structure 
                $searchKey = $wp_query->query_vars['listingID'];
            } else { // WordPress using default pwrmalink structure like www.site.com/wordpress/?p=123
                $searchKey = $_GET['listingID']; // now we can get variables from $_GET variable
            }

            return $searchKey;
        }

        public function getAllRules() {
            global $wp_rewrite;
            print_r($wp_rewrite->rules);
        }

        public function getPropertInfoByListingNumber($listingId) {
            $propertyInfo = $this->dbAceesHelper->getPropertyDetailsInfo($listingId);
            return $propertyInfo;
        }

        public function getImagesByListingNumber($listingId) {
            $propertyImages = $this->dbAceesHelper->getListingImages($listingId);
            return $propertyImages;
        }

        public function sendMailToAgentGroup() {

            $nonce = $_POST['postNonce'];

            // check to see if the submitted nonce matches with the
            // generated nonce we created earlier
            if (!wp_verify_nonce($nonce, 'ipsajax-post-nonce')) {
                wp_die('Busted!');
            }

            global $current_user;
            get_currentuserinfo();

            $zipCode = $_POST["zipCode"];
            $propertyAddress = $_POST["propertyAddress"];
            $userMessage = "Hello," . "\n"
                    . "We would like to inform you that a new Homebuyer has signed up to Iwantahouse.com "
                    . "and is interested in " . $propertyAddress . " which is in the zip code you have purchased."
                    . "Below is the members contact information:\n"
                    . "Name: " . $current_user->user_firstname . " " . $current_user->user_lastname . "\n"
                    . "Email: " . $current_user->user_email . "\n"
                    . "User Message :'" . $_POST["userMessage"] . "'\n"
                    . "\n"
                    . ""
                    . "Sincerely,\n"
                    . "Iwantahouse.com";

            $headers[] = 'From: ' . $current_user->user_firstname . ' ' . $current_user->user_lastname . '<' . $current_user->user_email . '>';

            $allProfessionalsEmails = $this->dbAceesHelper->getAllProfessionalsEmailByZipCode($zipCode);
            $mailSubject = "A member is interested in your field!";

            if ($allProfessionalsEmails) {
                //Send mail to all professionals in the zip code group
                wp_mail($allProfessionalsEmails, $mailSubject, $userMessage, $headers);
            }

            $result['type'] = "success";

            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                $result = json_encode($result);
                echo $result;
            } else {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }

            wp_die();
        }

    }

}


