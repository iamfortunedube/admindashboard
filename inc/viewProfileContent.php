<style>
    #modal{
        margin: 0 20% 0 20%;
    }
</style>
<div class="welcomeTitle mainTitle">
    <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Member Profile</h3>
</div>
<div class="row">
    <div class="col-md-6">
        
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Profile</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Firstname</label>
                            <input class="form-control" require type="text" name="fname" placeholder="Name" value="<?php echo @$_SESSION['u_fname'];?>" disabled/>
                          </div>
                        </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Lastname</label>
                            <input class="form-control" require type="text" name="sname" placeholder="Surname" value="<?php echo @$_SESSION['u_lname'];?>" disabled/>
                         </div>
                        </div>  
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" require type="text" name="username" value="<?php echo @$_SESSION['u_cellNo'];?> " disabled/>
                    </div>
                  
                </form>               
        </div>
        <?php include("server/updatePassword.php");?>
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Password</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                   <div class="form-group">
                        <input class="form-control" required type="text" name="oldPassword" placeholder="Old Password" maxlength="15"/>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                         <div class="form-group">
                            <input class="form-control" required type="text" name="newPassword" placeholder="New Password" maxlength="15"/>
                          </div>
                        </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <input class="form-control" required type="text" name="varNewPassword" placeholder="Verify New Password" maxlength="15"/>
                         </div>
                        </div>  
                    </div>
                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Update Details"/>
                    <?php echo "<span style='color:red'>".@$errMessage."</span>";?>
                </form>               
        </div>
    </div>
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                        <h6>Bank Details</h6>
                </div>
                <span class="welcomeContent">
                    <div class="form-group">
                    <label>Bank Name</label>
                <input class="form-control" require type="text" name="backName" value="<?php echo @$_SESSION['u_bankName'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Universal Code</label>
                        <input class="form-control" require type="text" name="uniCode" value="<?php echo @$_SESSION['u_uniCode'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Account Holder</label>
                        <input class="form-control" require type="text" name="accHolder" value="<?php echo @$_SESSION['u_accHolder'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <label>Account Number</label>
                        <input class="form-control" require type="text" name="accNumber" value="<?php echo @$_SESSION['u_accNo'];?>" disabled/>
                    </div>
                    
                </span>
        </div>
    </div>
</div>