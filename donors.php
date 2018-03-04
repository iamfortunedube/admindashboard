<?php
      include("inc/mainHeader.php");
      include("./server/config.php");
      if(!empty($_SESSION["u_id"])){
        include("inc/donorsContent.php");

        $stmnt = "Select * From donation D, users S WHERE D.cellDonator = S.p_number";
        $result = mysqli_query($conn,$stmnt);

        // $sql = "Select * from donation D,users S where D.cellDonator = S.p_number";
        // $results= mysqli_query($conn,$sql);

        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white; border-color: rgb(218,165,32); border-style: solid; border-width: 2px;">
                      <th>#</th>
                      <th>Name & Surname</th>
                      <th>Cell no</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Count Down</th>
                  </tr>
                </thead>    
            ';
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo '
                    <tbody>

                      <form action="" method="post">
                          <td><input type="text" name="claim_id" value="'.$row['id'].'" hidden/>'.$row['id'].'</td>
                          <td><input type="text" name="claimer_name" value="'.$row['fname'].'" hidden/>'.$row['fname'].' '.$row['lname'].'</td>
                          <td><input type="text" name="claimer_id" value="'.$row['cellDonator'].'" hidden/>'.$row['cellDonator'].'</td>
                          <td><input type="text" name="claimed_amount" value="'.$row['remaining_don'].'" hidden/>'.$row['remaining_don'].'</td>';
                            if($row['remaining_don']>0){
                                $status = "Incomplete";
                                echo '<td>'.$status.'</td>';
                            }
                            else{
                                $status = "Complete";
                                echo '<td>'.$status.'</td>';
                            }
                          echo '<td><input type="text" name="claim_date" value="'.$row['donDate'].'" hidden/>'.$row['donDate'].'</td>
                        </form>
                    </tbody>
                ';
              }
            }
      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      } 
      include("inc/mainFooter.php");
?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #claims').addClass('active');
    });
</script>