<?php
    // configuration
    require("../includes/config.php");  
    
    // query cash for template
    $cash =	CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);	
    
	// create new array to store all info for history table
    $table = CS50::query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);
    
    // render sell form
    render("history_form.php", ["title" => "History", "cash" => $cash, "table" => $table]);
   
?>