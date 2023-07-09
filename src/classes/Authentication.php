<?php
    require_once("Authentication.php");
    class Authentication {
        // Filtrer les données entrées par l'utilisateur
        public static function process_input($inp) {
            $inp = trim($inp);
            $inp = stripslashes($inp);
            $inp = htmlspecialchars($inp);
            return $inp;
        }

        // Vérifier si le mot de passe est correct
        public static function verify_password($password, $hash) {
            return password_verify($password, $hash);
        }

        // Hacher le mot de passe
        public static function hash_password($password) {
            return password_hash($password, PASSWORD_DEFAULT);
        }

        // Verifier si le mote de passe contient au moins 8 caractères, une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial
        public static function is_password_strong($password) {
            $uppercase = preg_match('@[A-Z]@', $password);
            $lowercase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $special_char = preg_match('@[^\w]@', $password);

            if(!$uppercase || !$lowercase || !$number || !$special_char || strlen($password) < 8) {
                return false;
            } else {
                return true;
            }
        }

        // Vérifier si le numéro de téléphone est valide
        public static function is_phone_valid($phone) {
            $phone = preg_replace('/\D/', '', trim($phone));
            $is_numeric = is_numeric($phone);
            
            return strlen($phone) == 10 && $is_numeric;
        }

        // UploadImage method
        public static function uploadImage($target_dir, $file) {
            global $path;
            // Valider le champ p_featured_photo
            if ($file["error"] === UPLOAD_ERR_OK) {
                // Valider le type de fichier (image)
                $allowedTypes = array("image/jpeg", "image/png");
                if (in_array($file["type"], $allowedTypes)) {
                    // Ajouter un timestamp au nom de fichier pour le rendre unique
                    $timestamp = round(microtime(true) * 1000);
                    $file["name"] = $timestamp . "_" . $file["name"];

                    // Déplacer le fichier vers un répertoire approprié
                    $destination = "../../../dist/images/product/" . $target_dir . "/" . $file["name"];
                    //return $file;
                    if (move_uploaded_file($file["tmp_name"], $destination)) {
                        $p_featured_photo = $path . "/dist/images/product/". $target_dir . "/" . $file["name"];
                        return ["success" => true, "message" => "Image téléchargée avec succès", "p_featured_photo" => $p_featured_photo];
                    } else {
                        return ["success" => false, "message" => "Erreur lors de l'importation de l'image"];
                    }
                } else {
                    return ["success" => false, "message" => "Veuillez sélectionner une image au format JPEG ou PNG"];
                }
            } else {
                return ["success" => false, "message" => "Erreur lors de l'importation de l'image"];
            }
        }

        // Supprimer l'image du répertoire
        public static function deleteImage(string $target_dir, string $image) {
            if (file_exists($target_dir . $image)) {
                global $path;
                $path_img = $path . "/dist/images/product/" . $target_dir . "/";
                unlink($path_img . $image);
                return ["success" => true, "message" => "Image supprimée avec succès"];
            }
            return ["success" => false, "message" => "Image introuvable"];
        }
        
    }