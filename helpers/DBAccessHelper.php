<?php

/**
 * Description of DBAccessHelper
 *
 * @author maksud ul alam
 */
if (!class_exists("DBAccessHelper")) {

    class DBAccessHelper {

        private static $instance;

        private function __construct() {
            
        }

        public static function getInstance() {
            if (!isset(self::$instance)) {
                self::$instance = new DBAccessHelper();
            }
            return self::$instance;
        }

        public function getUSCities() {
            global $wpdb;
            $table_name = $wpdb->prefix . "mlslistings";
            $active_rows = $wpdb->get_results("SELECT distinct cityid AS id,city FROM {$table_name}  WHERE cityid > 0 ORDER BY city");

            return $active_rows;
            /* foreach ($active_rows as $active_row) {
              echo $active_row->city;
              }

              $fivesdrafts = $wpdb->get_results(
              "
              SELECT ID, post_title
              FROM $wpdb->posts
              WHERE post_status = 'draft' "
              );

              foreach ($fivesdrafts as $fivesdraft) {
              echo $fivesdraft->post_title;
              } */
        }

        public function getQuickSearchResult($searchParam) {
            global $wpdb;
            $listing_table_name = $wpdb->prefix . "mlslistings";
            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT mls.listingnumber, listprice, streetnumber, streetname, city, state, zip, propertytype, "
                    . "propertysubtype, bedrooms, fullbaths, halfbaths, squarefeet, agentcode, ThumbLink "
                    . "FROM {$listing_table_name} AS mls, {$photo_table_name} AS photo WHERE mls.listingnumber = photo.ListingNumber "
                    . "AND photo.Priority = 0 ";

            if (!is_null($searchParam['propertyType'])) {
                $sql .= " AND propertytype = '{$searchParam['propertyType']}' ";
            }

            if (!is_null($searchParam['locations'])) {
                $locationIds = implode(', ', $searchParam['locations']);
                $sql .= " AND cityid IN ({$locationIds})";
            }

            if ($searchParam['maxPrice'] > 0) {
                $sql .=" AND listprice<={$searchParam['maxPrice']}";
            }

            if ($searchParam['minPrice'] > 0) {
                $sql .=" AND listprice>={$searchParam['minPrice']}";
            }

            if ($searchParam['minSqft'] > 0) {
                $sql .=" AND squarefeet>={$searchParam['minSqft']}";
            }

            if ($searchParam['beds'] != 0) {
                $sql .=" AND bedrooms>={$searchParam['beds']}";
            }

            if ($searchParam['baths'] != 0) {
                $sql .=" AND fullbaths>={$searchParam['baths']}";
            }

            $sql .=" Order by listprice LIMIT 250 Offset 0";
            
            $result_rows = $wpdb->get_results($sql);

            return $result_rows;
        }

        public function getWidgetQuickSearchResult($searchParam) {
            global $wpdb;
            $listing_table_name = $wpdb->prefix . "mlslistings";
            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT mls.listingnumber, listprice, streetnumber, streetname, city, state, zip, propertytype, "
                    . "propertysubtype, bedrooms, fullbaths, halfbaths, squarefeet, agentcode, ThumbLink "
                    . "FROM {$listing_table_name} AS mls, {$photo_table_name} AS photo WHERE mls.listingnumber = photo.ListingNumber "
                    . "AND photo.Priority = 0 ";


            if (!is_null($searchParam['locations'])) {
                $locationIds =  $searchParam['locations'];
                $sql .= " AND (countyid in ('{$locationIds}') OR cityid in ('{$locationIds}') OR city='{$locationIds}' OR state ='{$locationIds}' OR zip = '{$locationIds}')";
            }

            if ($searchParam['maxPrice'] > 0) {
                $sql .=" AND listprice<={$searchParam['maxPrice']}";
            }

            if ($searchParam['minPrice'] > 0) {
                $sql .=" AND listprice>={$searchParam['minPrice']}";
            }

            if ($searchParam['beds'] != 0) {
                $sql .=" AND bedrooms>={$searchParam['beds']}";
            }

            if ($searchParam['baths'] != 0) {
                $sql .=" AND fullbaths>={$searchParam['baths']}";
            }
                
            $sql .=" Order by listprice LIMIT 150 Offset 0";
            
            $result_rows = $wpdb->get_results($sql);

            return $result_rows;
        }

        public function getPropertyDetailsInfo($listingNumber) {
            global $wpdb;
            $listing_table_name = $wpdb->prefix . "mlslistings";
            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT mls.listingnumber, listprice, streetnumber, streetname, city, state, zip, propertytype, "
                    . " propertysubtype, bedrooms, fullbaths, halfbaths, squarefeet, agentcode, county, mapcode, mlsarea,"
                    . " crossstreet, censustract, propertylocation, subdivision, directions, rooms, masterbedroom, masterbath,"
                    . " bathhalf, otherbathroomsdesc, diningroomdesc, kitchendesc, fireplaceyn, numfireplaces, fireplacedesc, heating, "
                    . " cooling, floors, laundry, additionalequipment, appliances, style, stories, construction, exterior, foundation, "
                    . " roof, watersewer, water, utilities, parkingdesc, garyn, landscaping, poolyn, pooldesc, horsepropertyyn, "
                    . " exposurefaces, topography, elevation, lotacres, lotsqft, zoning, energyfeatures, improvements, roaddesc,"
                    . " onestoryyn, elementaryschool, jrhighschool, highschool, propertytype, propertysubtype, propertysubtype2, "
                    . " yearbuilt, apn, status, shortsaleyn, feesinclude, hoafee, hoafrequency, restrictions, remarks,"
                    . "MainLink, ThumbLink, LargeLink "
                    . "FROM {$listing_table_name} AS mls, {$photo_table_name} AS photo WHERE mls.listingnumber = photo.ListingNumber "
                    . "AND  mls.listingnumber = {$listingNumber} AND photo.Priority = 0 ";



            $result_row = $wpdb->get_row($sql);

            return $result_row;
        }

        public function getListingImages($listingNumber) {
            global $wpdb;

            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT listingnumber, MainLink, ThumbLink, LargeLink "
                    . "FROM {$photo_table_name} AS photo WHERE photo.listingnumber = {$listingNumber} ";



            $result_rows = $wpdb->get_results($sql);

            return $result_rows;
        }

        public function getAllProfessionalsEmailByZipCode($zipCode) {
            global $wpdb;
            $user_group_table = $wpdb->prefix . "groups_user_group";
            $group_table = $wpdb->prefix . "groups_group";
            $user_table = $wpdb->prefix . "users";

            $sql = "SELECT users.user_email FROM $user_group_table AS ug, $group_table AS grp, "
                    . "$user_table as users WHERE name LIKE('{$zipCode}%') AND ug.group_id= grp.group_id AND ug.user_id = users.ID";

            $result_column = $wpdb->get_col($sql);

            return $result_column;
        } 
        
         public function getTop20Listings() {
            global $wpdb;
            $listing_table_name = $wpdb->prefix . "mlslistings";
            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT mls.listingnumber, listprice, streetnumber, streetname, city, state, zip, propertytype, "
                    . "propertysubtype, bedrooms, fullbaths, halfbaths, squarefeet, agentcode, ThumbLink "
                    . "FROM {$listing_table_name} AS mls, {$photo_table_name} AS photo WHERE mls.listingnumber = photo.ListingNumber "
                    . "AND photo.Priority = 0  Order by listprice LIMIT 20 Offset 20";
                    
            $result_rows = $wpdb->get_results($sql);

            return $result_rows;
                    
         } 
         
         //Get top lowest price listing
         public function getTop10FeatureListings() {
            global $wpdb;
            $listing_table_name = $wpdb->prefix . "mlslistings";
            $photo_table_name = $wpdb->prefix . "mlslistingsphotos";

            $sql = "SELECT mls.listingnumber, listprice, streetnumber, streetname, city, state, zip, propertytype, "
                    . "propertysubtype, bedrooms, fullbaths, halfbaths, squarefeet, agentcode, ThumbLink "
                    . "FROM {$listing_table_name} AS mls, {$photo_table_name} AS photo WHERE mls.listingnumber = photo.ListingNumber "
                    . "AND photo.Priority = 0  Order by listprice LIMIT 10 Offset 0";
                    
            $result_rows = $wpdb->get_results($sql);

            return $result_rows;
                    
         }

    }

}
?>