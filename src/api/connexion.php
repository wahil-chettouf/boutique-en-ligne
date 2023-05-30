<?php
    require_once("../classes/Utilisateurs.php");
    require_once("../classes/Authentication.php");
    header("Content-Type: application/json; charset=UTF-8");

    $email = $password = "";
    $email_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["email"]) && !empty(trim($_POST["email"]))) {
            if(filter_var(Authentication::process_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $email = Authentication::process_input($_POST["email"]);
            } else {
                $email_err = "Veuillez entrer une adresse email valide";
            }
        } else {
            $email_err = "Veuillez entrer votre adresse email";
        }

        if(isset($_POST["password"]) && !empty(trim($_POST["password"]))) {
            if(Authentication::is_password_strong(Authentication::process_input($_POST["password"]))) {
                $password = Authentication::process_input($_POST["password"]);
            } else {
                $password_err = "Votre mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial";
            }
        } else {
            $password_err = "Veuillez entrer votre mot de passe";
        }

        if(empty($email_err) && empty($password_err)) {
            $user->connect($email, $password);
            if($user->isConnected()) {
                $response = array(
                    "success" => "Vous êtes connecté"
                );
                echo json_encode($response);
            } else {
                $response = array(
                    "error" => "email ou mot de passe incorrect"
                );
                echo json_encode($response);
            }
        } else {
            // Afficher les erreurs en utilisant fetch en javascript
            $response = array(
                "email_err" => $email_err,
                "password_err" => $password_err,
            );
            
            echo json_encode($response);
        }
    } else {
        $response = array(
            "error" => "Veuillez entrer votre adresse email et votre mot de passe"
        );
        echo json_encode($response);
    }