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
                }
            }
        }

        public function add_user($full_name, $email, $password, $phone, $photo, $role) {
            global $bdd;
            $sql = "INSERT INTO ". self::TB_NAME ."(email, full_name, password, phone, photo, role, status) VALUES(?, ?, ?, ?, ?, ?, false)";
            $req = $bdd->prepare($sql);
            $req->execute([$email, $full_name, $password, $phone, $photo, $role]);

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
    }

    //unset($_SESSION["id"]);
    $user = new Utilisateurs();
