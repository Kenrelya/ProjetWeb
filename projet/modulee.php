<?php
    if(isset($_GET["action"]))
    {
        $action = $_GET["action"];
    }
    else 
    {
        $action = null;
    }
    
    if ($action != null)
    {
        switch($action)
        {
            case "modify":
                
                break;
            case "add":
                break;
            case "delete":
                break;
        }
    }
?>
