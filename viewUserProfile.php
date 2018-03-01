<?php 
      include("inc/mainHeader.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/viewProfileContent.php");
      }else{
          echo "<script>alert('Opps. Please try again later');window.location.href = 'members.php';</script>";
      } 
      include("inc/mainFooter.php");
?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #members').addClass('active');
    });
</script>  