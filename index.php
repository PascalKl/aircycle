<?php ?>
    <title>Admin</title>
<?php 
    include 'functions.php';


?><script language="javascript" type="text/javascript" >
    function pull(){
        var msg = <?php git_pull(); ?>;
        alert("Test: " + msg);
    }
</script>
<button onclick="pull()">Pull from GitHub</button>
<?php
echo "Test";
?>
