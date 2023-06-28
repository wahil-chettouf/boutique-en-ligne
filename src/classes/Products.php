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
        private $p_updated_at;
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

        public static function addProduct($p_name, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id) {
            global $bdd;
            $sql = "INSERT INTO " . self::TBL_NAME . " (p_name, p_current_price, p_qty, p_featured_photo, p_description, p_short_description, p_condition, p_return_policy, ecat_id) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $bdd->prepare($sql);

            $stmt->execute([$p_name, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id]);

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

        public static function updateProduct($p_name, $p_old_price, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id, $id) {
            global $bdd;
            $sql = "UPDATE " . self::TBL_NAME . " SET p_name = ?, p_old_price = ?, p_current_price = ?, p_qty = ?, p_featured_photo = ?, p_description = ?, p_short_description = ?, p_condition = ?, p_return_policy = ?, ecat_id = ? WHERE id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$p_name, $p_old_price, $p_current_price, $p_qty, $p_featured_photo, $p_description, $p_short_description, $p_condition, $p_return_policy, $ecat_id, $id]);
            return $stmt->rowCount();
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
            $sql = "UPDATE " . self::TBL_NAME . " SET $name = ? WHERE id = ?";
            $stmt = $bdd->prepare($sql);
            $stmt->execute([$value, $this->product_info->id]);
        }


        // je crée des methods pour modifier les colonnes de la table product dans la base de données
        public function updateName($name) {
            $this->updateColumn('p_name', $name);
        }

        public function updateOldPrice() {
            $this->updateColumn("p_old_price", $this->product_info->p_price);
        }

        public function updatePrice($price) {
            $this->updateColumn('p_price', $price);
        }

        public function updateQuantity($quantity) {
            $this->updateColumn('p_quantity', $quantity);
        }

        public function updateShortDescription($short_description) {
            $this->updateColumn('p_short_description', $short_description);
        }

        public function updateDescription($description) {
            $this->updateColumn('p_description', $description);
        }

        public function updateReturnPolicy($return_policy) {
            $this->updateColumn('p_return_policy', $return_policy);
        }

        public function updateTotalView() {
            $this->updateColumn('p_total_view', $this->product_info->p_total_view + 1);
        }

        public function updateIsFeatured($is_featured) {
            $this->updateColumn('p_is_featured', $is_featured);
        }

        public function updateIsNew($is_new) {
            $this->updateColumn('p_is_new', $is_new);
        }

        public function updateIsPopular($is_popular) {
            $this->updateColumn('p_is_popular', $is_popular);
        }

        public function updateIsOffer($is_offer) {
            $this->updateColumn('p_is_offer', $is_offer);
        }

        public function updateIsBestSeller($is_best_seller) {
            $this->updateColumn('p_is_best_seller', $is_best_seller);
        }

        public function updateIsFreeShipping($is_free_shipping) {
            $this->updateColumn('p_is_free_shipping', $is_free_shipping);
        }

        public function updateIsCod($is_cod) {
            $this->updateColumn('p_is_cod', $is_cod);
        }

        public function updateIsDeleted($is_deleted) {
            $this->updateColumn('p_is_deleted', $is_deleted);
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

        public function updateIsOutOfStockMessageTextColor($is_out_of_stock_message_text_color) {
            $this->updateColumn('p_is_out_of_stock_message_text_color', $is_out_of_stock_message_text_color);
        }

        public function updateIsOutOfStockMessageIcon($is_out_of_stock_message_icon) {
            $this->updateColumn('p_is_out_of_stock_message_icon', $is_out_of_stock_message_icon);
        }

        public function updateIsOutOfStockMessageIconColor($is_out_of_stock_message_icon_color) {
            $this->updateColumn('p_is_out_of_stock_message_icon_color', $is_out_of_stock_message_icon_color);
        }

        public function updateIsOutOfStockMessageIconBgColor($is_out_of_stock_message_icon_bg_color) {
            $this->updateColumn('p_is_out_of_stock_message_icon_bg_color', $is_out_of_stock_message_icon_bg_color);
        }


    }
