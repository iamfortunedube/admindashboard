
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      include("server/allocation.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/donationsContent.php");
        if(@$_POST['submit']=="Allocate"){
            $donator = $_POST['cell_donator'];
            $claimer = $_POST['claimer_id'];
            $claimed_amount = $_POST['claimer_amount'];
            $donated_amount = $_POST['amount'];
            $remaining_don;
            $status = 0;

            $insert_query = "Insert into allocation values('',\"$donator\",\"$claimer\",\"$status\")";
            $res = mysqli_query($conn,$insert_query);
            if($res){
                echo '<script>alert("Allocation successful"+" '.@$claimed_amount.'");</script>';
                $remaining_don = $donated_amount - $claimed_amount;
                
                $update_donation = "Update donation SET remaining_don = '".$remaining_don."'  WHERE cellDonator = '".@$donator."'";
                $ress = mysqli_query($conn,$update_donation);

                $update_claims = "Update claims SET states = 2 WHERE cellClaim = '".@$claimer."'";
                $resss = mysqli_query($conn,$update_claims);
                if($ress){
                    echo '<script>alert("update successful");</script>';
                }
                if($resss){
                    echo '<script>alert("update successful");</script>';
                }
            }
            else{
                echo "<script>alert('Wasn't successful');</script>";
            }
            
        }
        $sql = "Select * from donation";
        $result= mysqli_query($conn,$sql);

        $stmnt = "Select * from claims C,users S where C.cellClaim = S.p_number AND C.states =0";
        $results = mysqli_query($conn,$stmnt);
        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white;">
                      <th>#</th>
                      <th>Cell No.</th>
                      <th>Amount</th>
                      <th>Count Down</th>
                      <th>Receiver</th>
                      <th>Action</th>
                      <th>Remaining</th>
                  </tr>
                </thead>    
            ';
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo '
                    <tbody>
                    <form action="" method="post">
                        <td><input type="text" name="don_id" value="'.$row['id'].'" hidden/>'.$row['id'].'</td>
                        <td><input type="text" name="cell_donator" value="'.$row['cellDonator'].'" hidden/>'.$row['cellDonator'].'</td>
                        <td><input type="text" name="amount" value="'.$row['amount'].'" hidden/>'.$row['amount'].'</td>
                        <td><input type="text" name="don_date" value="'.$row['donDate'].'" hidden/>'.$row['donDate'].'</td>
                        
                        <td> <select class="form-control">';
                        if(mysqli_num_rows($results) > 0){
                            while($rows = mysqli_fetch_assoc($results)){
                                $claimer_id = $rows['cellClaim'];
                                $fnameD = $rows['fname'];
                                $amountClaim = $rows['amount'];
                            echo '
                                <option>'.$rows['fname'].' R'.$rows['amount'].'</option>
                                <input type="text" name="claimer_id" value="'.@$claimer_id.'" hidden/>
                        <input type="hidden" name="claimer_name" value="'.@$fnameC.'" hidden />
                        <input type="hidden" name="claimer_amount" value="'.@$amountClaim.'" hidden />';
                            }
                        }echo '
                        </select></td>';
                        if(!$row['remaining_don']=="0"){
                         echo '<td><input type="submit" name="submit" class="btn btn-success" value="Allocate"/></td>';
                        }
                        else{
                        echo  '<td>Allocated</td>';
                        }
                   echo '
                   <td><input type="text" name="remaining_don" value="'.@$remaining_don.'" hidden/>'.$row['remaining_don'].'</td>
                   </form>
                   </tbody>';
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