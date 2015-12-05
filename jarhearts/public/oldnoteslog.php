<?php

    // configuration
    require("../includes/config.php"); 
    
    // link sessionID with uniqueID
    $getuniqueID = CS50::query("SELECT uniqueID FROM users WHERE id = ?",  $_SESSION["id"]);
    $uniqueID =$getuniqueID[0]["uniqueID"];
    
    // load in past notes
    $rows = CS50::query("SELECT userID, type, content, status, submitTime, readDate FROM notes WHERE uniqueID =? AND status =?", $uniqueID, "used");
    //dump($rows);
    // create associative array for table
    $positions = [];
    foreach ($rows as $row)
    {
        if(!empty($row))
        {
            // convert userID to username
            $getUsername = CS50::query("SELECT username FROM users WHERE id= ?", $row["userID"]);
            // need to add in code to convert uniqueID to name
            $positions[] = [ 
                "sender" => $getUsername[0]["username"],
                "type" => $row["type"],
                "content" => $row["content"],
                "submitTime" => $row["submitTime"],
                "readDate" => $row["readDate"]
            ];
        }
    }    
    //dump($positions);
    render("oldnoteslogview.php", ["title" => "Past Notes", "positions" => $positions]);
    
?>    