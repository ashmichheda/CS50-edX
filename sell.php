<?php
    // configuration
    require("../includes/config.php");
    // if the form was submitted
    
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
           
            $stock1 = lookup($_POST["symbol"]);
            $stock2 = CS50::query("SELECT * FROM portfolio WHERE id = ? AND symbol = ?", $_POST["id"], $_POST["symbol"]);
            $current_price = $stock1["price"] * $stock2[0]["shares"];
            
            // adding value of the share price to user table
            CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $current_price, $_SESSION["id"]);
            
            // deleting stock from the portfolio table
            CS50::query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"])");
            
            // Updating the history
            query("INSERT INTO portfolio (id, user_id, symbol, shares) VALUES (?, ?, ?, ?)", $_SESSION["id"], $_POST["user_id"], $_POST["symbol"], $stock2[0]["shares"]);
            
            // coming back to portifolio page
             redirect("./");
        
    }
    
    else
    {
        // query user's portfolio
        $rows =	query("SELECT * FROM portfolios WHERE id = ?", $_SESSION["id"]);	
        // create new array to store stock symbols
        $stocks = [];
        // for each of user's stocks
        foreach ($rows as $row)	
        {   
            // save stock symbol
            $stock = $row["symbol"];
            
            // add stock symbol to the new array
            $stocks[] = $stock;       
        }    
        // render sell form
        render("sell_form.php", ["title" => "Sell Form", "stocks" => $stocks]);
    }
?>
            
            
            