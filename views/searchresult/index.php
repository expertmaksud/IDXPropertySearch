<?php

if (isset($_GET['cityOrZip'])) {

    $searchResults = $this->handleWidgetSubmit();

    if ($searchResults) {

        require(IPS_ROOT_DIR . "/views/searchresult/_searchResult.php");
    } else {
        echo "Sorry, but nothing matched your search terms. Please try again with some different combination.";
    }
    return;
}
if (isset($_GET['quick_search_submit'])) {

    $searchResults = $this->handleSubmit();

    if ($searchResults) {

        require(IPS_ROOT_DIR . "/views/searchresult/_searchResult.php");
    } else {
        echo "Sorry, but nothing matched your search terms. Please try again with some different combination.";
    }
}

if (isset($_GET['city_zip_add'])) {

    $searchResults = $this->handleHeaderSubmit();

    if ($searchResults) {

        require(IPS_ROOT_DIR . "/views/searchresult/_searchResult.php");
    } else {
        echo "Sorry, but nothing matched your search terms. Please try again with some different combination.";
    }
}

?>