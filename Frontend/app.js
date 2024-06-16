




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

// function edit(){
//
//     let request = {
//         url: "edit.php",
//         data: {
//             username: $('#username').val(),
//             email: $('#email').val(),
//             password: $('#password').val(),
//             id: $('#id').val()
//         },
//         method: 'post',
//         success: function (result) {
//             $('#table').html(result);
//         },
//         error: function (xhr, status, error) {
//             $('#table').html(error);
//         },
//     }
//
//     $.ajax(request);
//
// }