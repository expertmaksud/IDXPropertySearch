<?php

/**
 * Provide preferred listings from DB
 *
 * @author maksud ul alam
 */
if (!class_exists("PreferredListingController")) {

    class PreferredListingController {

        private static $instance;
        private $dbAceesHelper;

        private function __construct() {
            $this->dbAceesHelper = DBAccessHelper::getInstance();
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new PreferredListingController();
            }
            return self::$instance;
        }

        public function index() {
            ob_start();
            require(IPS_ROOT_DIR . "/views/preferredlisting/index.php");
            //return "Checked index";
            return ob_get_clean();
        }

        public function getPreferredListings() {
            return $this->dbAceesHelper->getTop10FeatureListings();
        }

    }

}
