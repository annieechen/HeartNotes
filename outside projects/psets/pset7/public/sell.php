<?php
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("sell_form.php", ["title" => "Sell"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check to make sure form is filled out correctly
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock!");
        }
        else if ((empty($_POST["numshares"])) || ($_POST["numshares"] < 1 ))
        {
            apologize("You need to sell some shares!");
        }
        // check to see that user owns these stocks 
        $stocks  = CS50::query("SELECT shares FROM Portfolio WHERE user_id = ? and symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        if ($stocks == true)
        {
            // gather information about stock being sold 
            $stockinfo = lookup($_POST["symbol"]);
            // how many stocks they own 
            $number = $stocks[0]["shares"];
            // change stock symbols to uppercase
             $stockname = strtoupper($_POST["symbol"]);
        
            // if they don't want to sell all their shares
            if ($_POST["numshares"] < $number)
            {
                CS50::query("UPDATE Portfolio SET shares = shares - {$_POST["numshares"]}  WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $stockname);
            }
            // if all shares are being sold 
            else if ($_POST["numshares"] == $number)
            {
                $test = CS50::query("DELETE FROM Portfolio WHERE user_id = ? AND symbol = ?", $_SESSION["id"], $stockname);
            }
            else
            {
                apologize("You cannot sell more shares than you own!");
            }
            // selling was successful
            $moneymade =$_POST["numshares"] * $stockinfo["price"];
            CS50::query("UPDATE users SET cash = cash + $moneymade WHERE id = ?", $_SESSION["id"]);
            
            // update history
            CS50::query("INSERT INTO history (id, transaction, symbol, shares, price) VALUES(?, ?, ?, ?, ?)", $_SESSION["id"], "SELL", $stockname, $_POST["numshares"], $stockinfo["price"]);
            redirect("/");
        }
        // if user does not own these stocks 
        else
        {
                apologize("You do not own this stock!");
        } 
    }

?>