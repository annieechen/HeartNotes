<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // check to make sure form is filled out correctly
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Two passwords do not match!");
        }
        
        // check to make sure random uniqueID is actually unique
        do {
            $identifier = generateRandomID();
            $checkuniqueID = CS50::query("SELECT * FROM users WHERE uniqueID = ?", $identifier);
        } while (!empty($checkuniqueID));
        
        // check to see username was unique
        $test = CS50::query("INSERT IGNORE INTO users (username, hash, uniqueID) VALUES(?, ?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), $identifier);
        if ($test == 0)
        {
            apologize("This username is taken!");
        } 
        else
        {
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            $_SESSION = $id;
            redirect("/");
        }
    }
?>