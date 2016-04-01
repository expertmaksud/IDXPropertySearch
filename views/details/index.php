<div class="wrap">

    <?php
    $listingId = $this->getListingID();
    $propertyInfoRow = $this->getPropertInfoByListingNumber($listingId);
    $images = $this->getImagesByListingNumber($listingId);
    //var_dump($propertyInfoRow);
    ?>
    <div id="ips-main-container" class="ips-container">
        <div id="ihf-leadcaputre-btns" class="row mb-25">
            <div class="col-xs-12 col-md-12">

                <button type="button" class="btn btn-primary " data-target="#ipsMoreInfo" data-toggle="modal">
                    <span class="hidden-xs">
                        <i class="glyphicon glyphicon-envelope "></i> 
                        Contact Team

                    </span>
                </button>
            </div>
        </div>
        <div class="row mb-10">
            <div class="col-xs-7">
                <i id="ipsPropertyAddress"> <?php echo $propertyInfoRow->streetnumber . " " . $propertyInfoRow->streetname . "," . $propertyInfoRow->city . "," . $propertyInfoRow->state . " " . $propertyInfoRow->zip ?></i>
            </div>
            <div class="col-xs-5">
                <div class="pull-right">
                    <h4 class="ips-price" style="margin-right:10px;">
                        <span class="ips-for-sale-price"> List Price: $<?php echo sprintf("%.2f", $propertyInfoRow->listprice) ?> </span>
                        (For Sale)
                    </h4>
                </div>
            </div>
        </div>

        <div class="row mb-10">
            <div class="col-md-12">

                <div class="property-main-detail-item">

                    Beds: <?php echo $propertyInfoRow->bedrooms ?>
                </div>
                <div class="property-main-detail-item">
                    Baths: <?php echo $propertyInfoRow->fullbaths ?> | <?php $propertyInfoRow->halfbaths ?>
                </div>
                <div class="property-main-detail-item">
                    Sq. Ft.: <?php echo $propertyInfoRow->squarefeet ?>

                </div>

            </div>

        </div>
        <div class="row mb-10" >
            <div id="ips-slide-image" class="media" >
                <ul class="slideme">
                    <?php
                    foreach ($images as $image) {
                        ?>
                        <li data-thumb="<?php echo $image->ThumbLink; ?>" ><img src="<?php echo $image->LargeLink != null ? $image->LargeLink : $image->MainLink; ?>" class="media-object" alt="Sample Image"/></li>
                        <?php
                    }
                    ?>
                </ul>

            </div>
        </div>

        <div class="row mb-10 mt-25">
            <div class="col-xs-5"> Listing#<?php echo $propertyInfoRow->listingnumber ?> </div>

        </div> 
        <div class="row mt-25 mb-25">
            <div class="col-md-12"> 
                <?php echo $propertyInfoRow->remarks ?>
            </div>
        </div>
        <div class="row mb-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Location Information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">County: </span> <?php echo $propertyInfoRow->county ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Map Code: </span><?php echo $propertyInfoRow->mapcode ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">MLS Area: </span> <?php echo $propertyInfoRow->mlsarea ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Cross Street: </span> <?php echo $propertyInfoRow->crossstreet ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Census Tract: </span><?php echo $propertyInfoRow->censustract ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Property Location: </span><?php echo $propertyInfoRow->propertylocation ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Subdivision: </span><?php echo $propertyInfoRow->subdivision ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Directions: </span><?php echo $propertyInfoRow->directions ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Interior Features</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Rooms: </span> <?php echo $propertyInfoRow->rooms ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Master Bedroom Description: </span><?php echo $propertyInfoRow->masterbedroom ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Master Bathroom Description: </span> <?php echo $propertyInfoRow->masterbath ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">1/2 Baths: </span> <?php echo $propertyInfoRow->bathhalf ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Other Bathrooms Description: </span><?php echo $propertyInfoRow->otherbathroomsdesc ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Dining Room Description: </span><?php echo $propertyInfoRow->diningroomdesc ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Kitchen Description: </span><?php echo $propertyInfoRow->kitchendesc ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Has Fireplace: </span><?php echo $propertyInfoRow->fireplaceyn ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Number of Fireplaces: </span> <?php echo $propertyInfoRow->numfireplaces ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Fireplace Description: </span><?php echo $propertyInfoRow->fireplacedesc ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Heating: </span> <?php echo $propertyInfoRow->heating ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Cooling: </span> <?php echo $propertyInfoRow->cooling ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Floors: </span><?php echo $propertyInfoRow->floors ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Laundry: </span><?php echo $propertyInfoRow->laundry ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Additional Equipment: </span><?php echo $propertyInfoRow->additionalequipment ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Appliances: </span><?php echo $propertyInfoRow->appliances ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Exterior Features</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Style: </span> <?php echo $propertyInfoRow->style ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Stories: </span><?php echo $propertyInfoRow->stories ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Construction: </span> <?php echo $propertyInfoRow->construction ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Exterior: </span> <?php echo $propertyInfoRow->exterior ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Foundation: </span><?php echo $propertyInfoRow->foundation ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Roof: </span><?php echo $propertyInfoRow->roof ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Water / Sewer: </span><?php echo $propertyInfoRow->watersewer ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Water: </span><?php echo $propertyInfoRow->water ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item">
                                <span class="listing-info-item-title">Utilities: </span> <?php echo $propertyInfoRow->utilities ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item">
                                <span class="listing-info-item-title">Parking Description: </span><?php echo $propertyInfoRow->parkingdesc ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Has Garage: </span> <?php echo $propertyInfoRow->garyn ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Landscaping: </span> <?php echo $propertyInfoRow->landscaping ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Has a Pool: </span><?php echo $propertyInfoRow->poolyn ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Pool Description: </span><?php echo $propertyInfoRow->pooldesc ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Is a Horse Property: </span><?php echo $propertyInfoRow->horsepropertyyn ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Exposure Faces: </span><?php echo $propertyInfoRow->exposurefaces ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Topography: </span><?php echo $propertyInfoRow->topography ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Elevation: </span><?php echo $propertyInfoRow->elevation ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Lot Size in Acres: </span><?php echo $propertyInfoRow->lotacres ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Lot Size in Sq. Ft.: </span><?php echo $propertyInfoRow->lotsqft ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Zoning: </span><?php echo $propertyInfoRow->zoning ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Energy Features: </span><?php echo $propertyInfoRow->energyfeatures ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Improvements: </span><?php echo $propertyInfoRow->improvements ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Road Description: </span><?php echo $propertyInfoRow->roaddesc ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Is One Story: </span><?php echo $propertyInfoRow->onestoryyn ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">School</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Elementary School: </span> <?php echo $propertyInfoRow->elementaryschool ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Jr. High School: </span><?php echo $propertyInfoRow->jrhighschool ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">High School: </span> <?php echo $propertyInfoRow->highschool ?> 
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Additional Information</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Property Type: </span> <?php echo $propertyInfoRow->propertytype ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item listing-info-item-2">
                                <span class="listing-info-item-title">Property SubType: </span><?php echo $propertyInfoRow->propertysubtype ?> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Property SubType 2: </span> <?php echo $propertyInfoRow->propertysubtype2 ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Year Built: </span> <?php echo $propertyInfoRow->yearbuilt ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">APN: </span><?php echo $propertyInfoRow->apn ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Status: </span><?php echo $propertyInfoRow->status ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Is Short Sale: </span><?php echo $propertyInfoRow->shortsaleyn ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Fees Include: </span><?php echo $propertyInfoRow->feesinclude ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">HOA Fee: </span><?php echo $propertyInfoRow->hoafee ?> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">HOA Frequency: </span><?php echo $propertyInfoRow->hoafrequency ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="listing-info-item ">
                                <span class="listing-info-item-title">Restrictions: </span><?php echo $propertyInfoRow->restrictions ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML -->
    <div class="ips-modal-container">
        <input type="hidden" id="txtZipCode" value="<?php echo $propertyInfoRow->zip ?>" />
        <div id="ipsMoreInfo" class="modal fade" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" style="left: 0%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">More Info</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row mt-10">

                            <div class="col-xs-12">
                                <label for="ips_schedshow_comments">Message</label>
                                <textarea id="ips_txtUserMessage" placeholder="Please type a message" required="true" class="form-control" style="height:100px; width:100%;" name="message" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" id="ips_btnSendMail" class="btn btn-primary">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end of wrap -->







