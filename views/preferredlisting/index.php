
<div id="ips-all-listing-container" class="wrap posts-listing responsive-cols kleo-masonry per-row-2 ">
    <?php
    $searchResults = $this->getPreferredListings();

    if ($searchResults) {
        foreach ($searchResults as $result) {
            ?>
            <div class="item  col-xs-5 col-lg-5 grid-group-item post-content animated animate-when-almost-visible el-appear start-animation">
                <div class="thumbnail">
                    <div class="post-image">
                        <img class="group list-group-image element-wrap " src="<?php echo $result->ThumbLink; ?>" alt="" />
                    </div>
                    <div class="caption post-header">
                        <a href="<?php echo get_site_url() . "/" . IPropertySearchConfig::propertyDetailsBaseUri . "/?listingID=" . $result->listingnumber ?>">
                            <h5 class="group inner list-group-item-heading post-title entry-title"><i> <?php echo $result->streetnumber . " " . $result->streetname . "," . $result->city . "," . $result->state . " " . $result->zip ?></i></h5>
                        </a>

                        <p class="group inner list-group-item-text">
                        <div>Beds: <strong><?php echo $result->bedrooms ?></strong></div>
                        <div>Baths: <strong> <?php echo $result->fullbaths ?></strong> |<strong><?php $result->halfbaths ?></strong></div>
                        <div>Sq. Ft.: <strong> <?php echo $result->squarefeet ?> </strong></div>
                        <div>Listing ID: <strong><?php echo $result->listingnumber ?> </strong></div>
                        </p>
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                    $<?php echo sprintf("%.2f", $result->listprice) ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 post-footer">
                                <small>
                                    <a  href="<?php echo get_site_url() . "/" . IPropertySearchConfig::propertyDetailsBaseUri . "/?listingID=" . $result->listingnumber ?>">Details</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        echo "Sorry, but no content found. ";
    }
    ?>



</div>