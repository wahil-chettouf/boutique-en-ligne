<?php
    require_once '../../../src/classes/Authentication.php'; 
    require_once '../../../src/classes/Products.php'; 
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
    header("Content-Type: application/json; charset=UTF-8");

    $p_name = $p_current_price = $p_stock = $p_featured_photo = "";
    $p_description = $p_short_description = $p_feature = $ecat_id = "";

    $errors = array();
    $success = array();

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

    else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Si le champ _method existe 
        if(isset($_POST["_method"])) {
            // Si la valeur de _method est égale à POST
            if($_POST["_method"] === "POST") {
                // Valider le champ p_name
                if (isset($_POST["p_name"]) && !empty(trim($_POST["p_name"]))) {
                    $p_name = Authentication::process_input($_POST["p_name"]);
                } else {
                    $errors["p_name"] = "Veuillez entrer le nom du produit";
                }
            
                // Valider le champ p_current_price
                if (isset($_POST["p_current_price"]) && !empty(trim($_POST["p_current_price"]))) {
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
        
                // Vérifier si le tableau d'erreurs est vide, sauf le champ p_featured_photo
                if (empty($errors)) {
                    // Chemin du dossier de destination des images
                    $target_dir = "../../../dist/images/product/" . $_POST["ecat_id"];   
        
                    // Valider le champ p_featured_photo
                    if(isset($_FILES["p_featured_photo"]) && $_FILES["p_featured_photo"]["error"] == 0) {
                        // Upload de l'image
                        $imageResult = Authentication::uploadImage($target_dir ,$_FILES["p_featured_photo"]);
        
                        // Vérifier si le fichier a été téléchargé sans erreur.
                        if($imageResult["success"] == true) {
                            $p_featured_photo = $imageResult["p_featured_photo"];
                            $product = Products::addProduct($p_name, $p_current_price, $p_stock, $p_featured_photo, $p_description, $p_short_description, $ecat_id);
        
                            // Réponse JSON en cas de succès
                            $response = array(
                                "success" => "Le produit a été ajouté avec succès"
                            );
                        } else {
                            $errors["p_featured_photo"] = $imageResult["message"];
                            $response = array(
                                "errors" => $errors
                            );
                        }
                    } else {
                        $errors["p_featured_photo"] = "Veuillez sélectionner une image";
                        $response = array(
                            "errors" => $errors
                        );
                    }
                } else {
                    // Réponse JSON en cas d'erreurs de Authentication
                    $response = array(
                        "errors" => $errors
                    );
                }
                echo json_encode($response);
            } else if($_POST["_method"] === "PUT") {
                // Récupérer le produit à mettre à jour
                $product = new Products($_GET["p_id"]);

                // Valider le champ p_name
                if (isset($_POST["p_name"]) && !empty(trim($_POST["p_name"]))) {
                    $p_name = Authentication::process_input($_POST["p_name"]);
                    // mettre a jour le champ p_name dans la base de donnees
                    $product->updateName($p_name);

                    // Ajouter le message de succès à la résponse
                    $response["p_name"] = "Le nom du produit a été mis à jour avec succès";
                } else {
                    $errors["p_name"] = "Veuillez entrer le nom du produit";
                }

                // Valider le champ p_current_price
                if (isset($_POST["p_current_price"])) {
                    $p_current_price = floatval($_POST["p_current_price"]);

                    // mettre a jour le champ p_current_price dans la base de donnees
                    $product->updatePrice($p_current_price);

                    // Ajouter le message de succès à la réponse
                    $response["p_current_price"] = "Le prix du produit a été mis à jour avec succès";
                } else {
                    $errors["p_current_price"] = "Veuillez entrer un prix valide";
                }

                // Valider le champ p_stock
                if (isset($_POST["p_stock"])) {
                    $p_stock = intval($_POST["p_stock"]);

                    // mettre a jour le champ p_stock dans la base de donnees
                    $product->updateStock($p_stock);

                    // Ajouter le message de succès à la réponse
                    $response["p_stock"] = "La quantité du produit a été mise à jour avec succès";
                } else {
                    $errors["p_stock"] = "Veuillez entrer une quantité valide";
                }

                // Valider le champ p_description
                if (isset($_POST["p_description"]) && !empty(trim($_POST["p_description"]))) {
                    $p_description = Authentication::process_input($_POST["p_description"]);

                    // mettre a jour le champ p_description dans la base de donnees
                    $product->updateDescription($p_description);

                    // Ajouter le message de succès à la réponse
                    $response["p_description"] = "La description du produit a été mise à jour avec succès";
                } else {
                    $errors["p_description"] = "Veuillez entrer la description du produit";
                }

                // Valider le champ p_short_description
                if (isset($_POST["p_short_description"]) && !empty(trim($_POST["p_short_description"]))) {
                    $p_short_description = Authentication::process_input($_POST["p_short_description"]);

                    // mettre a jour le champ p_short_description dans la base de donnees
                    $product->updateShortDescription($p_short_description);

                    // Ajouter le message de succès à la réponse
                    $response["p_short_description"] = "La description courte du produit a été mise à jour avec succès";
                } else {
                    $errors["p_short_description"] = "Veuillez entrer la description courte du produit";
                }

                // Valider le champ p_featured_photo
                if (isset($_FILES["p_featured_photo"]) && $_FILES["p_featured_photo"]["error"] == 0) {
                    // Récupérer le nom du l'image courante
                    $old_image = $product->getFeaturedPhoto();
                    $path_old_img = substr($old_image, 0, strrpos($old_image, "/"));
                    $name_old_img = substr($old_image, strrpos($old_image, "/") + 1);

                    // Chemin du dossier de destination des images
                    $target_dir = $_POST["ecat_id"];   

                    // Upload de l'image
                    $imageResult = Authentication::uploadImage($target_dir ,$_FILES["p_featured_photo"]);

                    // Vérifier si le fichier a été téléchargé sans erreur.
                    if($imageResult["success"] == true) {
                        $p_featured_photo = $imageResult["p_featured_photo"];
                        
                        // mettre a jour le champ p_featured_photo dans la base de donnees
                        $product->updateFeaturedPhoto($p_featured_photo);

                        // Supprimer l'ancienne image
                        unlink("../../../dist/images/product/" . $target_dir . "/" . $name_old_img);

                        // Ajouter le message de succès à la réponse
                        $response["p_featured_photo"] = "L'image du produit a été mise à jour avec succès";
                    } else {
                        $errors["p_featured_photo"] = $imageResult["message"];
                    }
                } else {
                    $errors["p_featured_photo"] = "Veuillez sélectionner une image";
                }

                // Valider le champ ecat_id
                if (isset($_POST["ecat_id"]) && !empty(trim($_POST["ecat_id"]))) {
                    if($_POST["ecat_id"] == "homme") {
                        $ecat_id = 1;
                    } else if($_POST["ecat_id"] == "femme") {
                        $ecat_id = 2;
                    }

                    // mettre a jour le champ ecat_id dans la base de donnees
                    $product->updateCategoryId($ecat_id);

                    // Ajouter le message de succès à la réponse
                    $response["ecat_id"] = "La catégorie du produit a été mise à jour avec succès";
                } else {
                    $errors["ecat_id"] = "Veuillez sélectionner une catégorie";
                }

                // Répondez avec un statut de succès
                http_response_code(200);
                echo json_encode([
                    'errors' => $errors,
                    'status' => 'success',
                    "messages" => $response
                ]);
            }
        } else {
            // Répondez avec un statut d'erreur
            http_response_code(400);
            echo json_encode(["error" => "On n'a pas reçu le type de requête correcte"]);
        }
    }
    
    else if($_SERVER["REQUEST_METHOD"] == "DELETE") {
        // verifie si on recois une requete delete avec l'id de product on supprime le product depuis la method deleteProductById($id)
        if(isset($_GET['delete_p_id'])) {
            $product = Products::deleteProductById($_GET['delete_p_id']);
            echo json_encode($product);
        }
    } else {
        // Répondez avec un statut d'erreur
        http_response_code(400);
        echo json_encode(["error" => "On n'a pas reçu le type de requête correcte"]);
    }