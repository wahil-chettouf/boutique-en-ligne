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
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Colonne de gauche -->
                <div class="bg-white p-8 shadow">
                    <h2 class="text-2xl font-bold mb-4">Mon Profil</h2>
                    <div class="flex flex-col space-y-2 mb-5">
                        <p><strong>Nom :</strong> <?php echo $user->getFullName()?></p>
                        <p><strong>Email :</strong> <?php echo $user->getEmail()?></p>
                        <p><strong>Téléphone :</strong> <?php echo $user->getPhone()?></p>
                        <p><strong>Adresse :</strong> 123 Rue de l'Exemple, Ville, Pays</p>
                    </div>
                    <div class="">
                        <!-- Bouton "Modifier" -->
                        <a href="./edit_profile.php" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h2.586a1 1 0 01.707.293l8 8a1 1 0 010 1.414l-2 2a1 1 0 01-1.414 0l-8-8A1 1 0 013 7.586V10H2V4a1 1 0 011-1zm5 0h4v1H8V5zM6.414 11L11 6.414l4.586 4.586L16 12.414l-2-2L8 14l-2-2 1.414-1.414z" clip-rule="evenodd" />
                        </svg>
                        Modifier
                        </a>
                    </div>
                </div>

                <!-- Colonne de droite -->
                <div class="bg-white p-8 shadow">
                    <h2 class="text-2xl font-bold mb-4">Mes Commandes</h2>
                    <div class="h-3/4 flex flex-col justify-between">
                        <?php if (0 === 0): ?>
                        <!-- Message lorsque l'utilisateur n'a pas de commande -->
                        <p class="">Vous n'avez pas encore passé de commande.</p>
                        <div class=" h-32"></div>
                        <?php else: ?>
                        <div class="my-3">
                            <ul class="md:flex md:space-x-6">
                            <!-- Affichage des commandes (maximum 2) -->
                            <?php for ($i = 0; $i < 2; $i++): ?>
                                <li class="">
                                    <h3 class="text-xl font-bold mb-2">Commande #001</h3>
                                    <p>Date : 2023-05-23</p>
                                    <p>Statut : En cours de livraison</p>
                                </li>
                                <!-- ... Autres commandes ... -->
                            <?php endfor; ?>
                            </ul>
                        </div>
                        <div class=" h-11"></div>
                        <?php endif; ?>
                        <!-- Bouton "Voir toutes les commandes" -->
                        <div class="">
                            <a href="../commandes/commandes.php" class="flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 4a2 2 0 012-2h4a2 2 0 012 2v2h2a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2V4zm6 2H8a1 1 0 00-1 1v8a1 1 0 001 1h4a1 1 0 001-1V7a1 1 0 00-1-1zm-1 3a1 1 0 011 1v2a1 1 0 01-1 1H9a1 1 0 01-1-1V9a1 1 0 011-1h2z" clip-rule="evenodd" />
                            </svg>
                            Voir toutes les commandes
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Colonne de gauche -->
                <div class="bg-white p-8 shadow">
                    <h2 class="text-2xl font-bold mb-4">Mos address</h2>
                    <div class="flex flex-col space-y-2 mb-5">
                        <p><strong>Nom :</strong> <?php echo $user->getFullName()?></p>
                        <p><strong>Email :</strong> <?php echo $user->getEmail()?></p>
                        <p><strong>Téléphone :</strong> <?php echo $user->getPhone()?></p>
                        <p><strong>Adresse :</strong> 123 Rue de l'Exemple, Ville, Pays</p>
                    </div>
                    <div class="">
                        <!-- Bouton "Modifier" -->
                        <a href="./address.php" class="flex items-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h2.586a1 1 0 01.707.293l8 8a1 1 0 010 1.414l-2 2a1 1 0 01-1.414 0l-8-8A1 1 0 013 7.586V10H2V4a1 1 0 011-1zm5 0h4v1H8V5zM6.414 11L11 6.414l4.586 4.586L16 12.414l-2-2L8 14l-2-2 1.414-1.414z" clip-rule="evenodd" />
                        </svg>
                        Modifier
                        </a>
                    </div>
                </div>

                <!-- Colonne de droite -->
                <div class="bg-white p-8 shadow">
                    <h2 class="text-2xl font-bold mb-4">Mes Commandes</h2>
                    <div class="h-3/4 flex flex-col justify-between">
                        <?php if (0 === 0): ?>
                        <!-- Message lorsque l'utilisateur n'a pas de commande -->
                        <p class="">Vous n'avez pas encore passé de commande.</p>
                        <div class=" h-32"></div>
                        <?php else: ?>
                        <div class="my-3">
                            <ul class="md:flex md:space-x-6">
                            <!-- Affichage des commandes (maximum 2) -->
                            <?php for ($i = 0; $i < 2; $i++): ?>
                                <li class="">
                                    <h3 class="text-xl font-bold mb-2">Commande #001</h3>
                                    <p>Date : 2023-05-23</p>
                                    <p>Statut : En cours de livraison</p>
                                </li>
                                <!-- ... Autres commandes ... -->
                            <?php endfor; ?>
                            </ul>
                        </div>
                        <div class=" h-11"></div>
                        <?php endif; ?>
                        <!-- Bouton "Voir toutes les commandes" -->
                        <div class="">
                            <a href="../commandes/commandes.php" class="flex items-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 4a2 2 0 012-2h4a2 2 0 012 2v2h2a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2h2V4zm6 2H8a1 1 0 00-1 1v8a1 1 0 001 1h4a1 1 0 001-1V7a1 1 0 00-1-1zm-1 3a1 1 0 011 1v2a1 1 0 01-1 1H9a1 1 0 01-1-1V9a1 1 0 011-1h2z" clip-rule="evenodd" />
                            </svg>
                            Voir toutes les commandes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../dist/js/script.js"></script>
</body>
</html>