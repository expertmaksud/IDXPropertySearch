<div class="wrap">
    <?php
    foreach ($searchResults as $result) {
        ?>
        <div class="row">
            <a href="<?php echo get_site_url() . "/" . IPropertySearchConfig::propertyDetailsBaseUri . "/?listingID=" . $result->listingnumber ?>">
                <h3 class="media-heading"><i> <?php echo $result->streetnumber . " " . $result->streetname . "," . $result->city . "," . $result->state . " " . $result->zip ?></i></h3>
            </a>
        </div>
        <div class="row">
            <div class="media">
                <a href="#" class="pull-left"><img src="<?php echo $result->ThumbLink; ?>" class="media-object" alt="Sample Image"></a>
                <div class="media-body">
                    <div class="ips-results-price">
                        <span class="ips-for-sale-price"> LIST: $<?php echo sprintf("%.2f", $result->listprice) ?> </span>
                    </div>
                    <div>Beds:<strong><?php echo $result->bedrooms ?></strong></div>
                    <div>Baths: <strong> <?php echo $result->fullbaths ?></strong> |<strong><?php $result->halfbaths ?></strong></div>
                    <div>Sq. Ft.: <strong> <?php echo $result->squarefeet ?> </strong></div>
                    <div>Listing ID: <strong><?php echo $result->listingnumber ?> </strong></div>
                </div>
            </div>
        </div>
        <hr />

        <?php
    }
    ?>
</div>