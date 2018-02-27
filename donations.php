
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/donationsContent.php");

        $sql = "Select * From donation";
        $result= mysqli_query($conn,$sql);

        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white;">
                      <th>#</th>
                      <th>Cell No.</th>
                      <th>Amount</th>
                      <th>Count Down</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                </thead>    
            ';
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo '
                    <tbody>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['cellDonator'].'</td>
                        <td>'.$row['amount'].'</td>
                        <td>'.$row['donDate'].'</td>
                        <td>'.$row['status'].'</td>';
                        if($row['status']=="0"){
                         echo '<td><input type="submit" class="btn btn-success" value="Allocate"/></td>';
                        }
                        else{
                        echo  '<td>Allocated</td>';
                        }
                   echo '</tbody>';
              }
            }
            echo '</table>';
        
      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      } 
      include("inc/mainFooter.php");
?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #donations').addClass('active');
    });
</script>  