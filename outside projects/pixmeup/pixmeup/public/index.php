<?php

    // configuration
    require("../includes/config.php"); 
    
    
    // load in photos from portfolio
    $rows = CS50::query("SELECT imageurl FROM Pictures WHERE user_id = ?", $_SESSION["id"]);
    $photos = [];
    foreach ($rows as $row)
    {
        $photos[] = 
        
    /*
    // create counter for cash 
    // create associative array for portfolio 
    $positions = [];
    foreach ($rows as $row)
    {
        $stock = lookup($row["symbol"]);
        if ($stock !== false)
        {
            $positions[] = [
                "name" => $stock["name"],
                "price" => $stock["price"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "currentvalue" => $stock["price"] * $row["shares"]
            ];
        }
    }
    $casharray = CS50::query("SELECT cash FROM users where id = ?", $_SESSION["id"]);
    $cash = $casharray[0]["cash"];
    */
    render("images.php");

?>
