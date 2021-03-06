<?php

    // configuration
    require("../includes/config.php"); 
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // if link has a uID already embedded
        If(!empty($_GET["uID"]))
        {
            render("emailviews.php", ["title" => "Send email back!", "recipientemail" => $_GET["uID"]]);
        } 
        else
        {
            apologize("Sorry, this user did not provide an email!");
        }

    }
     // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            // source http://stackoverflow.com/a/16022357/5636361
            
            //include the file
            require_once('class.phpmailer.php');
            require_once('class.smtp.php');
            
            
            $phpmailer          = new PHPMailer();
            
            
            $phpmailer->IsSMTP(); // telling the class to use SMTP
            $phpmailer->Host       = "ssl://smtp.gmail.com"; // SMTP server
            $phpmailer->SMTPAuth   = true;                  // enable SMTP authentication
            $phpmailer->Port       = 465;          // set the SMTP port for the GMAIL server; 465 for ssl and 587 for tls
            $phpmailer->Username   = "thanksforheartnote@gmail.com"; // Gmail account username
            $phpmailer->Password   = "potatoeseat";        // Gmail account password
            
            $phpmailer->SetFrom('thanksforheartnote@gmail.com', 'Heart Notes'); //set from name
            $body= $_POST["body"];
            $phpmailer->Subject    = "Subject";
            $phpmailer->MsgHTML($body);
            $to = $_POST["email"];
            $phpmailer->AddAddress($to, "To Name");
            
            if(!$phpmailer->Send()) {
              echo "Mailer Error: " . $phpmailer->ErrorInfo;
            } else 
            {
                redirect("success.php");
            }
    }        
?>