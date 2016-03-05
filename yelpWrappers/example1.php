<?php
    require_once("Search.php");

    $search = new Search("Manchester");
    $search->setParams(array("deals_filter" => true));
    var_dump($search->executeFullJson());
?>
