

<div class="bg">
</div>

<div class="fomrLogin">
    <div class="welcomeTitle">
        <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Administration Login</h3>
    </div>
    <?php include("server/loginScript.php");?>
    <form class="form-login" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"  style="font-size: 14pt; margin: 6% 5%">
        <label for="">Username</label>
        <input type="text" class="form-control" placeholder="Enter Username">
        <label for="">Password</label>
        <input type="password" class="form-control" placeholder="Enter Password">
        <input type="submit" name="submit" class="form-control btn-default" value="Sign in" style="background: black;"/>
    </form>
</div>