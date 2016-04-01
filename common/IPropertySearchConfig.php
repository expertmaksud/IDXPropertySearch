<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author maksud ul alam
 */
if (!interface_exists("IPropertySearchConfig")) {

    interface IPropertySearchConfig {

        const usCityTableName = "uscities";
        const quickSearchPageName = "ipsQuickSearch";
        const detailPageName = "ipsPropertyDetails";
        const searchResultPageName = "ipsSearchResult";
        const propertyDetailsBaseUri = "iwh-property-details";
        const quickSearchBaseUri = "iwh-quick-search";
        const searchResultBaseUri = "iwh-search-result";

    }

}
?>