<?php include("inc/mainHeader.php");?>
  <?php include("inc/profileContent.php");?>
<?php include("inc/mainFooter.php");?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #profile').addClass('active');
    });
</script>  