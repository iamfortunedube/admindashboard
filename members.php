
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      include("inc/modal.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/membersContent.php");

        $sql = "Select * From users";
        $result= mysqli_query($conn,$sql);
        echo '<table class="table table-condensed" style="margin-top: -5px;">
                  
                <tr style="background: black; color: white;">
                    <th>#</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Cell No.</th>
                    <th>Bank Name</th>
                    <th>Account Holder</th>
                    <th>Account</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>';
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo    '<tr>
                            <form action="" method="post">
                                <td><input type="text" name="id" hidden values="'.$row['id'].            '"/>'.$row['id'].       '</td>
                                <td><input type="text" name="fname" hidden values="'.$row['fname'].         '"/>'.$row['fname'].     '</td>
                                <td><input type="text" name="lname" hidden values="'.$row['lname'].         '"/>'.$row['lname'].       '</td>
                                <td><input type="text" name="p_number" hidden values="'.$row['p_number'].      '"/>'.$row['p_number'].      '</td>
                                <td><input type="text" name="bank_name" hidden values="'.$row['bank_name'].     '"/>'.$row['bank_name'].     '</td>
                                <td><input type="text" name="account_holder" hidden values="'.$row['account_holder'].'"/>'.$row['account_holder'].'</td>
                                <td><input type="text" name="account_number" hidden values="'.$row['account_number'].'"/>'.$row['account_number'].'</td>
                                <td><input type="text" name="status" hidden values="'.$row['status'].'"/>'.$row['status'].'</td>
                                <td><input type="button" data-toggle="modal" data-target="#myModal" name="btn-view" id="btn-view" class="btn btn-success" value="View"/></td>
                            </form>
                        </tr>';
                    }
                 echo '</table>';
        }
        else{
            echo 'Data not found';
        }
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
</script>   