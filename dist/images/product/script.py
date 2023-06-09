# parcourir le dossier dist/images/product/homme

import os

# chemin du dossier dist/images/product/homme
path = "dist/images/product/homme"

# parcourir le dossier dist/images/product/homme

num = 106

for name in os.listdir(path):
    chemin_fichier = os.path.join(path, name)

    if os.path.isfile(chemin_fichier):
        # Nouveau nom du fichier
        new_name = f"{num}.jpg"

        # Chemin du nouveau nom du fichier
        new_name_path = os.path.join(path, new_name)

        # Renommer le fichier
        os.rename(chemin_fichier, new_name_path)
        num += 0