<table class="table table-striped">

    <thead>
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
     <?php 
        if (!empty($positions))
        {
            print("<tbody>");
            foreach ($positions as $position)
            {
                $fprice = number_format($position["price"], 2);
                $fcurrentvalue = number_format($position["currentvalue"],2);
                print("<tr>");
                print("<td>{$position["symbol"]}</td>");
                print("<td>{$position["name"]}</td>");
                print("<td>{$position["shares"]}</td>");
                print("<td>$$fprice</td>");
                print("<td>$$fcurrentvalue</td>");
                print("</tr>");
           }
           print("</tbody>");
        }
        else 
        {
            print("No stocks in portfolio!");
        }
        $fcash = number_format($cash,2);
        print(
        "<tr>
            <td colspan = \"4\">CASH     </td>
            <td>$$fcash</td>
        </tr>");
         ?>
    </table>


