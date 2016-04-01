<?php

/*
  Plugin Name: IDX property Search
  Plugin URI: http://www.github.com
  Description: Provide property listing based on users query.
  Version: 1.0
  Author: Maksud-Ul-Alam
  Contributors: IDX, LLC
  Author URI: http://expertmaksud.elance.com

 */

define("IPS_ROOT_DIR", dirname(__FILE__));

include_once 'common/IPropertySearchConfig.php';
include_once 'common/EnqueueResources.php';

include_once 'helpers/DBAccessHelper.php';
include_once 'helpers/InfrastructureHelper.php';

include_once 'controllers/QuickSearchController.php';
include_once 'controllers/DetailsResultController.php';
include_once 'controllers/SearchResultController.php';
include_once 'controllers/AllListingController.php';
include_once 'controllers/PreferredListingController.php';

include_once 'widgets/ipsQuickSearchWidget.php';

if (!is_admin()) {
    add_action("init", array(EnqueueResources::getInstance(), "loadStandardJavaScript"));
    add_action("init", array(EnqueueResources::getInstance(), "loadJavascripts"));
    add_action("init", array(EnqueueResources::getInstance(), "loadCss"));
}

add_action('init', array(InfrastructureHelper::getInstance(), "addNewRewriteRule"));
//add_filter("the_content", array(DBAccessHelper::getInstance(), "getUSCities"));
add_shortcode("ips_quick_search", array(QuickSearchController::getInstance(), "index"));
add_shortcode("ips_details_result", array(DetailsResultController::getInstance(), "index"));
add_shortcode("ips_search_result", array(SearchResultController::getInstance(), "index"));
add_shortcode("ips_all_listing", array(AllListingController::getInstance(), "index"));
add_shortcode("ips_preferred_listing", array(PreferredListingController::getInstance(), "index"));

register_activation_hook(__FILE__, array(InfrastructureHelper::getInstance(), "onPluginActivation"));
register_deactivation_hook(__FILE__, array(InfrastructureHelper::getInstance(), "onPluginDeactivation"));

//Ajax hooks
add_action("wp_ajax_nopriv_ips_send_mail_to_agents", array(DetailsResultController::getInstance(), "sendMailToAgentGroup"));
add_action("wp_ajax_ips_send_mail_to_agents", array(DetailsResultController::getInstance(), "sendMailToAgentGroup"));

//Add widgets
add_action('widgets_init', function() {
    register_widget('ipsQuickSearchWidget');
});
?>