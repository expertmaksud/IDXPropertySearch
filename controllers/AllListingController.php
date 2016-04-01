<?php

/**
 * Description of AllListingControler
 *
 * @author maksud1 ul alam
 */
if (!class_exists("AllListingController")) {

    class AllListingController {

        private static $instance;
        private $dbAceesHelper;
        

        private function __construct() {
            $this->dbAceesHelper = DBAccessHelper::getInstance();
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new AllListingController();
            }
            return self::$instance;
        }

        public function index() {
            ob_start();
            require(IPS_ROOT_DIR . "/views/alllisting/index.php");
            //return "Checked index";
            return ob_get_clean();
        }

        public function getAllListings() {
            return $this->dbAceesHelper->getTop20Listings();
        }

    }

}
