<?php

    session_start();
    unset($_SESSION['u_id']);
    unset($_SESSION['u_firstName']);

    header('location: ../../../front-end/index.php');
?>