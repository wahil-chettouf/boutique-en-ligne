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
            <form id="registerForm" method="post" enctype="multipart/form-data" class="flex flex-col w-full space-y-1">
                <input type="text" name="full_name" class="p-2 border-none outline-none" placeholder="Nom complet" value="">
                <span class="text-red-600 text-sm" id="full_name_err"></span>

                <input type="text" name="email" class="p-2 border-none outline-none" placeholder="Email" value="">
                <span class="text-red-600 text-sm" id="email_err"></span>

                <input type="password" name="password" class="p-2 border-none outline-none" placeholder="Mot de passe" value="">
                <span class="text-red-600 text-sm" id="password_err"></span>

                <input type="password" name="confirm_pass" class="p-2 border-none outline-none" placeholder="Confirmer le mot de passe" value="">
                <span class="text-red-600 text-sm" id="confirm_pass_err"></span>

                <input type="text" name="phone" class="p-2 border-none outline-none" placeholder="Numéro de téléphone" value="">
                <span class="text-red-600 text-sm" id="phone_err"></span>

                <input type="file" name="photo" placeholder="Photo" value="">
                <span class="text-red-600 text-sm" id="photo_err"></span>

                <div class="pt-2">
                    <input type="submit" name="submit" class="bg-green-700 w-full p-3 text-white hover:cursor-pointer" value="S'inscrire">
                </div>

                <div class="">
                    <a href="connexion.php" class="text-blue-700 text-sm hover:underline">Déjà inscrit ?
                    </a>
                </div>
            </form>
    </div>
    
    <script src="../dist/js/inscription.js"></script>
</body>
</html>