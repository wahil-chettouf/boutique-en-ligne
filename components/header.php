<header class="flex items-center bg-slate-100 h-16">
    <div class="container m-auto flex justify-between">
        <div class="">
            <img src="./dist/img/logo.png" alt="logo">
        </div>
        <div class="">
            <nav class="nav">
                <?php if($user->isConnected()): ?>
                    <ul class="flex space-x-3">
                        <li class="hover:text-stone-600"><a href="/index.php" class="">Acceuil</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">A propos</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">Contact</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">Produits</a></li>
                        <a href="./src/inc/deconnexion.php">Déconnexion</a>
                    </ul>
                <?php else: ?>
                    <ul class="flex space-x-3">
                        <li class="hover:text-stone-600"><a href="/index.php" class="">Acceuil</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">A propos</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">Contact</a></li>
                        <li class="hover:text-stone-600"><a href="#" class="">Produits</a></li>
                        <li class="hover:text-stone-600"><a href="./public/connexion.php" class="">Connexion</a></li>
                        <li class="hover:text-stone-600"><a href="./public/inscription.php" class="">Inscription</a></li>
                    </ul>
            <?php endif; ?>
            </nav>
        </div>
    </div>
</header>