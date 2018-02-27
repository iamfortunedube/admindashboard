
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
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
                echo '<tr>
                            <td>'.$row['id'].'</td>
                            <th>'.$row['fname'].'</th>
                            <th>'.$row['lname'].'</th>
                            <th>'.$row['p_number'].'</th>
                            <th>'.$row['bank_name'].'</th>
                            <th>'.$row['account_holder'].'</th>
                            <th>'.$row['account_number'].'</th>
                            <th>'.$row['status'].'</th>
                            <th><input type="submit" class="btn btn-success" value="View"/></th>
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