<?php require_once 'C:\xampp\htdocs\boutique-en-ligne\src\inc\path.php'; ?>

<header class="flex items-center bg-slate-100 h-16">
    <div class="container px-3 relative h-full m-auto flex justify-between items-center">
        <div class="">
            <?php if($user->isConnected()): ?>
                <?php if($user->isAdmin()): ?>
                    <div class="">
                        <a href="./index.php">admin</a>
                    </div>
                <?php elseif($user->isSuperAdmin()): ?>
                    <div class="">
                        <a href="./index.php">superAdmin</a>
                    </div>
                <?php elseif($user->isClient()) : ?>
                    <div class="">
                        <a href="./index.php">Client</a>
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
                    <ul id="navMenu" class="flex max-md:hidden max-md:w-56 max-md:absolute max-md:flex-col max-md:bg-slate-300 right-0 top-full space-x-3 ">
                        <li class="hover:text-stone-600"><a href="<?php echo $path?>/index.php" class="max-md:block p-1">Acceuil</a></li>

                    <?php if($user->isConnected()): ?>
                        <?php if($user->isAdmin()): ?>
                            <li class="hover:text-stone-600"><a href="./admin/dashboard.php" class="max-md:block p-1">Dashboard</a></li>
                            <a class="max-md:block p-1" href="./src/inc/deconnexion.php">Déconnexion</a>
                        <?php elseif($user->isSuperAdmin()): ?>
                            <li class="hover:text-stone-600"><a href="./admin/dashboard.php" class="max-md:block p-1">Dashboard</a></li>
                            <a class="max-md:block p-1" href="./src/inc/deconnexion.php">Déconnexion</a>
                        <?php elseif($user->isClient()) : ?>
                            <li class="hover:text-stone-600"><a href="#" class="">A propos</a></li>
                            <li class="hover:text-stone-600"><a href="#" class="max-md:block p-1">Contact</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/product.php" class="max-md:block p-1">Produits</a></li>
                            <a class="max-md:block p-1" href="./src/inc/deconnexion.php">Déconnexion</a>
                        <?php endif; ?>
                    <?php else: ?>
                            <li class="hover:text-stone-600"><a href="#" class="max-md:block p-1">A propos</a></li>
                            <li class="hover:text-stone-600"><a href="#" class="max-md:block p-1">Contact</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/product.php" class="max-md:block p-1">Produits</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/connexion.php" class="max-md:block p-1">Connexion</a></li>
                            <li class="hover:text-stone-600"><a href="<?php echo $path?>/public/inscription.php" class="max-md:block p-1">Inscription</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>   