<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check to make sure form is filled out correctly
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock!");
        }
        else if ((empty($_POST["numshares"])) || ($_POST["numshares"] < 1 ))
        {
            apologize("You need to enter a positive number of shares to buy!!");
        }
        // check to see that stock user wants to buy is valid
        $stockinfo = lookup($_POST["symbol"]);
        if ($stockinfo == false)
        {
            apologize("This is not a valid stock symbol!");
        }
        // checks to see user has enough money to purchase the shares they want
        $cost =$_POST["numshares"] * $stockinfo["price"];
        $casharray = CS50::query("SELECT cash FROM users where id = ?", $_SESSION["id"]);
        $cash = $casharray[0]["cash"];
        if ($cost > $cash)
        {
            apologize("You do not have enough money for this transaction!");
        }
        // change stock symbols to uppercase
        $stockname = strtoupper($_POST["symbol"]);
        
        // buy stock
        CS50::query("INSERT INTO Portfolio (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stockname, $_POST["numshares"]);
        // update history
        CS50::query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], "BUY", $stockname, $_POST["numshares"], $stockinfo["price"]);
        // update cash 
        CS50::query("UPDATE users SET cash = cash - $cost WHERE id = ?", $_SESSION["id"]);
        redirect("/");
    }

?>