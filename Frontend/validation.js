function checkUsername(){

    let username = document.getElementById('username').value
    let pattern =  /^[a-zA-Z0-9]*$/
    let test = pattern.test(username);

    if (!test){
        document.getElementById('usernameError').innerHTML = "Ne smiju se karakteri odvajati!"
        document.getElementById('register').disabled = true
        return false
    }else{
        document.getElementById('usernameError').innerHTML = ''
        document.getElementById('register').disabled = false
        return true;
    }

}

function checkEmail(){

    let email = document.getElementById('email').value
    let pattern = /^[^@]+@[^@]+\.[^@]+$/
    let test = pattern.test(email);

    if (!test){
        document.getElementById('emailError').innerHTML = "Nepravilan format maila!"
        document.getElementById('register').disabled = true
        return false
    }else{
        document.getElementById('emailError').innerHTML = ''
        document.getElementById('register').disabled = false
        return true;
    }

}


function checkPassword(){

    let password = document.getElementById('password').value
    let pattern = /^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/
    let test = pattern.test(password);

    if (!test){
        document.getElementById('passwordError').innerHTML = "Nepravilan format sifre!"
        document.getElementById('register').disabled = true
        return false
    }else{
        document.getElementById('passwordError').innerHTML = ''
        document.getElementById('register').disabled = false
        return true;
    }

}

