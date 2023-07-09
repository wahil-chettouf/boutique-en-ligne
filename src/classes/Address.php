<?php 
    if(!session_id()) session_start();
    require_once("Bdd.php");
    require_once("Utilisateurs.php");

    class Address {
        const TB_NAME = "tbl_address";
        private $address_info;

        public function __construct($id)
        {
            $this->address_info = self::getAddressById($id);
        }

        // --------------------- GETTERS METHODS ---------------------
        public function getAllInfo() {
            return $this->address_info;
        }
        public function getId() {
            return $this->address_info->id;
        }

        public static function getAddresses() {
            global $bdd, $user;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE user_id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$user->getId()]);
            $address = $req->fetchAll(PDO::FETCH_OBJ);
            return $address;
        }

        public static function getAddressById($id) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$id]);
            $address = $req->fetchObject();
            return $address;
        }

        // --------------------- SETTERS METHODS ---------------------
        // parametres: user_id	address_line_1 address_line_2 city	state	zip_code	country
        public static function addAddress($address_line_1, $address_line_2, $city, $state, $zip_code, $country) {
            global $bdd, $user;
            $sql = "INSERT INTO ". self::TB_NAME . " (user_id, address_line_1, address_line_2, city, state, zip_code, country) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $req = $bdd->prepare($sql);
            $req->execute([$user->getId(), $address_line_1, $address_line_2, $city, $state, $zip_code, $country]);
            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function updateAddress($address_line_1, $address_line_2, $city, $state, $zip_code, $country) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET address_line_1 = ?, address_line_2 = ?, city = ?, state = ?, zip_code = ?, country = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$address_line_1, $address_line_2, $city, $state, $zip_code, $country, $this->getId()]);
            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public static function deleteAddress($id) {
            global $bdd;
            $sql = "DELETE FROM ". self::TB_NAME . " WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$id]);
            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }
    }