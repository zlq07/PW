function validateName() {
    var name = document.getElementById("usuario").value;
    var msg = document.getElementById("nameMsg");
    if (name == null || name == "") {
        msg.innerHTML = "¡Nombre de Usuario Vacio!";
        msg.style.color = "red";
        return false;
    } else if (name.length < 4) {
        msg.innerHTML = "¡Longitud de nombre debe ser mayor que 4!";
        msg.style.color = "red";
        return false;
    }
    msg.innerHTML = "√";
    msg.style.color = "green";
    return true;
}

function validatePwd() {
    var password1 = document.getElementById("password").value;
    var msg = document.getElementById("pwdMsg1");
    // contraseña debe terner mayoscula, menuscula, numero, no caracter especial y longitud mas de 8
    var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=\S*\d)\S{8,}$/;
    if (password1 == null || password1 == "") {
        msg.innerHTML = "¡Contraseña Vacia!";
        msg.style.color = "red";
        return false;
    } else if (password1.length < 8) {
        msg.innerHTML = "¡Contraseña debe tener mas de 8 digitos!";
        msg.style.color = "red";
        return false;
    } else if (reg.test(password1)) {
        msg.innerHTML = "¡Se requiere que la contraseña incluya letras mayuscula, minusculas, números, sin caracter especial, y más de 8 dígitos!";
        msg.style.color = "red";
    }
    msg.innerHTML = "√";
    msg.style.color = "green";
    return true;
}

function confirmPwd() {
    var pwd1 = document.getElementById("password").value;
    var pwd2 = document.getElementById("password2").value;
    var msg = document.getElementById("pwdMsg2");
    if (pwd1 != pwd2) {
        msg.innerHTML = "Las contraseñas no coinciden con la anterior!";
        msg.style.color = "red";
        return false;
    }
    msg.innerHTML = "√";
    msg.style.color = "green";
    return true;
}

function validateEmail() {
    var email = document.getElementById("email").value;
    var msg = document.getElementById("emailMsg");
    var reg = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/;
    if (email == null || email == "") {
        msg.innerHTML = "¡Email Vacio!";
        msg.style.color = "red";
        return false;
    } else if (reg.test(email)) {
        msg.innerHTML = "¡Email no existe!";
        msg.style.color = "red";
        return false;
    }
    msg.innerHTML = "√";
    msg.style.color = "green";
    return true;
}

function validateTelefono() {
    var telefono = document.getElementById("telefono").value;
    var msg = document.getElementById("telMsg");
    var reg = /^[0-9]{9}$/;
    if (telefono == null || telefono == "") {
        msg.innerHTML = "¡telefono Vacia!";
        msg.style.color = "red";
        return false;
    } else if (telefono.length == 9) {
        msg.innerHTML = "¡El numero de telefono debe tener 9 digito!";
        msg.style.color = "red";
        return false;
    } else if (reg.test(telefono)) {
        msg.innerHTML = "telefono no valido";
        msg.style.color = "red";
        return false;
    }
    msg.innerHTML = "√";
    msg.style.color = "green";
    return true;
}

function validateDni() {
    var numero;
    var letr;
    var letra;
    var dni = document.getElementById("DNI").value;
    var reg = /^\d{8}[a-zA-Z]$/;
    var msg = document.getElementById("dniMsg");
    if (reg.test(dni)) {
        numero = dni.substr(0, dni.length - 1);
        letr = dni.substr(dni.length - 1, 1);
        numero = numero % 23;
        letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
        letra = letra.substring(numero, numero + 1);
        if (letra != letr.toUpperCase()) {
            msg.innerHTML = "Dni erroneo, la letra del NIF no se corresponde";
            msg.style.color = "red";
            return false;
        } else {
            msg.innerHTML = "√";
            msg.style.color = "green";
            return true;
        }

    } else if (dni == null || dni == "") {
        msg.innerHTML = "¡DNI Vacia!";
        msg.style.color = "red";
        return false;
    } else {
        msg.innerHTML = "√";
        msg.style.color = "green";
        return true;
    }
}

function registerUsuario() {
    var result = "";
    if (validateName() && validatePwd() && confirmPwd() && validateEmail()) {
        result = true;
    }
    if (result) {
        alert("Registro con existo!");
    }
}

function registerComisario() {
    var result = "";
    if (validateName() && validatePwd() && validateDni() && validateTelefono() && confirmPwd() && validateEmail()) {
        result = true;
    }
    if (result) {
        alert("Registro con existo!");
    }
}

