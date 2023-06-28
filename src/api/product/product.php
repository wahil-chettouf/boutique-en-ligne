<?php
    require_once '../../../src/classes/Authentication.php'; 
    require_once '../../../src/classes/Products.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    header("Content-Type: application/json; charset=UTF-8");

    $p_name = $p_current_price = $p_qty = $p_featured_photo = "";
    $p_description = $p_short_description = $p_feature = $ecat_id = "";

    $errors = array();

    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        // verifie si on recois une requete get avec l'id de product on retourne le product depuis la method getProductById($id)
        if(isset($_GET['p_id'])) {
            $product = Products::getProductById($_GET['p_id']);
            echo json_encode([
                "status" => "success",
                "product" => $product
            ]);
        } else {
            $products = Products::getAllProducts();
            echo json_encode($products);
        }
    } 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Valider et récupérer les valeurs des champs du formulaire
    
        // Valider le champ p_name
        if (isset($_POST["p_name"]) && !empty(trim($_POST["p_name"]))) {
            $p_name = Authentication::process_input($_POST["p_name"]);
        } else {
            $errors["p_name"] = "Veuillez entrer le nom du produit";
        }
    
        // Valider le champ p_current_price
        if (isset($_POST["p_current_price"])) {
            $p_current_price = floatval($_POST["p_current_price"]);
        } else {
            $errors["p_current_price"] = "Veuillez entrer un prix valide";
        }
    
        // Valider le champ p_qty
        if (isset($_POST["p_qty"])) {
            $p_qty = intval($_POST["p_qty"]);
        } else {
            $errors["p_qty"] = "Veuillez entrer une quantité valide";
        }
    
        // Valider le champ p_description
        if (isset($_POST["p_description"]) && !empty(trim($_POST["p_description"]))) {
            $p_description = Authentication::process_input($_POST["p_description"]);
        } else {
            $errors["p_description"] = "Veuillez entrer la description du produit";
        }
    
        // Valider le champ p_short_description
        if (isset($_POST["p_short_description"]) && !empty(trim($_POST["p_short_description"]))) {
            $p_short_description = Authentication::process_input($_POST["p_short_description"]);
        } else {
            $errors["p_short_description"] = "Veuillez entrer la description courte du produit";
        }
    
        // Valider le champ p_feature
        // if (isset($_POST["p_feature"])) {
        //     $p_feature = Authentication::process_input($_POST["p_feature"]);
        // } else {
        //     $errors["p_feature"] = "Veuillez sélectionner une fonctionnalité";
        // 

        if (isset($_POST["ecat_id"])) {
            if($_POST["ecat_id"] == "homme") {
                $ecat_id = 1;
            } else if($_POST["ecat_id"] == "femme") {
                $ecat_id = 2;
            } else {
                $errors["ecat_id"] = "Veuillez sélectionner une catégorie valide";
            }
        } else {
            $errors["ecat_id"] = "Veuillez sélectionner une catégorie valide";
        }

        if (empty($errors)) {
            // Valider le champ p_featured_photo
            if (isset($_FILES["p_featured_photo"])) {
                $file = $_FILES["p_featured_photo"];
                if ($file["error"] === UPLOAD_ERR_OK) {
                    // Valider le type de fichier (image)
                    $allowedTypes = array("image/jpeg", "image/png");
                    if (in_array($file["type"], $allowedTypes)) {
                        // Ajouter un timestamp au nom de fichier pour le rendre unique
                        $timestamp = round(microtime(true) * 1000);
                        $file["name"] = $timestamp . "_" . $file["name"];
        
                        // Déplacer le fichier vers un répertoire approprié
                        $destination = "../../../dist/images/product/". $_POST["ecat_id"] . "/" . $file["name"];
                        if (move_uploaded_file($file["tmp_name"], $destination)) {
                            $p_featured_photo = "$path/dist/images/product/". $_POST["ecat_id"] . "/" . $file["name"];
                        } else {
                            $errors["p_featured_photo"] = "Erreur lors de l'importation de l'image";
                        }
                    } else {
                        $errors["p_featured_photo"] = "Veuillez sélectionner une image au format JPEG ou PNG";
                    }
                } else {
                    $errors["p_featured_photo"] = "Erreur lors de l'importation de l'image";
                }
            } else {
                $errors["p_featured_photo"] = "Veuillez sélectionner une image";
            }

            if (empty($errors)) {
                $product = Products::addProduct($p_name, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $ecat_id);
            } else {
                $response = array(
                    "errors" => $errors
                );
                echo json_encode($response);
                exit();
            }
    
            // Réponse JSON en cas de succès
            $response = array(
                "success" => "Le produit a été ajouté avec succès"
            );
        } else {
            // Réponse JSON en cas d'erreurs de Authentication
            $response = array(
                "errors" => $errors
            );
        }
        echo json_encode($response);
    }
    
    if($_SERVER["REQUEST_METHOD"] == "DELETE") {
        // verifie si on recois une requete delete avec l'id de product on supprime le product depuis la method deleteProductById($id)
        if(isset($_GET['delete_p_id'])) {
            $product = Products::deleteProductById($_GET['delete_p_id']);
            echo json_encode($product);
        }
    }

    if($_SERVER["REQUEST_METHOD"] == "PUT") {
        echo json_encode(["status" => "success"]);
    }