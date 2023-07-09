<?php
    require_once("../classes/Utilisateurs.php");
    require_once("../classes/Authentication.php");
    header("Content-Type: application/json; charset=UTF-8");

    $full_name_err = $email_err = $password_err = $confirm_pass_err = $phone_err = "";
    $full_name = $email = $password = $confirm_pass = $phone = "";

    // Vérifier si on recois une requete POST
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifiaction du nom complet
        if(isset($_POST["full_name"]) && !empty(trim($_POST["full_name"]))) {
            $full_name = Authentication::process_input($_POST["full_name"]);
        } else {
            $full_name_err = "Veuillez entrer votre nom complet";
        }

        // Vérification de l'email
        if(isset($_POST["email"]) && !empty(trim($_POST["email"]))) {
            if(filter_var(Authentication::process_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                // Vérification si l'utilisateur existe déjà
                if(Utilisateurs::is_user_exist(Authentication::process_input($_POST["email"]))) {
                    $email_err = "Cet utilisateur existe déjà";
                } else {
                    $email = Authentication::process_input($_POST["email"]);
                }
            } else {
                $email_err = "Veuillez entrer une adresse email valide";
            }
        } else {
            $email_err = "Veuillez entrer votre adresse email";
        }

        // Vérification du mot de passe
        if(isset($_POST["password"]) && !empty(trim($_POST["password"]))) {
            if(Authentication::is_password_strong(Authentication::process_input($_POST["password"]))) {
                $password = Authentication::process_input($_POST["password"]);
            } else {
                $password_err = "Votre mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial";
            }
        } else {
            $password_err = "Veuillez entrer votre mot de passe";
        }

        // Vérification de la confirmation du mot de passe
        if(isset($_POST["confirm_pass"]) && !empty(trim($_POST["confirm_pass"]))) {
            $confirm_pass = Authentication::process_input($_POST["confirm_pass"]);
            if($confirm_pass !== $password) {
                $confirm_pass_err = "Les mots de passe ne correspondent pas";
            }
        } else {
            $confirm_pass_err = "Veuillez confirmer votre mot de passe";
        }

        // Vérification du numéro de téléphone
        if(isset($_POST["phone"]) && !empty(trim($_POST["phone"]))) {
            if(Authentication::is_phone_valid($_POST["phone"])) {
                $phone = Authentication::process_input($_POST["phone"]);
            } else {
                $phone_err = "Veuillez entrer un numéro de téléphone valide";
            }
        } else {
            $phone_err = "Veuillez entrer votre numéro de téléphone";
        }
        
        // Vérification des erreurs de saisie
        if(empty($full_name_err) && empty($email_err) && empty($password_err) && empty($confirm_pass_err) && empty($phone_err)) {
            // Vérification si l'utilisateur a été ajouté
            if($user->add_user($full_name, $email, $password, $phone, "client")) {
                // Déplacer la photo dans le dossier images
                echo json_encode(array("success" => "L'utilisateur a été ajouté avec succès"));
                
                //move_uploaded_file($_FILES["photo"]["tmp_name"], "../images/".$photo);
            } else {
                echo json_encode(array("error" => "L'utilisateur n'a pas été ajouté"));
            }
        } else {
            // Afficher les erreurs en utilisant fetch en javascript
            $response = array(
                "full_name_err" => $full_name_err,
                "email_err" => $email_err,
                "password_err" => $password_err,
                "confirm_pass_err" => $confirm_pass_err,
                "phone_err" => $phone_err,
            );
            
            echo json_encode($response);
        }
    }