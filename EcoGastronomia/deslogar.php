<?php
session_start();
$_SESSION['logado']=0;
$_SESSION['logado']="";

session_destroy();
echo "<script>window.location.href='Ecogastro.html'</script>";



?>                               