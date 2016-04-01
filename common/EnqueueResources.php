<?php

/**
 * Description of EnqueueResources
 *
 * @author Maksud ul Alam
 */
if (!class_exists("EnqueueResources")) {

    class EnqueueResources {

        private static $instance;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new EnqueueResources();
            }
            return self::$instance;
        }

        public function loadStandardJavaScript() {
            wp_enqueue_script("jquery");
        }

        public function loadJavascripts() {
            wp_register_script("ips-bootstrap", plugins_url("assets/js/libs/bootstrap.min.js", dirname(__FILE__)), "jquery");
            wp_register_script("ips-slideme", plugins_url("assets/js/libs/jquery.slideme2.js", dirname(__FILE__)), "jquery");
            wp_register_script("ips-blockUI", plugins_url("assets/js/libs/jquery.blockUI.js", dirname(__FILE__)), "jquery");
            
            wp_register_script("ips-propartydetails", plugins_url("assets/js/customs/ips.property.details.js", dirname(__FILE__)), "jquery");
            wp_localize_script('ips-propartydetails', 'ipsAjax', array('ajaxurl' => admin_url('admin-ajax.php'), 'postNonce' => wp_create_nonce('ipsajax-post-nonce')));

            wp_enqueue_script("ips-bootstrap");
            wp_enqueue_script("ips-slideme");
            wp_enqueue_script("ips-blockUI");
            wp_enqueue_script("ips-propartydetails");
        }

        public function loadCss() {
            wp_register_style("ips-bootstrap", plugins_url("assets/css/bootstrap.min.css", dirname(__FILE__)));
            wp_register_style("ips-bootstrap-theme", plugins_url("assets/css/bootstrap-theme.min.css", dirname(__FILE__)));
            wp_register_style("ips-style", plugins_url("assets/css/ips-style.css", dirname(__FILE__)));
            wp_register_style("ips-slideme", plugins_url("assets/css/slideme.css", dirname(__FILE__)));

            wp_enqueue_style("ips-bootstrap");
            wp_enqueue_style("ips-bootstrap-theme");
            wp_enqueue_style("ips-style");
            wp_enqueue_style("ips-slideme");
        }

    }

}
?>
