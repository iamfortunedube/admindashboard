<div class="welcomeTitle mainTitle">
    <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Transactions</h3>
</div>
<table class="table table-condensed" style="margin-top: -5px;">
    <thead>
        <tr style="background: black; color: white; border-color: rgb(218,165,32); border-style: solid; border-width: 3px;">
            <th>#</th>
            <th>Donor</th>
            <th>Receiver</th>
            <th>Transaction Amount</th>
            <th>Transaction Date</th>
            <th>Transaction Status</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $select_trans = "SELECT * FROM allocation";
        $execute_trans = mysqli_query($conn, $select_trans);
        if(mysqli_num_rows($execute_trans)>0){
            while($row = mysqli_fetch_assoc($execute_trans)){
                echo '<tr>'.$row['id'].'</tr>';
            }
        }
        ?>
    </tbody>
</table>