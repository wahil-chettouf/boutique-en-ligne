<?php
    if(!session_id()) session_start();
    require_once("Bdd.php");

    class Utilisateurs {
        const TB_NAME = "tbl_user";
        private $is_connected = false;
        private  $user_info = []; 

        public function __construct()
        {
            
            if(isset($_SESSION["id"])) {
                $this->user_info = self::getUserById($_SESSION["id"]);
                
                //mettre le client en status connecté si la method getUserById retourne une objet
                if($this->user_info) {
                    $this->is_connected = true;
                } else {
                    $this->is_connected = false;
                    $this->disconnect();
                }
            }
        }

        public function add_user($full_name, $email, $password, $phone, $role) {
            global $bdd;
            $sql = "INSERT INTO ". self::TB_NAME ."(full_name, email, password, phone, role, status) VALUES(?, ?, ?, ?, ?, false)";
            $req = $bdd->prepare($sql);
            $req->execute([$full_name, $email, $password, $phone, $role]);

            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function connect($email, $password) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME ." WHERE email = ? AND password = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$email, $password]);

            if($req->rowCount()) {
                $user = $req->fetch(PDO::FETCH_OBJ);
                $_SESSION["id"] = $user->id;
                $this->user_info = $user;
                $this->is_connected = true;
                return true;
            } else {
                return false;
            }
        }

        public function getId() {
            return $this->user_info->id;
        }

        public function getFullName() {
            return $this->user_info->full_name;
        }

        public function getEmail() {
            return $this->user_info->email;
        }

        public function getPhone() {
            return $this->user_info->phone;
        }

        public function getPassword() {
            return $this->user_info->password;
        }

        public function getPhoto() {
            return $this->user_info->photo;
        }

        public function getRole() {
            return $this->user_info->role;
        }

        public function getStatus() {
            return $this->user_info->status;
        }

        public function getAllInfo() {
            var_dump(
                $this->getId(),
                $this->getFullName(),
                $this->getEmail(),
                $this->getPhone(),
                $this->getPassword(),
                $this->getPhoto(),
                $this->getRole(),
                $this->getStatus(),
            );
        }


        /* ------------------ OTHER METHODS ------------------- */
        public function isConnected() {
            return $this->is_connected;
        }

        public function disconnect() {
            unset($_SESSION["id"]);
            $this->is_connected = false;
        }

        public function isSuperAdmin() {
            return $this->getRole() == "super_admin";
        }

        public function isAdmin() {
            return $this->getRole() == "admin";
        }

        public function isClient() {
            return $this->getRole() == "client";
        }

        public function redirect($url) {
            header("Location: $url");
            exit();
        }

        /* ------------------ STATIC METHODS ------------------- */
        protected static function getUserById($id) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE id = $id";
            $req = $bdd->query($sql);
            $req->execute();

            if($req->rowCount()) {
                return $req->fetchObject();
            } else {
                return false;
            }
        }

        // Vérifie si l'email existe dans la base de données
        public static function is_user_exist($email) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE email = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$email]);

            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        // Vérifie si l'email existe dans la base de données sauf l'email de l'utilisateur connecté
        public function is_user_exist_except_me($email) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE email = ? && id != ?";
            $req = $bdd->prepare($sql);
            $req->execute([$email, $this->getId()]);

            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }


        // --------------------- SETTERS METHODS ---------------------
        public function setFullName($full_name) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET full_name = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$full_name, $this->getId()]);

            if(!$req->rowCount()) {
                //$this->user_info->full_name = $full_name;
                return true;
            } else {
                return false;
            }
        }

        public function setEmail($email) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET email = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$email, $this->getId()]);

            if($req->rowCount()) {
                //$this->user_info->email = $email;
                return true;
            } else {
                return false;
            }
        }

        public function setPhone($phone) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET phone = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$phone, $this->getId()]);

            if($req->rowCount()) {
                //$this->user_info->phone = $phone;
                return true;
            } else {
                return false;
            }
        }

        public function setPassword($password) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET password = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$password, $this->getId()]);

            if($req->rowCount()) {
                //$this->user_info->password = $password;
                return true;
            } else {
                return false;
            }
        }

        public function setPhoto($photo) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET photo = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$photo, $this->getId()]);

            if($req->rowCount()) {
                //$this->user_info->photo = $photo;
                return true;
            } else {
                return false;
            }
        }

        public function setRole($role) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET role = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$role, $this->getId()]);

            if($req->rowCount()) {
                //$this->user_info->role = $role;
                return true;
            } else {
                return false;
            }
        }
    }

    //unset($_SESSION["id"]);
    $user = new Utilisateurs();
