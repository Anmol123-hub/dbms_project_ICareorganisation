var removeCartItemButtons = document.getElementsByClassName('btn-danger')

var resultFinal;
var rewardFieldValue=0;
var rewardField;

for (var i = 0; i < removeCartItemButtons.length; i++) {
    var button = removeCartItemButtons[i]
    button.addEventListener('click', removeCartItem)
}

var quantityInputs = document.getElementsByClassName('cart-quantity-input')
for (var i = 0; i < quantityInputs.length; i++) {
    var input = quantityInputs[i]
    input.addEventListener('change', quantityChanged)
}

var addToCartButtons = document.getElementsByClassName('shop-item-button')
for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i]
    button.addEventListener('click', addToCartClicked)
}

// document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)

// function purchaseClicked() {
//     alert('You will now be moved to the checkout page...')
// }

function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var imgSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    console.log(title, price, imgSrc)
    addItemToCart(title, price, imgSrc)
    updateCartTotal()
}

function addItemToCart(title, price, imgSrc) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cart-items')[0]
    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    for (var i = 0; i < cartItemNames.length; i++) {
        if (cartItemNames[i].innerText == title) {
            alert('This is item is already added to cart!!')
            return
        }
    }

    var cartRowContents = `
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="${imgSrc}" width="100" height="100">
        <span class="cart-item-title">${title}</span>
    </div>
    <span class="cart-price cart-column">${price}</span>
    <div class="cart-quantity cart-column">
        <input class="cart-quantity-input" type="number" value="1">
        <button class="btn btn-danger" type="button">REMOVE</button>
    </div>`
    cartRow.innerHTML = cartRowContents
    cartItems.append(cartRow)
    cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
    cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)

}

function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}

function removeCartItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}

var globalTotal = 0;

function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var total = 0

    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rs.', ''))
        var qunatity = quantityElement.value
        total = total + (price * qunatity)
        globalTotal = total
    }
    rewardFieldValue = parseInt(document.getElementById("pointstf").value);
    
     if (rewardFieldValue.isNaN == false) {
        total -= rewardFieldValue;
    } else {
        document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + total
    }
}

//Second Part
function passTotalValue() {
    var cartPriceElement = document.getElementsByClassName('cart-total-price')[0].innerText
    var cartPrice = parseInt(cartPriceElement.replace('Rs.', ''))
    if (cartPrice >= 200) {

        var totalValue = document.getElementById("cart-total-price").innerHTML
        alert("You will now be moved to the checkout page....")
        window.location = "checkout.html"
        localStorage.setItem("totalValue", totalValue);
        passCartValues();
        return false;
    } else {
        alert("Minimum cart value should be 200 Rs!");
    }

}

function passCartValues() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    var details = [];
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        var productTitleElement = cartRow.getElementsByClassName('cart-item-title')[0]
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        var price = parseFloat(priceElement.innerText.replace('Rs.', ''))
        var quantity = quantityElement.value;
        var productTitle = productTitleElement.innerText;
        details[i] = {
            productTitle,
            quantity,
            price
        }
    }
    localStorage.setItem('cart', JSON.stringify(details))
    if (resultFinal > 0) {
        localStorage.setItem('pointRedeemed', document.getElementById("pointstf").value)
    } else {
        localStorage.setItem('pointRedeemed', 0)
    }

    // console.log(details)
    // $.ajax({
    //     url: "checkoutr.php",
    //     method: "post",
    //     data: { details: JSON.stringify(details) },
    //     success: function(res) {
    //         console.log(res);
    //     }
    // })

}


function EnableDisableTextBox(chkRewardPoints) {
    rewardField = document.getElementById("pointstf");
    rewardField.disabled = chkRewardPoints.checked ? false : true;
    if (!rewardField.disabled) {
        rewardField.focus();
        $.ajax({
            url: 'storer.php', // my php file
            type: 'GET', // type of the HTTP request
            success: function(result) {
                rewardField.value = result;
                resultFinal = result;
                console.log(resultFinal)

                if (resultFinal == 0) {
                    alert("You dont have any reward points as of now :( Donate to earn more reward points!");
                    rewardField.disabled = true
                    document.getElementById('checkredem').checked = false;
                    
                }
                else{
                    rewardFieldValue = parseInt(document.getElementById("pointstf").value);
                    totalAfterDiscount()
                }
            }

        });
    } else {
        if(resultFinal!=0){
            totalBeforeDiscount(parseInt(rewardField.value))
            rewardField.value = 0;
        }
    }
}

function pointsChanged() {
    const cresult = parseInt(resultFinal, 10)
        if (rewardField.value > cresult) {
            rewardField.value = cresult
        } else if (rewardField.value < 1) {
            rewardField.value = 1
        }
}

function UpdatePointsOnChange() {
    if(resultFinal!=0){
        rewardFieldValue = parseInt(document.getElementById("pointstf").value);
        document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + (globalTotal - rewardFieldValue)
    }
}


function totalAfterDiscount() {
    var rewardField = document.getElementById("pointstf");
    rewardFieldValue = parseInt(rewardField.value)
        //var cartTotal = parseInt(document.getElementById("cart-total-price").innerText.replace('Rs.', ''))

    var priceAfterDiscount = globalTotal - rewardFieldValue
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + priceAfterDiscount
}

function totalBeforeDiscount() {
    // var cartTotal = parseInt(document.getElementById("cart-total-price").innerText.replace('Rs.', ''))
    //     // var rewardFieldValue = parseInt(document.getElementById("pointstf").value);
    // var priceBeforeDiscount = cartTotal + rfvalue
    // console.log(priceBeforeDiscount)
    document.getElementsByClassName('cart-total-price')[0].innerText = 'Rs.' + globalTotal
}