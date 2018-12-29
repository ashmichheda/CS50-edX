<?php
    
  // require configuration
  require("../includes/config.php");
  
  
    // store all user's history 
    $rows = CS50::query("SELECT id, user_id, symbol, shares FROM portfolio WHERE id = ?", $_SESSION["id"]);

  $positions = [];
    
    // goes through each transaction user made
    foreach($rows as $row)
    {    
        $positions[] = [
            "id" => $row["transaction"],
            "user_id" => $row["time"],
            "symbol" => $row["symbol"],
            "shares" => $row["shares"],
        ];
    }
    
    // render portfolio
    render("portfolio_form.php", ["positions" => $positions, "title" => "History"]);
?>