<?php
    require_once "Bdd.php";
    class Products {
        const TBL_NAME = "tbl_product";
        const TBL_NAME_IMAGES = "tbl_product_photo";
        private $id;
        private $p_name;
        private $p_old_price;
        private $p_current_price;
        private $p_qty;
        private $p_featured_photo;
        private $p_description;
        private $p_short_description;
        private $feature;
        private $p_condition;
        private $p_return_policy;
        private $p_total_view;
        private $p_is_featured;
        private $p_is_active;
        private $ecat_id;

        private $product_info;

        public function __construct(object $product) {
            if($product) {
                $this->product_info = $product;
            }
        }

        public static function addProduct($p_name, $p_old_price, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id) {

            global $bdd;
            $sql = "INSERT INTO " . self::TBL_NAME . " (p_name, p_old_price, p_current_price, p_qty, p_featured_photo, p_description, p_short_description, p_condition, p_return_policy, ecat_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $bdd->prepare($sql);

            $stmt->execute([$p_name, $p_old_price, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id]);

            return $bdd->lastInsertId();
        }

        public static function getProductById($id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE p_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetchObject();
        }

        public static function getAllProducts() {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME;
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        // Ajouter toutes les getters methods ici qui prenne ces information depuis l'objet product_info
        public function getId() {
            return $this->product_info->id;
        }

        public function getName() {
            return $this->product_info->p_name;
        }

        public function getOldPrice() {
            return $this->product_info->p_old_price;
        }

        public function getCurrentPrice() {
            return $this->product_info->p_current_price;
        }

        public function getQty() {
            return $this->product_info->p_qty;
        }

        public function getFeaturedPhoto() {
            return $this->product_info->p_featured_photo;
        }

        public function getDescription() {
            return $this->product_info->p_description;
        }

        public function getShortDescription() {
            return $this->product_info->p_short_description;
        }

        public function getFeature() {
            return $this->product_info->feature;
        }

        public function getCondition() {
            return $this->product_info->p_condition;
        }   

        public function getReturnPolicy() {
            return $this->product_info->p_return_policy;
        }

        public function getTotalView() {
            return $this->product_info->p_total_view;
        }

        public function getIsFeatured() {
            return $this->product_info->p_is_featured;
        }

        public function getIsActive() {
            return $this->product_info->p_is_active;
        }

        public function getEcatId() {
            return $this->product_info->ecat_id;
        }

        public function getCreatedAt() {
            return $this->product_info->created_at;
        }

        public function getUpdatedAt() {
            return $this->product_info->updated_at;
        }

        public function getFeaturedProducts() {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE p_is_featured = 1";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            $this->product_info = $stmt->fetchAll();
            return $this->product_info;
        }

        public function getLatestProducts() {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " ORDER BY id DESC LIMIT 6";
            $stmt = $bdd->prepare($sql);
            $stmt->execute();
            $this->product_info = $stmt->fetchAll();
            return $this->product_info;
        }

        public function getProductsByCategoryId($ecat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE ecat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$ecat_id]);
            $this->product_info = $stmt->fetchAll();
            return $this->product_info;
        }

        public function getProductsBySubCategoryId($scat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE scat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$scat_id]);
            $this->product_info = $stmt->fetchAll();
            return $this->product_info;
        }

        public function getProductsBySubSubCategoryId($sscat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE sscat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$sscat_id]);
            $this->product_info = $stmt->fetchAll();
            return $this->product_info;
        }

        public static function getFirstProductImage($product_id) {
            // get toutes les images qui sont dans la table p_images qui sont lies avec l'id de product
            global $bdd;
            $sql = "SELECT photo FROM " . self::TBL_NAME_IMAGES . " WHERE p_id = ?";
            $smtp = $bdd->prepare($sql);
            $smtp->execute([$product_id]);
            return $smtp->fetchObject();
        }
    }
