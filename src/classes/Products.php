<?php
    require_once "Bdd.php";
    class Products {
        const TBL_NAME = "tbl_product";
        const TBL_NAME_IMAGES = "tbl_product_photo";
        private $ecat_id;

        private $product_info;

        public function __construct($p_id = null) {
            if($p_id) {
                $this->product_info = $this->getProductById($p_id);
            } else {
                $this->product_info = new stdClass();
            }
        }

        public static function addProduct($p_name, $p_current_price, $p_stock, $p_featured_photo, $p_description, $p_short_description, $ecat_id) {
            global $bdd;
            $sql = "INSERT INTO " . self::TBL_NAME . " (p_name, p_current_price, p_stock, p_featured_photo, p_description, p_short_description, ecat_id) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $bdd->prepare($sql);

            $stmt->execute([$p_name, $p_current_price, $p_stock, $p_featured_photo, $p_description, $p_short_description, $ecat_id]);

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

        public static function deleteProductById($id) {
            global $bdd;
            $sql = "DELETE FROM " . self::TBL_NAME . " WHERE p_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount();
        }

        // Ajouter toutes les getters methods ici qui prenne ces information depuis l'objet product_info
        public function getId() {
            return $this->product_info->p_id;
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
            return $this->product_info->p_stock;
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

        public function getTotalView() {
            return $this->product_info->p_total_view;
        }

        public function getIsActive() {
            return $this->product_info->p_is_active;
        }

        public function getEcatId() {
            return $this->product_info->ecat_id;
        }

        public function getCreatedAt() {
            return $this->product_info->p_created_at;
        }

        public function getUpdatedAt() {
            return $this->product_info->p_updated_at;
        }
        
        
        
        // ********************* Change to static methods  ********************* //
        // public function getFeaturedProducts() {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE p_is_featured = 1";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute();
        //     $this->product_info = $stmt->fetchAll();
        //     return $this->product_info;
        // }

        // public function getLatestProduct() {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " ORDER BY id DESC LIMIT 6";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute();
        //     $this->product_info = $stmt->fetchAll();
        //     return $this->product_info;
        // }

        // public function getProductsByCategoryId($ecat_id) {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE ecat_id = ?";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute([$ecat_id]);
        //     $this->product_info = $stmt->fetchAll();
        //     return $this->product_info;
        // }

        // public function getProductsBySubCategoryId($scat_id) {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE scat_id = ?";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute([$scat_id]);
        //     $this->product_info = $stmt->fetchAll();
        //     return $this->product_info;
        // }

        // public function getProductsBySubSubCategoryId($sscat_id) {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE sscat_id = ?";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute([$sscat_id]);
        //     $this->product_info = $stmt->fetchAll();
        //     return $this->product_info;
        // }

        // public static function getFirstProductImage($product_id) {
        //     // get toutes les images qui sont dans la table p_images qui sont lies avec l'id de product
        //     global $bdd;
        //     $sql = "SELECT photo FROM " . self::TBL_NAME_IMAGES . " WHERE p_id = ?";
        //     $smtp = $bdd->prepare($sql);
        //     $smtp->execute([$product_id]);
        //     return $smtp->fetchObject();
        // }

        // public static function getProductsBySearch($search) {
        //     global $bdd;
        //     $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE p_name LIKE '%$search%' OR p_short_description LIKE '%$search%' OR p_description LIKE '%$search%'";
        //     $stmt = $bdd->prepare($sql);
        //     $stmt->execute();
        //     return $stmt->fetchAll(PDO::FETCH_OBJ);
        // }


        public static function getProductsBySearchAndCategory($search, $ecat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE (p_name LIKE '%$search%' OR p_short_description LIKE '%$search%' OR p_description LIKE '%$search%') AND ecat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$ecat_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public static function getProductsBySearchAndSubCategory($search, $scat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE (p_name LIKE '%$search%' OR p_short_description LIKE '%$search%' OR p_description LIKE '%$search%') AND scat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$scat_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public static function getProductsBySearchAndSubSubCategory($search, $sscat_id) {
            global $bdd;
            $sql = "SELECT * FROM " . self::TBL_NAME . " WHERE (p_name LIKE '%$search%' OR p_short_description LIKE '%$search%' OR p_description LIKE '%$search%') AND sscat_id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$sscat_id]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }


        // ***********************  Setters  *********************** //


        // method pour modifier les colonnes de la table product
        public function updateColumn($name, $value) {
            global $bdd;
            $sql = "UPDATE " . self::TBL_NAME . " SET $name = ? WHERE p_id = ".$this->getId();
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$value]);
        }


        // je crée des methods pour modifier les colonnes de la table product dans la base de données
        public function updateName($name) {
            $this->updateColumn('p_name', $name);
        }

        public function updateOldPrice() {
            $this->updateColumn("p_old_price", $this->product_info->p_price);
        }

        public function updatePrice($price) {
            $this->updateColumn('p_current_price', $price);
        }

        public function updateStock($stock) {
            $this->updateColumn('p_stock', $stock);
        }

        public function updateImage($p_featured_photo) {
            $this->updateColumn('p_featured_photo', $p_featured_photo);
        }

        public function updateShortDescription($short_description) {
            $this->updateColumn('p_short_description', $short_description);
        }

        public function updateDescription($description) {
            $this->updateColumn('p_description', $description);
        }

        public function updateCategoryId($ecat_id) {
            $this->updateColumn('ecat_id', $ecat_id);
        }

        public function updateTotalView() {
            $this->updateColumn('p_total_view', $this->product_info->p_total_view + 1);
        }

        public function updateIsPublished($is_published) {
            $this->updateColumn('p_is_published', $is_published);
        }

        public function updateIsOutOfStock($is_out_of_stock) {
            $this->updateColumn('p_is_out_of_stock', $is_out_of_stock);
        }

        public function updateIsOutOfStockMessage($is_out_of_stock_message) {
            $this->updateColumn('p_is_out_of_stock_message', $is_out_of_stock_message);
        }

        public function updateIsOutOfStockMessageColor($is_out_of_stock_message_color) {
            $this->updateColumn('p_is_out_of_stock_message_color', $is_out_of_stock_message_color);
        }

        public function updateIsOutOfStockMessageBgColor($is_out_of_stock_message_bg_color) {
            $this->updateColumn('p_is_out_of_stock_message_bg_color', $is_out_of_stock_message_bg_color);
        }

        public function updateIsOutOfStockMessageBorderColor($is_out_of_stock_message_border_color) {
            $this->updateColumn('p_is_out_of_stock_message_border_color', $is_out_of_stock_message_border_color);
        }
    }
