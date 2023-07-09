<?php
    require_once '../../../classes/Authentication.php'; 
    require_once '../../../classes/Utilisateurs.php'; 
    require_once '../../../classes/Address.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    header("Content-Type: application/json; charset=UTF-8");


    $address_line_1 = $address_line_2 = $city = $state = $zip_code = $country = $address_id = "";

    $errors = array();
    $messages = array();
    $response = array();

    if($_SERVER["REQUEST_METHOD"] === "POST") {
        if(isset($_POST["_method"])) {
            if($_POST["_method"] === "PUT_ADDRESS") {
                if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
                    $address_id = Authentication::process_input($_GET["id"]);
                } else {
                    $response["error_id_address"] = 'Veuillez renseigner ce champ (get id)';
                }
                // Valide le champ address_line_1
                if(isset($_POST["address_line_1"]) && !empty(trim($_POST["address_line_1"]))) {
                    $address_line_1 = Authentication::process_input($_POST["address_line_1"]);
                    $messages["address_line_1"] = "Le champ address_line_1 est bien";
                } else {
                    $errors["address_line_1"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ address_line_2
                if(isset($_POST["address_line_2"]) && !empty(trim($_POST["address_line_2"]))) {
                    $address_line_2 = Authentication::process_input($_POST["address_line_2"]);
                    $messages["address_line_2"] = "Le champ address_line_2 est bien";
                } else {
                    $errors["address_line_2"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ city
                if(isset($_POST["city"]) && !empty(trim($_POST["city"]))) {
                    $city = Authentication::process_input($_POST["city"]);
                    $messages["city"] = "Le champ city est bien";
                } else {
                    $errors["city"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ state
                if(isset($_POST["state"]) && !empty(trim($_POST["state"]))) {
                    $state = Authentication::process_input($_POST["state"]);
                    $messages["state"] = "Le champ state est bien";
                } else {
                    $errors["state"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ zip_code
                if(isset($_POST["zip_code"]) && !empty(trim($_POST["zip_code"]))) {
                    if(!preg_match("/^[0-9]{5}$/", $_POST["zip_code"])) {
                        $errors["zip_code"] = "Le code postal doit contenir 5 chiffres";
                    } else {
                        $zip_code = Authentication::process_input($_POST["zip_code"]);
                        $messages["zip_code"] = "Le champ zip_code est bien";
                    }
                } else {
                    $errors["zip_code"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ country
                if(isset($_POST["country"]) && !empty(trim($_POST["country"]))) {
                    $country = Authentication::process_input($_POST["country"]);
                    $messages["country"] = "Le champ country est bien";
                } else {
                    $errors["country"] = "Veuillez renseigner ce champ";
                }

                if(empty($errors)) {
                    $address = new Address($address_id);
                    $address->updateAddress($address_line_1, $address_line_2, $city, $state, $zip_code, $country);

                    $messages["address"] = "Adresse modifiée avec succès";
                    $response["success"] = true;
                }
            } else if($_POST["_method"] === "POST_ADDRESS") {
                // Valide le champ address_line_1
                if(isset($_POST["address_line_1"]) && !empty(trim($_POST["address_line_1"]))) {
                    $address_line_1 = Authentication::process_input($_POST["address_line_1"]);
                } else {
                    $errors["address_line_1"] = "Veuillez renseigner ce champ";
                }
                
                // Valide le champ address_line_2
                if(isset($_POST["address_line_2"]) && !empty(trim($_POST["address_line_2"]))) {
                    $address_line_2 = Authentication::process_input($_POST["address_line_2"]);
                } else {
                    $errors["address_line_2"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ city
                if(isset($_POST["city"]) && !empty(trim($_POST["city"]))) {
                    $city = Authentication::process_input($_POST["city"]);
                } else {
                    $errors["city"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ state
                if(isset($_POST["state"]) && !empty(trim($_POST["state"]))) {
                    $state = Authentication::process_input($_POST["state"]);
                } else {
                    $errors["state"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ zip_code
                if(isset($_POST["zip_code"]) && !empty(trim($_POST["zip_code"]))) {
                    $zip_code = Authentication::process_input($_POST["zip_code"]);
                } else {
                    $errors["zip_code"] = "Veuillez renseigner ce champ";
                }

                // Valide le champ country
                if(isset($_POST["country"]) && !empty(trim($_POST["country"]))) {
                    $country = Authentication::process_input($_POST["country"]);
                } else {
                    $errors["country"] = "Veuillez renseigner ce champ";
                }

                if(empty($errors)) {
                    // Ajoute l'adresse
                    Address::addAddress($address_line_1, $address_line_2, $city, $state, $zip_code, $country);

                    $messages["address"] = "Adresse ajoutée avec succès";
                    $response["notification"] = "Adresse ajoutée avec succès";
                    $response["success"] = true;
                } else {
                    $response["success"] = false;
                }
            } else {
                $errors["request"] = "Méthode de requête non autorisée 1";
            }
        } else {
            $errors["request"] = "Méthode de requête non autorisée 2";
        }
        $response["errors"] = $errors;
        $response["messages"] = $messages;
        echo json_encode($response);
    } else if($_SERVER["REQUEST_METHOD"] === "DELETE") {
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            $id = Authentication::process_input($_GET["id"]);
            Address::deleteAddress($id);
            $messages["address"] = "Adresse supprimée avec succès";
            $response["notification"] = "Adresse supprimée avec succès";
            $response["success"] = true;
        } else {
            $response["success"] = false;
            $errors["request"] = "Méthode de requête non autorisée 3";
        }
        echo json_encode([
            "errors" => $errors,
            "messages" => $messages,
            "response" => $response
        ]);
    } else if($_SERVER["REQUEST_METHOD"] === "GET") {
        if(isset($_GET["id"])) {
            $address = new Address(Authentication::process_input($_GET["id"]));
            $response["success"] = true;
            $response["address"] = $address->getAllInfo();
        } else {
            $address = Address::getAddresses();
            $response["success"] = true;
            $response["addresses"] = $address;
        }
        $response["errors"] = $errors;
        $response["messages"] = $messages;
        echo json_encode($response);
    } else {
        $response["success"] = false;
        $errors["request"] = "Méthode de requête non autorisée 6";
    }