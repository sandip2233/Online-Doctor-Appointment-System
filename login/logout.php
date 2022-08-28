<?php
session_start();
if(session_destroy())
{
echo "<script type='text/javascript'>alert('logout successfully!')</script>"; 
echo "<script> window.location.assign('../index.html'); </script>";
}
?>