<?php
    require_once '../src/classes/Utilisateurs.php'; 
    require_once '../src/classes/Products.php'; 

    // if($_SERVER['REQUEST_METHOD'] === 'GET') 
    if(isset($_GET['p_id'])) {
        $product = Products::getProductById($_GET['p_id']);
    } 
?>

<!DOCTYPE html>
<html lang="fr-FR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../dist/style.css">
</head>
<body>
    <div class="app box-border">
        <?php require_once '../components/header.php'; ?>
        
        <div class="container flex flex-col space-y-6 px-2 mx-auto my-9">
            <div class="flex flex-col max-sm:space-y-3 justify-between w-full sm:flex-row sm:space-x-2 ">
                <section id="" class="sm:basis-2/4">
                    <div class="py-2 text-center uppercase">
                        <div class="flex sm:justify-center">
                            <img class="w-56" src="<?php echo $product->p_featured_photo?>" alt="<?php echo $product->p_name?>">
                        </div>
                    </div>
                </section>

                <section id="" class="basis-2/4">
                    <div class="flex flex-col sm:px-1 space-y-3 ">
                        <div class="">
                            <h2 class="font-bold"><?php echo $product->p_name?></h2>
                        </div>
                        <div class="">
                            <span>#<?php echo $product->p_id?></span>
                        </div>
                        <div class="">
                            <span>EUR <?php echo $product->p_current_price?> € TVA incluse</span>
                        </div>
                        <div class="">
                            <?php if($product->p_stock > 0) :?>
                                <span>Produit disponible</span>
                            <?php else :?>
                                <span>Produit indisponible</span>
                            <?php endif;?>
                        </div>
                        <div class="">
                            <div class="flex space-x-2">
                                <div class="">
                                    <span>Quantité : </span>
                                </div>
                                <div class="flex space-x-1">
                                    <div class="">
                                        <button class="btn btn-primary bg-slate-400 w-6" id="btn-minus">-</button>
                                    </div>
                                    <div class="">
                                        <input type="number" name="qty" id="qty" value="1" min="1" max="<?php echo $product->p_stock?>" class="border-none outline-none w-6 bg-red-100  text-center [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none">
                                    </div>
                                    <div class="">
                                        <button class="btn btn-primary bg-slate-400 w-6" id="btn-plus">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="">
                                <button class="btn btn-primary text-white bg-red-600 py-2 px-4 rounded" id="btn-add-to-cart">Ajouter au panier</button>
                            </div>
                            <div class="h-10">
                                <button class="btn btn-primary h-full px-6 rounded border-2 border-solid border-gray-500 hover:border-red-600" id="btn-add-to-favorite"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="">
                            <span class="text-sm">Délai de Traitement : sera calculé lorsque l'article aura été sélectionné
                                Temps de livraison:Envoi Express 4-6 jours ouvrés
                            </span>
                        </div>
                    </div>
                </section>
            </div>

            <div class="flex flex-col space-y-4">
                <section class="" id="">
                    <div class="flex flex-col space-y-2">
                        <div class="">
                            <h2 class="font-bold">Description</h2>
                        </div>
                        <div class="">
                            <p class="text-sm"><?php echo $product->p_description?></p>
                        </div>
                    </div>
                </section>

                <section class="">
                    <!-- section d'avis -->
                    <div class="flex flex-col space-y-2">
                        <div class="">
                            <h2 class="font-bold">Avis</h2>
                        </div>
                        <div class="flex bg-red-50 p-2">
                            <div class="">
                                <div class="flex flex-col space-y-3">
                                    <span class="font-bold">4.8</span>
                                </div>
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 22 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </div>
                                <div class="">
                                    <span class="text-sm">Basé sur 4 avis</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="../dist/js/script.js"></script>
</body>
</html>