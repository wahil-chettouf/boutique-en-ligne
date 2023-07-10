const addressesBox = document.querySelector('#addresses');
const messageZeroAddress = document.querySelector('#messageZeroAddress');

const getAddress = async () => {
    const response = await fetch('../../src/api/user/address/address.php');
    const data = await response.json();
    return data.addresses;
};

const displayAddress = async () => {
    addressesBox.innerHTML = '';
    const addresses = await getAddress();
    let counter = 1;
    if(addresses.length === 0) {
        // display a message
        messageZeroAddress.classList.remove('hidden');
    } else {
        addresses.forEach(address => {
            addressesBox.innerHTML += `
                <li class="mb-4">
                    <h1 class="font-bold">Address N_${counter} : </h1>
                    <p>${address.address_line_1}</p>
                    <p>${address.address_line_2}</p>
                    <p>${address.city}</p>
                    <p>${address.state}</p>
                    <p>${address.zip_code}</p>
                    <p>${address.country}</p>
    
                    <!-- supprimer button  -->
                    <button class="text-sm text-red-500 hover:text-red-700" onclick="deleteAddress(${address.id})">Supprimer</button>
                    <!-- modifier button  -->
                    <a href="edit_address.php?id=${address.id}" class="text-sm text-blue-500 hover:text-blue-700 ">Modifier</a>
                </li>
            `;
            counter++;
        });
    }
};
displayAddress();

const deleteAddress = async (id) => {
    const requestOption = {
        method: 'DELETE',
    };

    const response = await fetch(`../../src/api/user/address/address.php?id=${id}`, requestOption)

    const data = await response.json();

    if(data.success) {
        if(data.notification) { 
            alert(data.notification);
            window.location.href = "./address.php";
        }
    } else {
        
    }

    // update the UI
    displayAddress();
};