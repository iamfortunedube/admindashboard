<?php 
    include("./server/config.php");

    $select_active_users = "SELECT * FROM `users` where status = 1";
    $res = mysqli_query($conn, $select_active_users);
    $active_users = mysqli_num_rows($res);

    $select_comp_trans = "SELECT * FROM allocation where status = 1";
    $ress = mysqli_query($conn,$select_comp_trans);
    $complete_trans = mysqli_num_rows($ress);

    $curdate = date('Y-m-d');

    $select_day_trans = "SELECT * FROM allocation";
    $execute_day = mysqli_query($conn, $select_day_trans);
    $count = 0;

    while($date = mysqli_fetch_assoc($execute_day)){
        $allocate_date = substr($date['allocated_time'],0,10);
        //echo $curdate." ,".$allocate_date."<br/>";
        if($allocate_date == $curdate){
            $count++;
        }
    }

?>
<div class="welcomeTitle mainTitle">
    <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Dashboard</h3>
</div>
<div class="wrapper">
    <div class="row">
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success text-white">
                <div class="card-body" style="border-color: rgb(218,165,32); border-style: solid; border-width: 2px;">
                    <h4 class="font-weight-normal mb-3">Today's Transactions</h4>
                    <h2 class="font-weight-normal mb-5"><?php echo ''.$count.'';?></h2>
                    <p class="card-text">Increased by 30%</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-warning text-white">
                <div class="card-body" style="border-color: rgb(218,165,32); border-style: solid; border-width: 2px;">
                    <h4 class="font-weight-normal mb-3">Active Users</h4>
                    <h2 class="font-weight-normal mb-5"><?php echo ''.$active_users.'';?></h2>
                    <p class="card-text">Incresed by 40%</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-info text-white">
                <div class="card-body" style="border-color: rgb(218,165,32); border-style: solid; border-width: 2px;">
                    <h4 class="font-weight-normal mb-3">Blocked Users</h4>
                    <h2 class="font-weight-normal mb-5">125</h2>
                    <p class="card-text">Decreased by 10%</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 stretch-card grid-margin">
            <div class="card bg-gradient-success text-white">
                <div class="card-body" style="border-color: rgb(218,165,32); border-style: solid; border-width: 2px;">
                    <h4 class="font-weight-normal mb-3">Completed Transactions</h4>
                    <h2 class="font-weight-normal mb-5"><?php echo ''.$complete_trans.'';?></h2>
                    <p class="card-text">Increased by 5%</p>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>