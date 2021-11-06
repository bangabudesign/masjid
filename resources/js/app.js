require('./bootstrap');

let carts = document.querySelectorAll('.add-to-cart') ?? null;

if (carts) {
    for (let i = 0; i < carts.length; i++) {
        carts[i].addEventListener('click', () => {
            cartNumbers({
                id: parseInt(carts[i].dataset.id),
                name: carts[i].dataset.name,
                price: parseInt(carts[i].dataset.price),
                image: carts[i].dataset.image,
                inCart: 0
            });
            totalCost({
                id: parseInt(carts[i].dataset.id),
                name: carts[i].dataset.name,
                price: parseInt(carts[i].dataset.price),
                image: carts[i].dataset.image,
                inCart: 0
            });
        })
    }
}

function onloadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers') ?? localStorage.setItem('cartNumbers', 0);
    let cartItems = localStorage.getItem('productsInCart') ?? localStorage.setItem('productsInCart', JSON.stringify({}));
    let cartCost = localStorage.getItem('totalCost') ?? localStorage.setItem('totalCost', 0);

    if ( productNumbers ) {
        document.querySelector('.cart-1 span') != null ? (document.querySelector('.cart-1 span').textContent = productNumbers) : '';
        document.querySelector('.cart-2 span') != null ? (document.querySelector('.cart-2 span').textContent = productNumbers) : '';
    }
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    
    if ( productNumbers ) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart-1 span').textContent = productNumbers + 1;
        document.querySelector('.cart-2 span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart-1 span').textContent = 1;
        document.querySelector('.cart-2 span').textContent = 1;
    }

    setItems(product);
}

function setItems(product) {
    let cartItems = localStorage.getItem('productsInCart')
    cartItems = JSON.parse(cartItems);
    // console.log('My cartItems are', cartItems);

    if (cartItems != null) {
        if (cartItems[product.id] == undefined) {
            cartItems = {
                ...cartItems,
                [product.id]: product
            }
        }
        cartItems[product.id].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.id]: product
        };
    }

    localStorage.setItem("productsInCart", JSON.stringify(cartItems));
}

function totalCost(product) {
    let cartCost = localStorage.getItem("totalCost");
    // console.log("My cartCost is", cartCost);
    // console.log(typeof cartCost);
    
    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.price);
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart() {
    let cartItems = localStorage.getItem("productsInCart");
    let cartCost = localStorage.getItem("totalCost");
    cartCost = parseInt(cartCost);
    let cartCostElement = document.querySelector(".cart-cost");
    if (cartCostElement) {
        cartCostElement.innerHTML = `Rp ${Number((cartCost).toFixed(1)).toLocaleString()}`;
    }
    cartItems = JSON.parse(cartItems);
    let productContainer = document.querySelector(".cart-container") ?? null;
    if ( cartCost > 0 && cartItems && productContainer ) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
            <div class="cart-items mb-3 pb-lg-3 border-bottom">
                <div class="thumbnail rounded">
                    <img src="${item.image}" alt="cart item">
                </div>
                <div class="product-detail">
                    <h6 class="font-weight-normal">${item.name}</h6>
                    <p class="mb-0 font-weight-bold">Rp ${Number((item.price).toFixed(1)).toLocaleString()}</p>
                </div>
                <div class="product-qty">
                    <button class="btn p-2 text-secondary mr-3 remove-product" data-id="${item.id}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M9 2a1 1 0 0 0-.894.553L7.382 4H4a1 1 0 0 0 0 2v10a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V6a1 1 0 1 0 0-2h-3.382l-.724-1.447A1 1 0 0 0 11 2H9zM7 8a1 1 0 0 1 2 0v6a1 1 0 1 1-2 0V8zm5-1a1 1 0 0 0-1 1v6a1 1 0 1 0 2 0V8a1 1 0 0 0-1-1z" clip-rule="evenodd"/></svg></button>
                    <button class="btn p-2 text-danger decrease-qty" data-id="${item.id}" data-price="${item.price}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM7 9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H7z" clip-rule="evenodd"/></svg></button>
                    <span class="px-3 border-bottom">${item.inCart}</span>
                    <button class="btn p-2 text-success increase-qty" data-id="${item.id}" data-price="${item.price}"><svg xmlns="http://www.w3.org/2000/svg" height="24px" width="24px" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-11a1 1 0 1 0-2 0v2H7a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2V7z" clip-rule="evenodd"/></svg></button>
                </div>
            </div>
            `;
        });
    } else {
        if (productContainer) {
            productContainer.innerHTML = `
            <div class="d-flex" style="height: 100%">
                <div class="m-auto text-secondary">
                    <div class="text-center mb-3"><svg xmlns="http://www.w3.org/2000/svg" height="100px" width="100px" viewBox="0 0 20 20" fill="currentColor"><path d="M3 1a1 1 0 0 0 0 2h1.22l.305 1.222a.997.997 0 0 0 .01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 0 0 0-2H6.414l1-1H14a1 1 0 0 0 .894-.553l3-6A1 1 0 0 0 17 3H6.28l-.31-1.243A1 1 0 0 0 5 1H3zm13 15.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zM6.5 18a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/></svg></div>
                    <p class="text-center mb-0">Keranjang Belanja Anda <br> Masih Kosong</p>
                </div>
            </div>
            `;
        }
    }

    // increase
    let increaseButtons = document.querySelectorAll('.increase-qty');
    
    for (let i = 0; i < increaseButtons.length; i++) {
        increaseButtons[i].addEventListener('click', () => {
            cartNumbers({
                id: parseInt(increaseButtons[i].dataset.id),
                price: parseInt(increaseButtons[i].dataset.price),
                inCart: 0
            });
            totalCost({
                id: parseInt(increaseButtons[i].dataset.id),
                price: parseInt(increaseButtons[i].dataset.price),
                inCart: 0
            });
            displayCart();
        })
    }

    // decreas
    let decreaseButtons = document.querySelectorAll('.decrease-qty');
    
    for (let i = 0; i < decreaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', () => {
            if (cartItems[increaseButtons[i].dataset.id].inCart <= 1) {
                // delete product if 0
                if (confirm("Hapus produk ini?") == true) {
                    removeItem(increaseButtons[i].dataset.id);
                }
            } else if (cartItems[increaseButtons[i].dataset.id].inCart > 1) {
                // decrease cartNumbers
                let productNumbers = localStorage.getItem('cartNumbers');
                productNumbers = parseInt(productNumbers);
                
                if ( productNumbers ) {
                    localStorage.setItem('cartNumbers', productNumbers - 1);
                    document.querySelector('.cart-1 span').textContent = productNumbers - 1;
                    document.querySelector('.cart-2 span').textContent = productNumbers - 1;
                } else {
                    localStorage.setItem('cartNumbers', 1);
                    document.querySelector('.cart-1 span').textContent = 1;
                    document.querySelector('.cart-2 span').textContent = 1;
                }
                // decrease totalCost
                let cartCost = localStorage.getItem("totalCost");
                
                if (cartCost != null) {
                    cartCost = parseInt(cartCost);
                    localStorage.setItem("totalCost", cartCost - parseInt(increaseButtons[i].dataset.price));
                } else {
                    localStorage.setItem("totalCost", parseInt(increaseButtons[i].dataset.price));
                }
                // decrease product inCart
                cartItems[increaseButtons[i].dataset.id].inCart -= 1;
                localStorage.setItem("productsInCart", JSON.stringify(cartItems));
                displayCart();
            }
        })        
    }

    // remove
    let removeButtons = document.querySelectorAll('.remove-product') ?? null;

    for (let i = 0; i < removeButtons.length; i++) {
        removeButtons[i].addEventListener('click', () => {
            if (confirm("Hapus produk ini?") == true) {
                removeItem(removeButtons[i].dataset.id);
            }
        });
    }
}

function removeItem(item_id) {
    console.log(item_id);
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let cartCost = localStorage.getItem("totalCost");
    cartCost = parseInt(cartCost);
    localStorage.setItem("totalCost", cartCost - (parseInt(cartItems[id = item_id ].price) * parseInt(cartItems[id = item_id ].inCart)));
    
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    localStorage.setItem('cartNumbers', productNumbers - parseInt(cartItems[id = item_id ].inCart));
    if ( productNumbers ) {
        document.querySelector('.cart-1 span').textContent = productNumbers - parseInt(cartItems[id = item_id ].inCart);
        document.querySelector('.cart-2 span').textContent = productNumbers - parseInt(cartItems[id = item_id ].inCart);
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart-1 span').textContent = 1;
        document.querySelector('.cart-2 span').textContent = 1;
    }

    delete cartItems[id = item_id ];
    localStorage.setItem("productsInCart", JSON.stringify(cartItems));

    displayCart();
}

let processButton = document.getElementById("process-order") ?? null;
if (processButton) {
    processButton.addEventListener("click",processOrder, false);
}

function processOrder() {
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let cartCost = localStorage.getItem("totalCost");
    cartCost = parseInt(cartCost);
    let msg = '';
    Object.values(cartItems).map(item => {
        msg += `${item.name}%0A_Rp ${Number((item.price).toFixed(1)).toLocaleString()} x ${item.inCart}%0A_`;
    });
    msg += `%0A*Total Rp ${Number((cartCost).toFixed(1)).toLocaleString()}*%0A%0A`;
    msg += `-------%0ANama Pemesan:%0A`;
    msg += `Alamat Pengiriman:%0A`;

    let num = 628999901222;
  
    var win = window.open(`https://wa.me/${num}?text=Assalamu'alaikum%0A%0ASaya+mau+membeli+produk:%0A%0A${msg}`, '_blank');
   // win.focus();
}

onloadCartNumbers();
displayCart();
