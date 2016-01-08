<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("cashview.php", ["title" => "Get Cash!"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["amount"]))
        {
            apologize("Add some cash dude!");
        }
        else if ($_POST["amount"] < 0)
        {
            apologize("Why would you want to take away your own money??");
        }
        else
        {
            CS50::query("UPDATE users SET cash = cash + {$_POST["amount"]} WHERE id = ?", $_SESSION["id"]);
        }
    } 
    redirect("/");

?>
