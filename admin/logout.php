<?php
    session_start();

    if (isset($_SESSION['admin']))
    {
        unset($_SESSION['admin']);

        header("Location:../index.php");
    }

    elseif (isset($_SESSION['doctor']))
    {
        unset($_SESSION['doctor']);

        header("Location:../index.php");
    }
?>