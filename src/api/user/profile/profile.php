<?php
    require_once '../../../classes/Authentication.php'; 
    require_once '../../../classes/Utilisateurs.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    header("Content-Type: application/json; charset=UTF-8");


    $full_name = $email = $old_password = $password = $confirm_pass = $phone = "";

    $errors = array();
    $messages = array();
    $response = array();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["_method"])) {
            if($_POST["_method"] === "PUT_FULL_NAME") {
                // Valider le champ p_name
                if(isset($_POST["full_name"]) && !empty(trim($_POST["full_name"]))) {
                    $full_name = Authentication::process_input($_POST["full_name"]);

                    // Mettre à jour le nom complet de l'utilisateur
                    $user->setFullName($full_name);
                    $messages["full_name"] = "Nom complet mis à jour avec succès";

                    // } else {
                    //     $errors["full_name"] = "Erreur lors de la mise à jour du nom complet";
                    // }
                } else {
                    $errors["full_name"] = "Veuillez renseigner ce champ";
                }
            } else if($_POST["_method"] === "PUT_EMAIL") {
                // Valider le champ email
                if(isset($_POST["email"]) && !empty(trim($_POST["email"]))) {
                    $email = Authentication::process_input($_POST["email"]);
                    // Vérifier si l'adresse email est valide
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errors["email"] = "Adresse email invalide";
                    } else {
                        // Vérifier si l'adresse email existe déjà
                        if($user->is_user_exist_except_me($email)) {
                            $errors["email"] = "Adresse email déjà utilisée";
                        } else {
                            // Mettre à jour l'adresse email de l'utilisateur
                            $user->setEmail($email);
                            $messages["email"] = "Adresse email mise à jour avec succès";
                            
                            // } else {
                            //     $errors["email"] = "Erreur lors de la mise à jour de l'adresse email";
                            // }
                        }
                    }
                } else {
                    $errors["email"] = "Veuillez renseigner ce champ";
                }
            } else if($_POST["_method"] === "PUT_PHONE") {
                // Valider le champ phone
                if(isset($_POST["phone"]) && !empty(trim($_POST["phone"]))) {
                    $phone = Authentication::is_phone_valid($_POST["phone"]);
                    // Vérifier si le numéro de téléphone est valide
                    if(!$phone) {
                        $errors["phone"] = "Numéro de téléphone invalide";
                    } else {
                        $phone = trim($_POST["phone"]);
                        // Mettre à jour le numéro de téléphone de l'utilisateur
                        $user->setPhone($phone);
                        // Mettre à jour le numéro de téléphone de l'utilisateur
                        $messages["phone"] = "Numéro de téléphone mis à jour avec succès";

                        // } else {
                        //     $errors["phone"] = "Erreur lors de la mise à jour du numéro de téléphone";
                        // }
                    }
                } else {
                    $errors["phone"] = "Veuillez renseigner ce champ";
                }
            } else if($_POST["_method"] === "PUT_PASSWORD") {
                // Valider le champ old_password
                if(isset($_POST["old_password"]) && !empty(trim($_POST["old_password"]))) {
                    $old_password = Authentication::process_input($_POST["old_password"]);
                    // Vérifier si le mot de passe est correct
                    if(!Authentication::is_password_strong($old_password)) {
                        $errors["old_password"] = "Mot de passe incorrect";
                    } else {
                        // Vérifier si le mot de passe entrer est le même que celui de l'utilisateur
                        if(!Authentication::verify_password($old_password, $user->getPassword())) {
                            $errors["old_password"] = "Mot de passe incorrect";
                        } else {
                            $messages["old_password"] = "Ancien mot de passe correct";
                        }
                    }
                } else {
                    $errors["old_password"] = "Veuillez renseigner ce champ";
                }

                // Valider le champ password
                if(isset($_POST["password"]) && !empty(trim($_POST["password"]))) {
                    $password = Authentication::process_input($_POST["password"]);
                    // Vérifier si le mot de passe est correct
                    if(!Authentication::is_password_strong($password)) {
                        $errors["password"] = "Mot de passe incorrect";
                    } else {
                        $messages["password"] = "Nouveau mot de passe correct";
                    }
                } else {
                    $errors["password"] = "Veuillez renseigner ce champ";
                }

                // Valider le champ confirm_pass
                if(isset($_POST["confirm_pass"]) && !empty(trim($_POST["confirm_pass"]))) {
                    $confirm_pass = Authentication::process_input($_POST["confirm_pass"]);
                    // Vérifier si le mot de passe de confirmation egale le mot de passe
                    if($confirm_pass !== $password) {
                        $errors["confirm_pass"] = "Les mots de passe ne correspondent pas";
                    } else {
                        $messages["confirm_pass"] = "Confirmation mot de passe correct";
                    }
                } else {
                    $errors["confirm_pass"] = "Veuillez renseigner ce champ";
                }

                // Vérifier si $errors ne contient aucune erreur de mot de passe
                if(empty($errors["old_password"]) && empty($errors["password"]) && empty($errors["confirm_pass"])) {
                    // Mettre à jour le mot de passe de l'utilisateur
                    if($user->setPassword(Authentication::hash_password($password))) {
                        $messages["password"] = "Mot de passe mis à jour avec succès";

                        // Ajouter une notification
                        $response["notification"] = "Mot de passe mis à jour avec succès";
                        
                    } else {
                        $errors["password"] = "Erreur lors de la mise à jour du mot de passe";
                    }
                }
            } else {
                $errors["_method"] = "requête invalide";
            }
        } else {
            $errors["_method"] = "requête invalide";
        }
        // Vérifier si $errors ne contient aucune erreur
        if(empty($errors)) {
            $response["success"] = true;
            $response["message"] = $messages;
            $response["error"] = $errors;
        } else {
            $response["success"] = false;
            $response["error"] = $errors;
            $response["message"] = $messages;
        }
        echo json_encode($response);
    } else {
        $response = array(
            "error" => "requête invalide -> " . $_SERVER["REQUEST_METHOD"] . " " . $_SERVER["REQUEST_URI"]
        );
        echo json_encode($response);
    }