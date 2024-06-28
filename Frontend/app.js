function find(){

    let request = {
        url: "data.php",
        data: {
            search_phrase: $('#search').val()
        },
        method: 'get',
        success: function (result) {
            $('#lista').html(result);
        },
        error: function (xhr, status, error) {
            $('#lista').html(error);
        },
    }

    $.ajax(request);

}

function choose(){

    let request = {
        url: "data.php",
        data: {
            category: $('#category').val()
        },
        method: 'get',
        success: function (result) {
            $('#table').html(result);
        },
        error: function (xhr, status, error) {
            $('#table').html(error);
        },
    }

    $.ajax(request);

}

function getCartData(){

    let request = {
        url: "cartData.php",
        method: 'get',
        success: function (result) {
            $('#data').html(result);
        },
        error: function (xhr, status, error) {
            $('#data').html(error);
        },
    }

    $.ajax(request);

}



function edit(){

    let request = {
        url: "editUser.php",
        data: {
            userId: $('#userId').val(),
            username: $('#username').val(),
            email: $('#email').val(),
            password: $('#password').val()
        },
        method: 'post',
        success: function (result) {
           alert(result)
        },
        error: function (xhr, status, error) {
            alert(error)
        },
    }

    $.ajax(request);

}

function addItem() {
    let request = {
        url: "add.php",
        method: 'post',
        data: {
            model: $('#model').val(),
            price: $('#price').val(),
            quantity: $('#quantity').val(),
            categoryId: $('#categoryId').val()
        },
        success: function (result) {
            alert(result);

        },
        error: function (xhr, status, error) {
            alert("Error deleting movie: " + error);
        },
    }

    $.ajax(request);
}

function addProductToCart(productId) {
    let request = {
        url: "addProductToCart.php",
        method: 'post',
        data: {
            productId: productId

        },
        success: function (result) {
            alert("Uspjeno ste dodali proizvod u korpu!" + result)

        },
        error: function (xhr, status, error) {
            alert(error)
        },
    }

    $.ajax(request);
}
function removeProduct(removeId, productId) {
    let request = {
        url: "removeFromCart.php",
        method: 'post',
        data: {
            removeId: removeId,
            productId: productId

        },
        success: function (result) {
            alert("Uspjeno ste obrisali proizvod iz korpe!" + result)
            getCartData();
        },
        error: function (xhr, status, error) {
            alert(error);
        },
    }

    $.ajax(request);
}


function buyProduct(sum){
    let request = {
        url: "export.php",
        method: 'post',
        data: {
            sum: sum
        },
        success: function (result) {
            $('#err').html( "Uspjeno ste obavili kupovinu!" + result)

        },
        error: function (xhr, status, error) {
            alert(error);
        },
    }

    $.ajax(request);
}