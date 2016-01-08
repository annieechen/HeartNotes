<?php

    // configuration
    require("../includes/config.php"); 

    // render portfolio
    //render("portfolio.php", ["title" => "Portfolio"]);

    // load in stocks the user owns
    $rows = CS50::query("SELECT transaction, timestamp, symbol, shares, price FROM history WHERE id = ?", $_SESSION["id"]);
    
    // create associative array for portfolio 
    $positions = [];
    foreach ($rows as $row)
    {
            $positions[] = [
                "transaction" => $row["transaction"],
                "timestamp" => $row["timestamp"],
                "symbol" => $row["symbol"],
                "shares" => $row["shares"],
                "price" => $row["price"]
            ];
    }
    render("historyview.php", [ "positions" => $positions, "title" => "History"]);

?>
