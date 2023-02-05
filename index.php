<?php 
    require "functions.php";
?>
<script>
    function pull(){
        var msg = <?php git_pull(); ?>;
        window.alert(msg);
    }
</script>
<button onclick="pull()">Pull from GitHub</button>
<?php

?>