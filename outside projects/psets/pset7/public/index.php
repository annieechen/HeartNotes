<?php

    // configuration
    require("../includes/config.php"); 


    // load in stocks the user owns
    $rows = CS50::query("SELECT symbol, shares FROM Portfolio WHERE user_id = ?", $_SESSION["id"]);
    
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
    render("portfolio.php", ["cash" => $cash, "positions" => $positions, "title" => "Portfolio"]);

?>
