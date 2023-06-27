// Pour ajouter des features
const boutonAjouter = document.getElementById('ajouterFeature');
const listeFeatures = document.getElementById('featuresAjoutees');

boutonAjouter.addEventListener('click', () => {
    const valeurFeature = document.getElementById('p_feature').value;
    if (valeurFeature.trim() !== '') {
        const nouveauFeature = document.createElement('li');
        nouveauFeature.textContent = valeurFeature;
        listeFeatures.appendChild(nouveauFeature);
        document.getElementById('p_feature').value = '';
    }
});


// la forme de la requête
const newProductForm = document.getElementById('newProductForm');

// Quand on clique sur le bouton "Ajouter un produit"
const newProduct = document.getElementById('newProduct');
newProduct.addEventListener('click', (e) => {
    e.preventDefault();
    //alert('Produit ajouté !');

    // On vide les erreurs
    const errorsSpan = document.querySelectorAll('.error');
    errorsSpan.forEach(error => {
        error.textContent = '';
    });

    const formData = new FormData(newProductForm);
    
    // On récupère les features
    // const features = [];
    // const featuresAjoutees = document.querySelectorAll('#featuresAjoutees li');
    // featuresAjoutees.forEach(feature => {
    //     features.push(feature.textContent);
    // });
    // formData.append('p_feature', JSON.stringify(features));

    // On envoie la requête 
    fetch("../../src/api/product/insertProduct.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        //console.log(data);
        if (data.success) {
            alert('Produit ajouté !');
            // On vide le formulaire
            newProductForm.reset();
            // On vide la liste des features
            listeFeatures.innerHTML = '';
        } else {
            //alert('Une erreur est survenue');
            displayError(data.errors);
        }
    })
    .catch(error => {
        //alert('Une erreur est survenue');
        console.log(error);
    })
});

const displayError = (errors) => {
    // parcourir l'objet errors
    for (const [key, value] of Object.entries(errors)) {
        const spanError = document.getElementById(key + "_error");
        spanError.textContent = value;
        //console.log(spanError);
    }
    
};