<?php
    // requiring the configuration file
    require("../includes/config.php");
    
    // if the form was submitted.
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]) || empty($_POST["shares"]))
        {
            apologize("Empty Stock Symbol or Quantity");
        }
        if(lookup($_POST["symbol"]) === false)
        {
            apologize("Invalid Stock Symbol");
        }
        if (preg_match("/^\d+$/", $_POST["shares"]) == false)
        {
            // apologize
            apologize("You must enter a whole, positive integer.");
        }
        
        
        $stock1 = lookup($_POST["symbol"]);
        
        $cost = floatval($stock1["price"]) * floatval($_POST["shares"]);
        
        $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
		$cash1 = floatval($cash[0]["cash"]);
        //apologize("Cash: ".$cash1." Cost: ".$cost);
        if ($cash1 < $cost)
        {
            // apologize
            apologize("You dont have enough cash.");
        }
        
        else
        {    
            $_POST["symbol"] = strtoupper($_POST["symbol"]);
                
            // Adding Stock to Portfolio
            CS50::query("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)",$_SESSION["id"],$_POST["symbol"],$_POST["shares"]); 
            
            // Updating cash
             
            CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $cost, $_SESSION["id"]);
            
            // redirect to portifolio again
            redirect("./");
            
        
        }
        
        
    }
    
    // if the form was not submitted.
    else 
    {
        render("buy_form.php", ["title" => "Buy Form"]);
    }
