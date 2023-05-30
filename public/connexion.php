<?php
    require_once("../src/classes/Utilisateurs.php");
    
    // redirect to index.php if user is already connected
    if($user->isConnected())
    {
        $user->redirect("../index.php");
    }
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="../dist/style.css" rel="stylesheet">
</head>
<body>
    <div class="absolute top-3 left-3">
        <a href="../index.php" class="block p-3 bg-red-200 text-blue-700 text-sm hover:underline ">Retour à l'accueil
        </a>
    </div>
    <div class="container-full m-auto flex justify-center items-center px-3 bg-slate-100 w-full h-screen">
        <div class="w-full sm:w-96">
            <form id="connectionForm" method="post" class="flex flex-col w-full space-y-1">
                <span class="bg-red-300 text-white text-sm" id="error"></span>

                <input type="text" name="email" class="p-2 border-none outline-none" placeholder="Email" value="">
                <span class="text-red-600 text-sm" id="email_err"></span>

                <input type="password" name="password" class="p-2 border-none outline-none" placeholder="Mot de passe" value="">
                <span class="text-red-600 text-sm" id="password_err"></span>
                <span class="text-red-600 text-sm" id="password_err"></span>

                <div class="pt-2">
                    <input type="submit" name="submit" class="bg-green-700 w-full p-3 text-white hover:cursor-pointer" value="Connextion">
                </div>
                
                <div class="">
                    <a href="inscription.php" class="text-blue-700 text-sm hover:underline">Déjà connecté ?
                    </a>
                </div>
            </form>
    </div>
    
    <script src="../dist/js/connexion.js"></script>
</body>
</html>