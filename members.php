<?php include("inc/mainHeader.php");?>
  <?php include("inc/membersContent.php");?>
<?php include("inc/mainFooter.php");?>
<script>
    $(document).ready(function(){
      $('.sidebar-menu ul li a').removeClass('active');
      $('.sidebar-menu ul li #members').addClass('active');
    });
</script>  