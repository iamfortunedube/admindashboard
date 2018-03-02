<?php
if(isset($_SESSION["u_id"])){
echo '
<div class="sidebar-menu">
    <ul>
    <li>
            <div class="userProfile">
                <div class="imageLeft">
                    <img src="assets/avatar.png" width="70" height="70" alt="image" />
                </div>
                <div class="userWelcome">
                    <p class="welcome">Welcome <b>'.@$_SESSION['name'].'</b></p>
                    <p>Username: '.@$_SESSION['username'].'</p>
                </div>
                <li><a id="dashboard" href="dashboard.php"><i class="fas fa-eye"></i> Overview</a></li>
                <li><a id="members" href="members.php"><i class="fas fa-users"></i> Members</a></li>
                <li><a id="donations" href="donations.php"><i class="fas fa-money-bill-alt"></i> Donations</a></li>
                <li><a id="claims" href="claims.php"><i class="fas fa-credit-card"></i> Claims</a></li>
                <li><a id="transaction" href="transactions.php"><i class="fas fa-credit-card"></i> Transactions</a></li>
                <li><a id="blocked-users" href="blockedUsers.php"><i class="fas fa-user-times"></i> Blocked Users</a></li>
                <li><a id="sign-out" href="server/logOut.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
            </div>
        </li>
        <li style="position:fixed;bottom:0;decoration: none; left:0; margin: 0% -2%; z-index: -1;"><img src="assets/logoCC.png" width="200" height="200" alt="logo"/></li>
    </ul>    
</div>
';
}
?>