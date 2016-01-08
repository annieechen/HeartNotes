<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("upload_form.php", ["title" => "Upload Photo"]);
    }
  
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       if(empty($_POST["imageurl"]))
       {
           apologize("You must provide a link to an image!");
       }
        else if(empty($_POST["name"]))
       {
           apologize("Describe your image!!");
       }
        CS50::query("INSERT INTO Pictures (user_id, name, imageurl) VALUES(?, ?, ?)", $_SESSION["id"], $_POST["name"], $_POST["imageurl"]);
        render("uploadresult.php", ["title" => "image", "url" => $_POST["imageurl"], "name" => $_POST["name"]]);
       
    } 
?>
