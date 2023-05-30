<?php
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
            $phone = preg_replace('/\D/', '', $phone);
            if(strlen($phone) == 10) {
                return true;
            } else {
                return false;
            }
        }
    }