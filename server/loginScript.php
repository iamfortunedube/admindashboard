<?php
    include_once("config.php");
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		
        if(isset($_POST["submit"]))
        {
			  if(empty($_POST["username"])){

				  $errUsername="Enter your username *";  

			  }
			  if(empty($_POST["password"])){

				  $errPassword="Enter your password *";  

			  }
			 
			  if(empty($_POST["username"]) || empty($_POST["password"])){

				$errMessage = "Please make sure there are no empty feilds";

			  }else{
				
					@$username=$_POST["username"];
					@$password=$_POST["password"];
		
					$sql="SELECT * FROM `admin` WHERE username = '$username' && password = '$password'";
		
                    $result=$conn->query($sql);
                    
					if(!($result->num_rows > 0))
					{
						$errMessage="Please Enter Valid Details";
                    
                    }else{
						@$userDetails = $result->fetch_assoc();
						$_SESSION['u_id'] = $userDetails["admin_id"];
						$_SESSION['username'] = $userDetails["username"];
						$_SESSION['name'] = $userDetails["name"];
                        
						$succMessage="SuccessFul";
						echo "<script>window.location.href = './dashboard.php';alert(".$_SESSION['u_id'].")</script>";
				    }
			  }

        }
    }
?>