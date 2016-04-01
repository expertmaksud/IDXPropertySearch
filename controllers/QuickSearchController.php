<?php

/**
 * Description of QuickSearchController
 *
 * @author Maksud Ul alam
 */
if (!class_exists("QuickSearchController")) {

    class QuickSearchController {

        private static $instance;
        private $dbAceesHelper;
        //Quick Search Form properties
        private $searchParam;

        private function __construct() {
            $this->dbAceesHelper = DBAccessHelper::getInstance();
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new QuickSearchController();
            }
            return self::$instance;
        }

        public function index() {
            ob_start();
            require(IPS_ROOT_DIR . "/views/quicksearch/index.php");
            //return "Checked index";
            return ob_get_clean();
        }

        public function getUsCitiesList() {
            return $this->dbAceesHelper->getUSCities();
        }

        

    }

}
?>