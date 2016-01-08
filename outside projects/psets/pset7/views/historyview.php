<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
     <?php 
        function toEastCoast($time)
        {

            $datetime = new DateTime($time);
            $ny_time = new DateTimeZone('America/New_York');
            $datetime->setTimezone($ny_time);
            return $datetime->format('Y-m-d h:i a');
        }
        if (!empty($positions))
        {
            foreach ($positions as $position)
            {
                $fprice = number_format($position["price"], 2);
                print("<tr>");
                print("<td>{$position["transaction"]}</td>");
                print("<td>" . toEastCoast($position["timestamp"]) . "</td>");
                print("<td>{$position["symbol"]}</td>");
                print("<td>{$position["shares"]}</td>");
                print("<td>$$fprice</td>");
                print("</tr>");
           }
        }
        else 
        {
            print("<br>No history to show!!");
        }
        
         ?>
        </tbody>
    
    </table>


