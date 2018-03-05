
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/commissionContent.php");

        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white; border-color: rgb(218,165,32); border-style: solid; border-width: 3px;">
                      <th>#</th>
                      <th>Name & Surname</th>
                      <th>Contact no.</th>
                      <th>Number of referees</th>
                      <th>Commission Amount</th>
                      <th>Action</th>
                  </tr>
                </thead>    
        ';
      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      } 
      include("inc/mainFooter.php");
?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #commissions').addClass('active');
    });
</script>   