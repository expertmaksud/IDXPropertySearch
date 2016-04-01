<?php

/**
 * ipsQuickSearchWidget widget for mls listing quick search
 *
 * @author Maksud-Ul-alam
 */
class ipsQuickSearchWidget extends WP_Widget {

    private $dbAceesHelper;

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        parent::__construct(
                'ips_quick_search_widget', // Base ID
                __('IWH Quick Search', 'text_domain'), // Name
                array('description' => __('A Mls Search Widget', 'text_domain'),) // Args
        );
        $this->dbAceesHelper = DBAccessHelper::getInstance();
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance) {
        //Show only for iwh-search-category
        //if (!is_category('iwh-search-category')) {
        //    return;
        //}
        // outputs the content of the widget
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        $resultUrl = get_site_url() . "/" . IPropertySearchConfig::searchResultBaseUri . "/";

        echo '
            <div id="ips-main-container" class="ips-container"> 
                <div class="ips-widget mb-25"> 
                    <form id="searchProfile" class=" form-inline ips-quick-search-form" action="';
        echo $resultUrl;
        echo '" method="GET"> 
            <fieldset>
                <div class="row form-group"> 
                    <div class="col-xs-12"> 
                        <label for="ips-city-zip" class="field-label">Location</label> 
                        <input name="cityOrZip" required="true" id="ips-city-zip" class="ips-area-input form-control ips-area-input " placeholder="Enter citie, state or zip" type="text" autocorrect="off" autocomplete="off"> 
                    </div> 
                    
                </div> 
                <div class="row form-group"> 
                    <div class="col-xs-7 col-sm-7"> 
                        <label for="ips-minprice-homes" class="field-label">Min. Price</label> 
                        <div class="input-group"> 
                            <span class="input-group-addon">$</span> 
                            <input id="ips-minprice-homes" name="minListPrice" placeholder="No min" class="form-control" type="text" value=""> 
                        </div>  
                    </div> 
                    <div class="col-xs-7 col-sm-7"> 
                        <label for="ips-maxprice-homes" class="field-label">Max. Price</label> 
                        <div class="input-group" style="position:relative;"> 
                            <span class="input-group-addon">$</span> 
                            <input id="ips-maxprice-homes" name="maxListPrice" placeholder="No max" class="form-control" type="text" value=""> 
                        </div> 
                    </div> 
                </div>
                <div class="row mt-10 form-group">
                    <div class="col-xs-5 col-sm-5 "> 
                        <label for="ips-select-bedrooms-homes" class="field-label">Beds</label> 
                        <select id="ips-select-bedrooms-homes" name="bedrooms" class="form-control ips-chosen-select-width">
                            <option selected="" value="0">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                            <option value="5">5+</option>
                        </select>
                    </div> 
                    <div class="col-xs-5 col-sm-5"> 
                        <label for="ips-select-baths-homes" class="field-label">Baths</label> 
                        <select id="ips-select-baths-homes" name="bathCount" class="form-control ips-chosen-select-width">
                            <option selected="" value="0">Any</option>
                            <option value="1">1+</option>
                            <option value="2">2+</option>
                            <option value="3">3+</option>
                            <option value="4">4+</option>
                            <option value="5">5+</option>
                        </select>
                    </div> 
                </div> 
                <div class="row" >
                    <div class="col-xs-10 col-sm-10 hidden-xs"> 
                        <label>&nbsp;</label> 
                        <button type="submit" class="btn btn-md btn-block btn-primary btn-form-submit ips-vertical-center ips-main-search-form-submit" id="ips-quicksearch-submit1">
                            <i class="glyphicon glyphicon-search"></i>
                        </button> 
                    </div> 
                </div>
            </fieldset>
            </form> 
    </div> 
    </div>';
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance) {
        // outputs the options form on admin
        $title = !empty($instance['title']) ? $instance['title'] : __('New title', 'text_domain');
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance) {
        // processes widget options to be saved
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}
