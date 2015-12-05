<?php

    // configuration
    require("../includes/config.php"); 
    
    // set date
    date_default_timezone_set('UTC');
    
    // link sessionID with uniqueID
    $getuniqueID = CS50::query("SELECT uniqueID FROM users WHERE id = ?",  $_SESSION["id"]);
    $uniqueID =$getuniqueID[0]["uniqueID"];

    // get random unused note
    // load in all unused notes (could this be more efficient?)
    $rows = CS50::query("SELECT counter, userID, type, content, status, submitTime FROM notes WHERE uniqueID =? AND status =?", $uniqueID, "unused");
    // check to make sure user actually has notes
    if(!empty($rows))
    {
        $numUnused = (sizeof($rows)) - 1;
        $chosenNumber = rand(0, $numUnused);
        // convert number to username
        $getUsername = CS50::query("SELECT username FROM users WHERE id= ?", $rows[$chosenNumber]["userID"]);
        
        // load in chosen note
        $note = [
            "sender" => $getUsername[0]["username"],
            "type" => $rows[$chosenNumber]["type"],
            "content" => $rows[$chosenNumber]["content"],
            "submitTime" => $rows[$chosenNumber]["submitTime"],
        ];    
        // update status to used and readDate to today
        $date = date("m-d-Y");
        //dump($date);
        CS50::query("UPDATE notes SET status = 'used', readDate = ? WHERE counter = ?", $date, $rows[$chosenNumber]["counter"]);
        render("notedisplayview.php", ["title" => "Note", "note" => $note]);
    }
    else
    {
        $note = [];
        render("notedisplayview.php", ["title" => "Note", "note" => $note]);
    }
?>