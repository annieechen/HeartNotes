<?php 
    // if youtube video, embed
    if(!empty($note))
    {
        if($note["type"] === "youtube")
        {
            print("<iframe width='420' height='345' src='{$note["content"]}'></iframe>");
            /*
            // source = http://stackoverflow.com/a/7604163/5636361
            $ytarray=explode("/", $note["content"]);
            $ytendstring=end($ytarray);
            $ytendarray=explode("?v=", $ytendstring);
            $ytendstring=end($ytendarray);
            $ytendarray=explode("&", $ytendstring);
            $ytcode=$ytendarray[0];
            dum("<iframe width=\"420\" height=\"315\" src=\"http://www.youtube.com/embed/$ytcode\" frameborder=\"0\" allowfullscreen></iframe>");
            */
        } 
        else if(($note["type"]) === "image")
        {
            //print("fish are friends not food");
            print("<img src='{$note["content"]}'/>");
        }
        else if(($note["type"]) === "memory")
        {
            print("<h3>This is a memory</h3><br>");
            print($note["content"]);
        }
        else if(($note["type"]) === "note")
        {
            print("<h3>This is a note</h3><br>");
            print($note["content"]);
        }
        print("<br>Sent by {$note["sender"]} at {$note["submitTime"]}");
    }
    else
    {
        print("You have no more notes to display! Check out past notes <a href='oldnoteslog.php'>HERE</a>");
    }    
?>        