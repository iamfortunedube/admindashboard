<div class="welcomeTitle mainTitle">
    <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Members</h3>
</div>
<?php
    if(@$_POST['submit'] == "View"){
        @$_SESSION['u_i'] = $_POST['id'];
        @$_SESSION['u_fname'] = $_POST['fname'];
        @$_SESSION['u_lname'] = $_POST['lname'];
        @$_SESSION['u_cellNo'] = $_POST['p_number'];
        @$_SESSION['u_bankName'] = $_POST['bank_name'];
        @$_SESSION['u_uniCode'] = $_POST['uni_code'];
        @$_SESSION['u_accHolder'] = $_POST['account_holder'];
        @$_SESSION['u_accNo'] = $_POST['account_number'];
        @$_SESSION['u_status'] = $_POST['status'];

        echo "<script>alert(".$_SESSION['u_i'].");window.location.href = 'viewUserProfile.php';</script>";
    }
    $sql = "Select * From users";
    $result= mysqli_query($conn,$sql);
    echo '<table class="table table-condensed" style="margin-top: -5px;" id="user-table">
            
        <tr style="background: black; color: white;">
            <th>#</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Cell No.</th>
            <th>Bank Name</th>
            <th>Universal Code</th>
            <th>Account Holder</th>
            <th>Account</th>
            <th>Status</th>
            <th>Action</th>
        </tr>';
    
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
            echo    '
                            <tr>
                            <form action="" method="post">
                            <td><input type="text" name="id" hidden value="'.$row['id'].'"/>'.$row['id'].'</td>
                            <td><input type="text" name="fname" hidden value="'.$row['fname'].'"/>'.$row['fname'].'</td>
                            <td><input type="text" name="lname" hidden value="'.$row['lname'].'"/>'.$row['lname'].'</td>
                            <td><input type="text" name="p_number" hidden value="'.$row['p_number'].'"/>'.$row['p_number'].'</td>
                            <td><input type="text" name="bank_name" hidden value="'.$row['bank_name'].'"/>'.$row['bank_name'].'</td>
                            <td><input type="text" name="uni_code" hidden value="'.$row['universal_code'].'"/>'.$row['universal_code'].'</td>
                            <td><input type="text" name="account_holder" hidden value="'.$row['account_holder'].'"/>'.$row['account_holder'].'</td>
                            <td><input type="text" name="account_number" hidden value="'.$row['account_number'].'"/>'.$row['account_number'].'</td>
                            <td><input type="text" name="status" hidden value="'.$row['status'].'"/>'.$row['status'].'</td>
                            <td><input type="submit" name="submit" id="btn-view" class="btn btn-success" value="View"/></td>
                            </form>
                    </tr> ';
                    }
                echo '</table>';
        }
        else{
            echo 'Data not found';
        }
?>