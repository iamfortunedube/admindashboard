
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      include("server/allocation.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/donationsContent.php");
        if(@$_POST['submit']=="Allocate"){
            $donator = $_POST['cell_donator'];
            $donator_id = $_POST['don_id'];
            // $claimer = $_POST['claimer_id'];
            // $claimed_amount = $_POST['claimer_amount'];
            $donated_amount = $_POST['amount'];
            $remaining_amount = $_POST['remaining_don'];
            $remaining_don;
            $remaining_claim;
            $status = $claimed_amount = 0;
            $claimer = (int)$_POST['claim_option'];
            //echo '<script>alert("'.$remaining_amount.'")</script>';

            $select_claimer = "Select * FROM claims WHERE id = ".$claimer.";";
            $claim_res = mysqli_query($conn,$select_claimer);
            if(mysqli_num_rows($claim_res)>0){
                while($claim_row = mysqli_fetch_assoc($claim_res)){
                    $claimed_amount = $claim_row['remaining_claim'];
                    @$claimer_cell = $claim_row['cellClaim'];
                }
            }

            $newDate=Date('Y-m-d', strtotime("+10 days")) ." ". date('H:i:s');
            $curtime = date('Y-m-d H:i:s');

            $update_claim = "UPDATE claims SET ";
           
            $insert_query = "Insert into allocation values('',\"$donator\",\"$claimer_cell\",\"$status\",\"$curtime\")";
            $res = mysqli_query($conn,$insert_query);
            if($res){
                echo '<span style="background-color: rgb(58, 224, 113);">Allocation was successful</span>';
                echo '<script>alert("Allocation successful");</script>';
               
                 $remaing_don_amount = (int)$remaining_amount; 
                 $remaining_claim_amount = (int)$claimed_amount;
                
                    if($remaing_don_amount > $remaining_claim_amount){
                        $remaining_don = $remaing_don_amount - $remaining_claim_amount;
                        
                        $update_donation = "Update donation SET remaining_don = '".$remaining_don."'  WHERE id = ".@$donator_id.";";
                        $ress = mysqli_query($conn,$update_donation);

                        $update_claims = "Update claims SET remaining_claim = 0,states = 2 WHERE id = ".@$claimer.";";
                        $resss = mysqli_query($conn,$update_claims);


                        /*-------------------------SMS------------------*/
                            $sqlDoon = "select * from users where p_number = '".$donator."'";
                            $donResults = mysqli_query($conn,$sqlDoon);
                            $getDonDetails = mysqli_fetch_assoc($donResults);
                        /*-------------------------SMS ends------------------*/

                        /*-------------------------SMS------------------*/
                            $sqlClaim = "select * from users where p_number = '".$claimer_cell."'";
                            $claimResults = mysqli_query($conn,$sqlClaim);
                            $getClaimDetails = mysqli_fetch_assoc($claimResults);
                        /*-------------------------SMS ends------------------*/

                        if($ress){
                            /*-------------------------SMS------------------*/

                                
                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";

                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nKindly pay ".$remaining_claim_amount." on the following details\n-----------------------------\n\n
                                Account Holder: ".$getClaimDetails['account_holder']."\n
                                Bank Name (Branch code) : ".$getClaimDetails['bank_name']. (" ".$getClaimDetails['branch'].")\n
                                Account Number : ".$getClaimDetails['account_number']."\n
                                Cell Number : ".$getClaimDetails['p_number']."\n
                                Status : Waiting for you to transfer the amount\n\n
                                NB : Do not forget to login and click send to notify the reciever that you've made the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $donator;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                        if($resss){
                          /*-------------------------SMS ends------------------*/
                             $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";
                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nYou will recieve ".$remaining_claim_amount." from the following details\n-----------------------------\n\n
                                Name & Surname : ".$getDonDetails['fname']." ".$getDonDetails['lname']."\n
                                Cell Number : ".$getDonDetails['p_number']."\n
                                Status : Waiting for this transfer\n\n
                                NB : Do not forget to login and click confirm as soon as you recieve the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $claimer_cell;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                    }else if($remaing_don_amount < $remaining_claim_amount){
                        $remaining_claim = $remaining_claim_amount - $remaing_don_amount;
                        $update_donation = "Update donation SET remaining_don = 0,status = 0 WHERE id = ".@$donator_id.";";
                        $ress = mysqli_query($conn,$update_donation);

                        $update_claims = "Update claims SET remaining_claim = '".$remaining_claim."' AND states = 2 WHERE id = ".@$claimer.";";
                        $resss = mysqli_query($conn,$update_claims);
                       if($ress){
                           /*-------------------------SMS------------------*/

                                
                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";

                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nKindly pay ".$remaing_don_amount." on the following details\n-----------------------------\n\n
                                Account Holder: ".$getClaimDetails['account_holder']."\n
                                Bank Name (Branch code) : ".$getClaimDetails['bank_name']. (" ".$getClaimDetails['branch'].")\n
                                Account Number : ".$getClaimDetails['account_number']."\n
                                Cell Number : ".$getClaimDetails['p_number']."\n
                                Status : Waiting for you to transfer the amount\n\n
                                NB : Do not forget to login and click send to notify the reciever that you've made the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $donator;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                        if($resss){
                          /*-------------------------SMS ends------------------*/
                             $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";
                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nYou will recieve ".$remaining_claim_amount." from the following details\n-----------------------------\n\n
                                Name & Surname : ".$getDonDetails['fname']." ".$getDonDetails['lname']."\n
                                Cell Number : ".$getDonDetails['p_number']."\n
                                Status : Waiting for this transfer\n\n
                                NB : Do not forget to login and click confirm as soon as you recieve the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $claimer_cell;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                             
                    }else{
                        $remaining_don = $remaining_claim_amount - $remaing_don_amount;
                        $update_donation = "Update donation SET remaining_don = 0,status = 0 WHERE id = ".@$donator_id.";";
                        $ress = mysqli_query($conn,$update_donation); 

                        $update_claims = "Update claims SET remaining_claim = 0,states = 2 WHERE id = ".@$claimer.";";
                        $resss = mysqli_query($conn,$update_claims);
                        if($ress){
                            /*-------------------------SMS------------------*/

                              $sql = "select * from users where p_number = '".."'"
                               $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";
                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nKindly pay ".$remaing_don_amount." on the following details\n-----------------------------\n\n
                                Account Holder: ".$getClaimDetails['account_holder']."\n
                                Bank Name (Branch code) : ".$getClaimDetails['bank_name']. (" ".$getClaimDetails['branch'].")\n
                                Account Number : ".$getClaimDetails['account_number']."\n
                                Cell Number : ".$getClaimDetails['p_number']."\n
                                Status : Waiting for you to transfer the amount\n\n
                                NB : Do not forget to login and click send to notify the reciever that you've made the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $donator;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                        if($resss){
                          /*-------------------------SMS ends------------------*/
                             $url = "https://www.winsms.co.za/api/batchmessage.asp?";
          
                                $userp = "user=";
                            
                                $passwordp = "&password=";
                            
                                $messagep = "&message=";
                            
                                $numbersp = "&Numbers=";
                            
                                $username = "rovissm@gmail.com";
                                $password = "Asekhona*03";

                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nYou will recieve ".$remaining_claim_amount." from the following details\n-----------------------------\n\n
                                Name & Surname : ".$getDonDetails['fname']." ".$getDonDetails['lname']."\n
                                Cell Number : ".$getDonDetails['p_number']."\n
                                Status : Waiting for this transfer\n\n
                                NB : Do not forget to login and click confirm as soon as you recieve the payment\n-----------------------------\nFrom Commercial Club.";
                                $numbers = $claimer_cell;
                            
                                $encmessage = urlencode(utf8_encode($message));
                            
                                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
                            
                                $fp = fopen($all, 'r');
                                while(!feof($fp)){
                                $line = fgets($fp, 4000);
                                echo "<br>";
                                echo "Responce";
                                echo "<br>";
                                print($line);
                                echo "<br>";
                                }
                                fclose($fp);
                                 /*-------------------------SMS ends------------------*/
                        }
                    }
            }
            else{
                echo "<script>alert('Wasn't successful');</script>";
            }
            
            $newDate=Date('Y-m-d', strtotime("+10 days")) ." ". date('H:i:s');
            $curtime = date('Y-m-d H:i:s');
        }
        $sql = "Select * from donation WHERE remaining_don > 0";
        $result= mysqli_query($conn,$sql);

        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white; border-color: rgb(218,165,32); border-style: solid; border-width: 3px;">
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
                    <tbody><tr>
                    <form action="" method="post">
                        <td><input type="hidden" name="don_id" value="'.$row['id'].'" hidden/>'.$row['id'].'</td>
                        <td><input type="hidden" name="cell_donator" value="'.$row['cellDonator'].'" hidden/>'.$row['cellDonator'].'</td>
                        <td><input type="hidden" name="amount" value="'.$row['amount'].'" hidden/>'.$row['amount'].'</td>
                        <td><input type="hidden" name="don_date" value="'.$row['donDate'].'" hidden/>'.$row['donDate'].'</td>
                        
                        <td> <select name="claim_option" class="form-control" style="border-color: rgb(218,165,32); border-style: dashed; border-width: 2px;">';
                        $stmnt = "Select c.id AS 'claim_id',fname,remaining_claim from claims C,users S where C.cellClaim = S.p_number AND remaining_claim > 0";
                        $results = mysqli_query($conn,$stmnt);
                        if(mysqli_num_rows($results) > 0){
                            while($rows = mysqli_fetch_assoc($results)){
                                
                                $fnameC = $rows['claim_id'];
                            echo '
                                <option value="'.@$fnameC.'">'.$rows['fname'].' R'.$rows['remaining_claim'].'</option>';
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
                   <td><input type="text" name="remaining_don" value="'.$row['remaining_don'].'" hidden/>'.$row['remaining_don'].'</td>
                   </form><tr>
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