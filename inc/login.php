

<div class="bg">

</div>
<div class="fomrLogin">
    <div class="welcomeTitle mainTitle">
        <h3 style='font-family: "Comic Sans MS", cursive, sans-serif; text-align: center'>Administration Login</h3>
    </div>
    <?php include("server/loginScript.php");?>
    <form class="form-login" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>"  style="font-size: 14pt; margin: 6% 5%">
        <label for="">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Enter Username" style="font-size: 12pt;">
        <?php echo "<span style='color: red;'>".@$errUsername."</span>"?>
        <label for="">Password</label>
        <input type="password" class="form-control" name="password" placeholder="Enter Password" style="font-size: 12pt;">
        <?php echo "<span style='color: red;'>".@$errPassword."<span>"?>
        <input type="submit" name="submit" class="form-control btn-default" value="Sign in" style="background: black; font-size: 12pt;"/>
    </form>
    <?php echo "<span style='color: red;'>".@$errMessage."<span>"?>
    <?php echo "<span style='color: green;'>".@$succMessage."<span>"?>
</div>
<?php include("./server/loginScript.php")?>