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
                <li><a id="donations" href="donations.php"><i class="fas fa-money-bill-alt"></i> Allocation</a></li>
                <li><a id="donors" href="donors.php"><i class="fas fa-hand-paper"></i> Donors</a></li>
                <li><a id="claims" href="claims.php"><i class="fas fa-american-sign-language-interpreting"></i> Claims</a></li>
                <li><a id="commissions" href="commission.php"><i class="fas fa-link"></i> Commissions</a></li>
                <li><a id="transaction" href="transactions.php"><i class="fas fa-credit-card"></i> Transactions</a></li>
                <li><a id="blocked-users" href="blockedUsers.php"><i class="fas fa-user-times"></i> Blocked Users</a></li>
                <li><a id="sign-out" href="server/logOut.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
            </div>
        </li>
    </ul>    
</div>
';
}
?>