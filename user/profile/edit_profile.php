<?php require_once '../../src/classes/Utilisateurs.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="stylesheet" href="../../dist/style.css">
</head>
<body>
    <div class="app">
        <?php require_once '../../components/header.php'; ?>
        <!-- Contenu de la page -->
        <div class="container mx-auto flex max-md:flex-col max-md:items-center">
            <?php require_once '../inc/sidebar.php'; ?>
            <div class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Mes informations</h2>
                <form id="fullNameForm" method="POST" >
                    <input type="hidden" name="_method" value="PUT_FULL_NAME">

                    <div class="">
                        <label for="full_name" class="block mb-2 w-1/4">Nom complet</label>
                        <div class="flex items-center w-3/4">
                            <input type="text" id="full_name" name="full_name" value="<?php echo $user->getFullName(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-full">
                            <button type="button" id="fullNameBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                        </div>
                    </div>
                    <span class="text-red-600 text-xs block mt-2 error" id="full_name_err"></span>
                    <span id="full_name_success" class="text-xs text-green-600 success"></span>
                </form>
                <form id="emailForm">
                    <input type="hidden" name="_method" value="PUT_EMAIL">

                    <div class="mt-4">
                        <label for="email" class="block mb-2 w-1/4">Email</label>
                        <div class="flex items-center w-3/4">
                            <input type="email" id="email" name="email" value="<?php echo $user->getEmail(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-full">
                            <button type="button" id="emailBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                        </div>
                    </div>
                    <span class="text-red-600 text-xs block mt-2 error" id="email_err"></span>
                    <span id="email_success" class="text-xs text-green-600 success"></span>
                </form>
                <form id="phoneForm">
                    <input type="hidden" name="_method" value="PUT_PHONE">

                    <div class="mt-5">
                        <label for="phone" class="block mb-2 w-1/4">Téléphone</label>
                        <div class="flex items-center w-3/4">
                            <input type="tel" id="phone" name="phone" value="<?php echo $user->getPhone(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-full">
                            <button type="button" id="phoneBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                        </div>
                    </div>
                    <span class="text-red-600 text-xs block mt-2 error" id="phone_err"></span>
                    <span id="phone_success" class="text-xs text-green-600 success"></span>
                </form>
            </div>

        </div>
    </div>
    <script src="../../dist/js/user/edit_profile.js"></script>
</body>
</html>
<!-- 
            <div class="max-md:w-full md:w-3/4 bg-white p-4">
                <h2 class="text-2xl font-bold mb-4">Mes informations</h2>
                <form id="fullNameForm">
                    <input type="hidden" name="_method" value="PUT_FULL_NAME">

                    <div class="mb-4">
                        <label for="full_name" class="block mb-2">Nom complet</label>
                        <div class="">
                            <input type="text" id="full_name" name="full_name" value="<?php echo $user->getFullName(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                            <span class="block text-red-600 text-xs" id="full_name_err"></span>
                            <span id="full_name_success" class="block text-xs text-green-600 success"></span>
                        </div>
                        <button type="button" id="fullNameBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                    </div>
                </form>
                <form id="emailForm">
                    <input type="hidden" name="_method" value="PUT_EMAIL">

                    <div class="mb-4">
                        <label for="email" class="block mb-2">Email</label>
                        <div class="">
                            <input type="email" id="email" name="email" value="<?php echo $user->getEmail(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                            <span class="text-red-600 text-xs" id="email_err"></span>
                            <span id="email_success" class="text-xs text-green-600 success"></span>
                        </div>
                        <button type="button" id="emailBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                    </div>
                </form>
                <form id="phoneForm">
                    <input type="hidden" name="_method" value="PUT_PHONE">

                    <div class="mb-4">
                        <label for="phone" class="block mb-2">Téléphone</label>
                        <div class="">
                            <input type="tel" id="phone" name="phone" value="<?php echo $user->getPhone(); ?>" required class="border border-gray-300 px-4 py-2 rounded w-3/4">
                            <span class="text-red-600 text-xs" id="phone_err"></span>
                            <span id="phone_success" class="text-xs text-green-600 success"></span>
                        </div>
                        <button type="button" id="phoneBtn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">Modifier</button>
                    </div>
                </form>
            </div> -->