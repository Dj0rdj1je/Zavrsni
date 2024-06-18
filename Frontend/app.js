
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

function addToCart() {
    let request = {
        url: "AddToCart.php",
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