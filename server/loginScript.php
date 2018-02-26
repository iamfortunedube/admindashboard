<?php

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST["submit"]))
        {
            $_SESSION["u_id"]= "admin";
            echo "testing";
            header("location:dashboard.php");
        }
    }
?>