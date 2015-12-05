<?php

    // configuration
    require("../includes/config.php"); 
    $info = CS50::query("SELECT username, uniqueID FROM users WHERE id = ?", $_SESSION["id"]);
    render("accountview.php", ["title" => "account","username" => $info[0]["username"], "uniqueID" => $info[0]["uniqueID"]]);
     
     ?>
     
     