<?php

if (!isLoggedIn())
{
   header('Location: ../../index.php');
    //header("location: FormularioLogin.php ");
}
?>