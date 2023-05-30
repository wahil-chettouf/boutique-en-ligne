<?php
    require_once("../classes/Utilisateurs.php");
    $user->disconnect();

    header("Location: ../../index.php");
    exit();