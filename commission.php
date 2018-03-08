
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
                <tbody>';
                $select_commission = "select u.id AS 'user_id', u.fname,u.lname,newTable.tot_num_ref,newTable.tot_com,u.p_number from users u,(select DISTINCT refere,count(r.id) AS 'tot_num_ref',sum(commission_amount) AS 'tot_com' from referals r,users u where r.refere = u.ref_code AND r.redered = u.p_number GROUP BY r.refere) newTable where u.p_number = newTable.refere;";
                $execute = mysqli_query($conn,$select_commission);
                if(mysqli_num_rows($execute)>0){
                  while ($row = mysqli_fetch_assoc($execute)){
                      echo '
                        <tr>
                            <td>'.$row['user_id'].'</td>
                            <td>'.$row['fname'].' '.$row['lname'].'</td>
                            <td>'.$row['p_number'].'</td>
                            <td>'.$row['tot_num_ref'].'</td>
                            <td> R'.$row['tot_com'].'</td>
                            <td>Action</td>
                        </tr>
                    ';
                  }
                }
                echo '
                </tbody
              </table> 
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