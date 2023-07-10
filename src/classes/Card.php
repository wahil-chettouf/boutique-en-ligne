<?php 
    if(!session_id()) session_start();
    require_once("Bdd.php");
    require_once("Utilisateurs.php");

    class Card {
        const TB_NAME = "tbl_order_card";
        private $order_card_info;

        public function __construct($id)
        {
            $this->order_card_info = self::getOrderCardById($id);
        }

        // --------------------- GETTERS METHODS ---------------------
        public function getAllInfo() {
            return $this->order_card_info;
        }
        public function getId() {
            return $this->order_card_info->id;
        }

        public static function getOrderCards() {
            global $bdd, $user;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE user_id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$user->getId()]);
            $order_cards = $req->fetchAll(PDO::FETCH_OBJ);
            return $order_cards;
        }

        public static function getOrderCardById($id) {
            global $bdd;
            $sql = "SELECT * FROM ". self::TB_NAME . " WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$id]);
            $order_card = $req->fetchObject();
            return $order_card;
        }

        // --------------------- SETTERS METHODS ---------------------
        public static function addOrderCard($product_id, $qty, $payment_id, $size, $color) {
            global $bdd, $user;
            $sql = "INSERT INTO ". self::TB_NAME . " (user_id, product_id, qty, payment_id, size, color) VALUES (?, ?, ?, ?, ?, ?)";
            $req = $bdd->prepare($sql);
            $req->execute([$user->getId(), $product_id, $qty, $payment_id, $size, $color]);
            if($req->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        // Mettre a jour la quantité d'un produit dans le panier
        public function updateOrderCard($qty, $id) {
            global $bdd;
            $sql = "UPDATE ". self::TB_NAME . " SET qty = ? WHERE id = ?";
            $req = $bdd->prepare($sql);
            $req->execute([$qty, $id]);
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