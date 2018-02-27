<?php include('inc/mainHeader.php');
 if(isset($_SESSION["u_id"])){ header("location:dashboard.php"); }?>
    <?php include('inc/login.php')?>
<?php include('inc/mainFooter.php')?>