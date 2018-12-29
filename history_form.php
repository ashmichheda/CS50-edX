

<table class="table table-striped">

    <thead>
        <tr>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
        </tr>
    </thead>


    <tbody>
    <?php
	    foreach ($table as $row)	
        {   
            echo("<tr>");
            echo("<td>" . date('d/m/y, g:i A',strtotime($row["time"])) . "</td>");
            echo("<td>" . $row["symbol"] . "</td>");
            echo("<td>" . $row["shares"] . "</td>");
            echo("</tr>");
        }
    ?>

    <tr>
        <td colspan="4">CASH</td>
        <td>$<?=number_format($cash[0]["cash"], 2)?></td>
    </tr>

    </tbody>
    
</table>