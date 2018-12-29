<?php

    // configuration
    require("../includes/config.php");


     //if user submitted the form via post
     if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["username"]))
        {
            apologize("Invalid username");
        }
        
        else if(empty($_POST["password"]))
        {
            apologize("Invalid password");
        }
        
        else if($_POST["confirmation"]!= $_POST["password"])
        {
            apologize("Passwords donot match!");
        }
        
        else
        {
            $result =query("INSERT INTO users (username, hash, cash) VALUES (?, ?, 10000.00)" , $_POST["username"], crypt($_POST["password"])); 
            
            if($result === false)
            {
                apologize("Username already taken");
                
            }
            
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                $_SESSION["id"] = $id;
                redirect("index.php");
            }
        }
    }
    
    // else render form
    else
    {
        render("register_form.php", ["title" => "Register"]);
    }
    
    

?>