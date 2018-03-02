
<?php 
      include("inc/mainHeader.php");
      include("./server/config.php");
      if(!empty($_SESSION["u_id"])){   
        include("inc/claimsContent.php");

        if(@$_POST['submit'] == "Allocate"){
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            $d = $_POST['d'];
            $aa = $_POST['aa'];
            $ab = $_POST['ab'];

            echo "<script>alert('".$a." ".$b." ".$c." ".$d." ".$aa." ".$ab."');</script>";
        }
        $stmnt = "Select * From claims";
        $result = mysqli_query($conn,$stmnt);

        $sql = "Select * from donation D,users S where D.cellDonator = S.p_number";
        $results= mysqli_query($conn,$sql);

        echo '<table class="table table-condensed" style="margin-top: -5px;">
                <thead>
                  <tr style="background: black; color: white;">
                      <th>#</th>
                      <th>Cell no</th>
                      <th>Amount</th>
                      <th>Count Down</th>
                      <th>Donor</th>
                      <th>Action</th>
                  </tr>
                </thead>    
            ';
            if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_assoc($result)){
                echo '
                    <tbody>

                      <form action="" method="post">
                          <td><input type="text" name="a" value="'.$row['id'].'" hidden/>'.$row['id'].'</td>
                          <td><input type="text" name="b" value="'.$row['cellClaim'].'" hidden/>'.$row['cellClaim'].'</td>
                          <td><input type="text" name="c" value="'.$row['amount'].'" hidden/>'.$row['amount'].'</td>
                          <td><input type="text" name="d" value="'.$row['donDate'].'" hidden/>'.$row['donDate'].'</td>
                          <td><input type="hidden" name="aa" value="'.@$fnameD.'" hidden />
                          <input type="hidden" name="ab" value="'.@$amountDon.'" hidden />
                          <select class="form-control">';
                          if(mysqli_num_rows($results) > 0){
                              while($rows = mysqli_fetch_assoc($results)){
                                $fnameD = $rows['fname'];
                                $amountDon = $rows['amount'];
                              echo '
                              <option>'.$rows['fname'].' R'.$rows['amount'].'</option>';
                              }
                          } echo '
                          </select></td>
                          <td><input type="submit" name="submit" class="btn btn-success" value="Allocate"/></td>
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