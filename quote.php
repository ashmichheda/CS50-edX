<?php

    // configuration
    require("../includes/config.php");


     //if user submitted the form via post
     if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Invalid Stock Symbol");
        }
        
        else if (lookup($_POST["symbol"] == false))
        {
             apologize("Symbol not found");
        }
        
        else
        {
            $stock = lookup($_POST["symbol"]);
            render("quote_print.php",["title" => "Stocks", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
    }
        
        else
    {
        render("quote_form.php", ["title" => "Stocks"]);
    }
    
    

?>
    }