<table class="table table-striped">

    <thead>
        <tr>
            <th>Sent To</th>
            <th>Type</th>
            <th>Content</th>
            <th>Submit Time</th>
            <th>Seen Date</th>
        </tr>
    </thead>
     <?php 
        if (!empty($positions))
        {
            print("<tbody>");
            foreach ($positions as $position)
            {
                // prints all parts of table
                print("<tr>");
                print("<td class='tableleft'>{$position["recipient"]}</td>");
                print("<td class='tableleft'>{$position["type"]}</td>");
                print("<td class='tableleft'>{$position["content"]}</td>");
                print("<td class='tableleft'>{$position["submitTime"]}</td>");
                if($position["status"] != "unused")
                {
                    print("<td class='tableleft'>{$position["readDate"]}</td>");
                }
                else
                {
                    print("<td class='tableleft'>Not seen yet!</td>");
                }
                print("</tr>");
           }
           print("</tbody>");
        }
        else 
        {
            print('No notes uploaded! Fix that <a href="newupload.php">HERE</a>');
        }

         ?>
    </table>


