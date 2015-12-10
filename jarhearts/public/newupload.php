<?php

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // if link has a uID already embedded
        If(!empty($_GET["uID"]))
        {
            render("uploadform.php", ["title" => "Upload", "uniqueID" => $_GET["uID"]]);
        } 
        // no uniqueID specified
        else
        {
            render("uploadform.php", ["title" => "Upload"]);
        }    
    }

     // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check if uniqueID exists
        $checkuniqueID = CS50::query("SELECT * FROM users WHERE uniqueID = ?", $_POST["uniqueID"]);
        if(empty($checkuniqueID))
        {
            apologize("ID does not exist");
        }
        
        $userID;
        // if user is logged in, store sessionID, if not, set to default
        if (empty($_SESSION["id"]))
        {
            $userID = 0;
            $redirecter = "register.php";
        } 
        else
        {
            $userID = $_SESSION["id"];
            $redirecter = "/";
        }
        
        // for each upload type, add to the general table
        switch ($_POST["type"]) {
            case "youtube":
                $check = CS50::query("INSERT INTO notes (uniqueID, userID, type, content) VALUES(?, ?, ?, ?)", $_POST["uniqueID"], $userID, $_POST["type"], $_POST["youtube"]);
                break;
            case "image":
                $check = CS50::query("INSERT INTO notes (uniqueID, userID, type, content) VALUES(?, ?, ?, ?)", $_POST["uniqueID"], $userID, $_POST["type"], $_POST["image"]);
                break;
            case "memory":
                $check = CS50::query("INSERT INTO notes (uniqueID, userID, type, content) VALUES(?, ?, ?, ?)", $_POST["uniqueID"], $userID, $_POST["type"], $_POST["memory"]);
                break;
            case "note":
                $check = CS50::query("INSERT INTO notes (uniqueID, userID, type, content) VALUES(?, ?, ?, ?)", $_POST["uniqueID"], $userID, $_POST["type"], $_POST["note"]);
                break;   
        }
        redirect($redirecter);
    }    
?>
