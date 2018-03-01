
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      include("inc/modal.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/membersContent.php");

      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      } 
      include("inc/mainFooter.php");
?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #members').addClass('active');
    });
    function on() {
        document.getElementById("overlay").style.display = "block";
        document.getElementById("modal").style.display = "block";
    }
    function off() {
        document.getElementById("overlay").style.display = "none";
        document.getElementById("modal").style.display = "none";
    }
</script>   