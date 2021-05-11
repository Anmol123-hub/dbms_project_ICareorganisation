function saveAddressToTA(f) {
    if (!(f.city.value == '' && f.state.value == '')) {
        f.compaddress.value = f.address.value + "," + f.city.value + "," + f.state.value + "," + f.zip.value;
        // var cookieString = "streetad=" + f.address.value + ";city=" + f.city.value + ";state=" + f.state.value + ";zip=" + f.zip.value;
        // document.cookie = cookieString;
        var customObject = {};
        customObject.staddress = f.address.value;
        customObject.city = f.city.value;
        customObject.state = f.state.value;
        customObject.zip = f.zip.value;

        var jsonString = JSON.stringify(customObject)
        document.cookie = "addressCookie=" + jsonString;
        document.getElementById('purchase').disabled = false;
    } else {
        alert('Enter the Complete address first!');
        document.getElementById('purchase').disabled = true;
    }
}

function storeValues() {
    //$(".loader-wrapper").fadeIn("slow");
    var cart = localStorage.getItem('cart');

    var adr = document.getElementById('adr').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;
    var zip = document.getElementById('zip').value;

    var pointRedeemed = localStorage.getItem('pointRedeemed')

    $.ajax({
        url: "checkoutr.php",
        method: "post",
        data: { cart: cart, adr: adr, city: city, state: state, zip: zip, predeemed: pointRedeemed },
        success: function(res) {
            console.log(res);
        }
    })

    document.body.innerHTML = '<div class="loader-wrapper">' +
        '<span class="loader"><span class="loader-inner"></span></span>' +
        '<h3 class="loading-text"> Placing Order......</h3>' +
        '</div>'

    setTimeout(function() {
        alert("You order has been placed successfuly :)")
        window.location.href = '../home.html'
    }, 5000);

}

function getAdDetails() {
    var pincode = jQuery('#zip').val();
    if (pincode == '') {
        jQuery('#city').val('');
        jQuery('#state').val('');
        document.getElementById('purchase').disabled = true;
    } else {
        jQuery.ajax({
            url: 'getpin.php',
            type: 'post',
            data: 'pincode=' + pincode,
            success: function(data) {
                if (data == 'no') {
                    alert('Invalid Pin code! Enter a valid pin code')
                    jQuery('#city').val('');
                    jQuery('#state').val('');
                    document.getElementById('purchase').disabled = true;
                } else {
                    var getData = $.parseJSON(data)
                    jQuery('#city').val(getData.city);
                    jQuery('#state').val(getData.state);
                }
            }
        })
    }
}