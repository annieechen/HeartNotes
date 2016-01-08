<?php

    // configuration
    require("../includes/config.php"); 

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Get Quote"]);
    }
  
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       $stock = lookup($_POST["symbol"]);
       if ($stock == false)
       {
           apologize("Sorry, this stock does not exist!");
       }
       else
       {
           render("quoteresult.php", ["title" => "Quote", "price" => $stock["price"], "name" => $stock["name"], "symbol" => $stock["symbol"]]);
       }
    } 


?>
