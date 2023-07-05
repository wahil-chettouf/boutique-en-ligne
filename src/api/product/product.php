<?php
    require_once '../../../src/classes/Authentication.php'; 
    require_once '../../../src/classes/Products.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    header("Content-Type: application/json; charset=UTF-8");

    $p_name = $p_current_price = $p_stock = $p_featured_photo = "";
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
    
        // Valider le champ p_stock
        if (isset($_POST["p_stock"])) {
            $p_stock = intval($_POST["p_stock"]);
        } else {
            $errors["p_stock"] = "Veuillez entrer une quantité valide";
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
            // Vérifier si le fichier a été téléchargé sans erreur.
            uploadImage($_FILES["p_featured_photo"]);

            if (empty($errors)) {
                $product = Products::addProduct($p_name, $p_current_price, $p_stock, $p_featured_photo, $p_description, $p_short_description, $ecat_id);
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

    if ($_SERVER["REQUEST_METHOD"] == "PUT") {
        // Récupérer le contenu de la requête PUT
        $put_data = file_get_contents("php://input");

        // Récupérer le produit à mettre à jour
        $product = new Products($_GET["p_id"]);

        // Décodez les données JSON en tableau associatif
        $data = json_decode($put_data, true);

        // Vérifier si le décodage a réussi
        if ($data !== null) {
            // Les données JSON ont été décodées avec succès

            // Valider le champ p_name
            if (isset($data["p_name"]) && !empty(trim($data["p_name"]))) {
                $p_name = Authentication::process_input($data["p_name"]);
                // mettre a jour le champ p_name dans la base de donnees
                $product->updateName($p_name);
            } else {
                $errors["p_name"] = "Veuillez entrer le nom du produit";
            }

            // Valider le champ p_current_price
            if (isset($data["p_current_price"])) {
                $p_current_price = floatval($data["p_current_price"]);
            } else {
                $errors["p_current_price"] = "Veuillez entrer un prix valide";
            }

            // Valider le champ p_stock
            if (isset($data["p_stock"])) {
                $p_stock = intval($data["p_stock"]);
            } else {
                $errors["p_stock"] = "Veuillez entrer une quantité valide";
            }

            // Valider le champ p_description
            if (isset($data["p_description"]) && !empty(trim($data["p_description"]))) {
                $p_description = Authentication::process_input($data["p_description"]);
            } else {
                $errors["p_description"] = "Veuillez entrer la description du produit";
            }

            // Valider le champ p_short_description
            if (isset($data["p_short_description"]) && !empty(trim($data["p_short_description"]))) {
                $p_short_description = Authentication::process_input($data["p_short_description"]);
            } else {
                $errors["p_short_description"] = "Veuillez entrer la description courte du produit";
            }

            // Valider le champ p_featured_photo
            if (isset($_FILES["p_featured_photo"]) && !empty($_FILES["p_featured_photo"]["name"])) {
                uploadImage($_FILES["p_featured_photo"]);
            } else {
                $errors["p_featured_photo"] = "Veuillez sélectionner une image";
            }

            // Valider le champ p_is_active
            // if (isset($data["p_is_active"])) {
            //     $p_is_active = intval($data["p_is_active"]);
            // } else {
            //     $errors["p_is_active"] = "Veuillez sélectionner une option";
            // }

            // Valider le champ ecat_id
            if (isset($data["ecat_id"])) {
                $ecat_id = intval($data["ecat_id"]);
            } else {
                $errors["ecat_id"] = "Veuillez sélectionner une catégorie";
            }

            // Répondez avec un statut de succès
            http_response_code(200);
            echo json_encode([
                'errors' => $errors,
                'status' => 'success'
            ]);
        } else {
            // Le décodage des données JSON a échoué
            // Répondez avec un statut d'erreur
            http_response_code(400);
            echo json_encode(['error' => 'Les données JSON sont invalides']);
        }
    }

    function uploadImage(array $image) {
        $target_dir = "../assets/images/products/";
        $target_file = $target_dir . basename($image["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $extensions_arr = array("jpg", "jpeg", "png", "gif");
        $check = getimagesize($image["tmp_name"]);
        if ($check !== false) {
            if (in_array($imageFileType, $extensions_arr)) {
                if ($image["size"] < 5000000) {
                    if (move_uploaded_file($image["tmp_name"], $target_file)) {
                        return true;
                    } else {
                        $errors["p_featured_photo"] = "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                    }
                } else {
                    $errors["p_featured_photo"] = "Désolé, votre fichier est trop volumineux.";
                }
            } else {
                $errors["p_featured_photo"] = "Désolé, seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
            }
        } else {
            $errors["p_featured_photo"] = "Désolé, votre fichier n'est pas une image.";
        }
    }