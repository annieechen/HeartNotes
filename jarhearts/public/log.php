<?php

    // configuration
    require("../includes/config.php"); 
    // load in past uploads
    $rows = CS50::query("SELECT uniqueID, type, content, status, submitTime, readDate FROM notes WHERE userID = ?", $_SESSION["id"]);
    // create associative array for table
    $positions = [];
    foreach ($rows as $row)
    {
        if(!empty($row))
        {
            // need to add in code to convert uniqueID to name
            $getUsername = CS50::query("SELECT username FROM users WHERE uniqueID= ?", $row["uniqueID"]);
            $positions[] = [
                "recipient" => $getUsername[0]["username"],
                "type" => $row["type"],
                "content" => $row["content"],
                "status" => $row["status"],
                "submitTime" => $row["submitTime"],
                "readDate" => $row["readDate"]
            ];
        }
    }    
    //dump($positions);
    render("logtable.php", ["title" => "Past Upload", "positions" => $positions]);
    
?>    