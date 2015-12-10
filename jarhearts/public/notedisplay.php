<?php

    // configuration
    require("../includes/config.php"); 
    
    // set date
    date_default_timezone_set('UTC');
    $date = date("m-d-Y");

    // link sessionID with uniqueID
    $getuserinfo = CS50::query("SELECT uniqueID, lastDate FROM users WHERE id = ?",  $_SESSION["id"]);
    $uniqueID =$getuserinfo[0]["uniqueID"];

    // check to see if note has already been loaded
    $lastDate = $getuserinfo[0]["lastDate"];
    // if user has not seen a new note today
    if($lastDate != $date) {
        $rows = CS50:: query ("SELECT counter FROM notes WHERE uniqueID = ? AND status = ?", $uniqueID, "unused");
        if(!empty($rows)) 
        {
            // store chosen note of the day
            $numUnused = (sizeof($rows)) - 1;
            $chosenNumber = rand(0, $numUnused);
            $noteNumber = $rows[$chosenNumber]["counter"];
            // update user table to show that note has been seen today, and number of note
            CS50::query("UPDATE users SET lastDate = ?, noteNumber = ? WHERE id = ?", $date, $noteNumber, $_SESSION["id"]);
        }
        // if user doesn't have notes left
        else
        {
            $note = [];
            render("notedisplayview.php", ["title" => "Note", "note" => $note]);
        }
    }
    
    // load in counter of the day
    $getnote = CS50::query("SELECT noteNumber FROM users WHERE id = ?", $_SESSION["id"]);
    // load in that day's note
    $noterow= CS50::query("SELECT userID, type, content, submitTime FROM notes WHERE counter = ?", $getnote[0]["noteNumber"]);

    // convert number to username
    $getUsername = CS50::query("SELECT username, uniqueID FROM users WHERE id= ?", $noterow[0]["userID"]);

    // load in chosen note
    $note = [
        "sender" => $getUsername[0]["username"],
        "senderID" =>$getUsername[0]["uniqueID"],
        "type" => $noterow[0]["type"],
        "content" => $noterow[0]["content"],
        "submitTime" => $noterow[0]["submitTime"],
    ];    
    // update status to used and readDate to today
    CS50::query("UPDATE notes SET status = 'used', readDate = ? WHERE counter = ?", $date, $getnote[0]["noteNumber"]);
    
    // update user table to show that note has been seen today
    CS50::query("UPDATE users SET lastDate = ? WHERE id = ?", $date, $_SESSION["id"]);
    render("notedisplayview.php", ["title" => "Note", "note" => $note]);
?>