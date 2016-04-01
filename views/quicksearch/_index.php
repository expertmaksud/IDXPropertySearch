<div class="wrap">
    <form method="get" action="<?php echo  get_site_url() . "/" . IPropertySearchConfig::searchResultBaseUri ."/"?>">
        <div class="form-group"> 
            <label class="field-label" for="ips_areaSelector">Location</label>
            <select multiple class="form-control" required="true" name="ips_locations[]" id="ips_areaSelector">
                <?php
                $usCities = $this->getUsCitiesList();
                foreach ($usCities as $usCitie) {
                    ?>
                    <option value="<?php echo $usCitie->id; ?> "><?php echo $usCitie->city; ?> </option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_select_property_type">Property Type</label>
            <select class="from-control" name="ips_propert_type" id="ips_select_property_type">
                <option value="SFR">House Only</option>
                <option value="CND">Condo Only</option>
                <option value="LL">Lots / Land</option>
                <option value="RI">Multi-Unit Residential</option>
                <option value="MH">Mobile Home</option>
                <option value="COM">Commercial</option>
            </select>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_min_price">Min. Price</label>
            <div class="input-group">
                <span class="input-group-addon">$</span><input name="ips_minprice" type="text" class="form-control" id="ips_min_price" placeholder="No Min" /> <span class="input-group-addon">.00</span>
            </div>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_max_price">Max. Price</label>
            <div class="input-group">
                <span class="input-group-addon">$</span><input name="ips_maxprice" type="text" class="form-control" placeholder="No Max" id="ips_max_price"/><span class="input-group-addon">.00</span>
            </div>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_max_sqft">Min. Sqft</label>
            <input name="ips_sqft" type="text" class="form-control" placeholder="Any" id="ips_max_sqft"/>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_select_bed">Beds</label>
            <select class="from-control" name="ips_bed" id="ips_select_bed">
                <option selected="" value="0">Any</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5+</option>
            </select>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_select_baths">Baths</label>
            <select class="from-control" name="ips_bath" id="ips_select_baths">
                <option selected="" value="0">Any</option>
                <option value="1">1+</option>
                <option value="2">2+</option>
                <option value="3">3+</option>
                <option value="4">4+</option>
                <option value="5">5+</option>
            </select>
        </div>
        <div class="form-group">
            <label class="field-label" for="ips_is_open_home">Open Homes</label>
            <input type="checkbox" name="ips_open_home" id="ips_is_open_home" class="from-control" />
        </div>

        <input class="btn btn-primary " type="submit" name="quick_search_submit" value="Search"/>
    </form>
</div> 