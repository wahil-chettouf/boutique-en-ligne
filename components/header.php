<?php require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php'; ?>

<header class="flex items-center bg-slate-100 h-16">
    <div class="container px-3 relative h-full m-auto flex justify-between items-center">
        <div class="">
            <?php if($user->isConnected()): ?>
                <?php if($user->isAdmin()): ?>
                    <div class="">
                        <a href="<?php echo $path?>/index.php">admin</a>
                    </div>
                <?php elseif($user->isSuperAdmin()): ?>
                    <div class="">
                        <a href="<?php echo $path?>/index.php">superAdmin</a>
                    </div>
                <?php elseif($user->isClient()) : ?>
                    <div class="">
                        <a href="<?php echo $path?>/index.php">Client</a>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <img src="./dist/img/logo.png" alt="logo">
            <?php endif; ?>
        </div>
        <div class="">
            <nav class="">
                <div class="">
                    <button class="md:hidden" id="btnMenu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="">
                    <ul id="navMenu" class="flex max-md:hidden max-md:w-56 max-md:absolute max-md:flex-col max-md:bg-slate-300 right-0 top-full md:space-x-3">
                        <li class="hover:text-stone-600"><a href="<?php echo $path?>/index.php" class="max-md:block max-md:pl-3 p-1">Acceuil</a></li>

                    <?php if($user->isConnected()): ?>
                        <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/products.php" class="max-md:block max-md:pl-3 p-1">Produits</a></li>
                        <?php if($user->isClient()) :?>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/propos.php" class="max-md:block max-md:pl-3 p-1">A propos</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/contact.php" class="max-md:block max-md:pl-3 p-1">Contact</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/panier.php" class="max-md:block max-md:pl-3 p-1">panier</a></li>
                        <?php else :?>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/admin/product_manager/product_manager.php" class="max-md:block max-md:pl-3 p-1">Dashboard</a></li>
                        <?php endif; ?>
                        <li class="">
                            <a class="max-md:block max-md:pl-3 p-1" href="<?php echo $path?>/src/inc/deconnexion.php">Déconnexion</a>
                        </li>
                    <?php else: ?>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/propos.php" class="max-md:block max-md:pl-3 p-1">A propos</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/contact.php" class="max-md:block max-md:pl-3 p-1">Contact</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/products.php" class="max-md:block max-md:pl-3 p-1">Produits</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/connexion.php" class="max-md:block max-md:pl-3 p-1">Connexion</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/inscription.php" class="max-md:block max-md:pl-3 p-1">Inscription</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/panier.php" class="max-md:block max-md:pl-3 p-1">panier</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>   