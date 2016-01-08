<?php 
    // if youtube video, embed
    if(!empty($note))
    {
        if($note["type"] === "youtube")
        {
            // source = http://stackoverflow.com/a/15401667/5636361
            $string = $note["content"];
            $search = '/youtube\.com\/watch\?v=([a-zA-Z0-9]+)/smi';
            $replace = "youtube.com/embed/$1";    
            $url = preg_replace($search,$replace,$string);
            print("<iframe width='420' height='345' src='{$url}'></iframe>");
        } 
        else if(($note["type"]) === "image")
        {
            print("<img width='300' src='{$note["content"]}'/>");
        }
        else if(($note["type"]) === "website")
        {
            $url = $note["content"];
            print("<h3>This is a Website</h3><br>");
            print("<iframe src='{$url}' frameborder='0' scrolling='yes' width='100%' height='900px'></iframe>");
            print("<h4>We know this feature is buggy! If the website isn't showing up, you can go to it directly at: <a href='{$url}'>{$url}</a><h4>");
        }
        else if(($note["type"]) === "note")
        {
            print("<h3>This is a note!</h3><br>");
            print($note["content"]);
        }
        print("<br><br>Sent by {$note["sender"]} at {$note["submitTime"]}");
        if($note["sender"]!="anonymous")
        {
            print("<br><br><a class='headerpadding' href='https://ide50-aec78.cs50.io/email.php?uID={$note["email"]}'>Send an email saying thanks!!</a>");
        }    
    }
    else
    {
        print("You have no more notes to display! Check out past notes <a href='oldnoteslog.php'>HERE</a>");
    }    
?>        