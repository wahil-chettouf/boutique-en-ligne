<?php
    require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php';
?>

<section class="w-full md:w-56 bg-sky-700 p-4" id="sideBar">
    <div class="flex flex-col space-y-3">
        <div class="flex flex-col space-y-1">
            <div class="flex justify-between">
                <h2 class="font-bold">Dashboard</h2>
            </div>
            <div class="flex flex-col space-y-1">
                <a href="<?php echo $path?>/admin/product_manager/product_manager.php" class="text-white hover:text-red-600">Produits</a>
                <a href="<?php echo $path?>/admin/user_manager/user_manager.php" class="text-white hover:text-red-600">Utilisateurs</a>
            </div>
        </div>
    </div>
</section>