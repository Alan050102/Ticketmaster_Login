document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var mensajeElement = document.getElementById("mensaje");

    // Crear una lista para almacenar mensajes de error
    var errores = [];

    // Validar longitud de usuario
    if (username.length < 4 || username.length > 10) {
        errores.push("- El usuario debe tener de 4 a 10 caracteres alfanuméricos.");
    }

    // Validar que el usuario no comience con minúscula
    if (/^[a-z]/.test(username)) {
        errores.push("- El usuario no puede comenzar con una minúscula.");
    }

    // Validar que el usuario no comience con caracteres especiales
    if (/^[!@#$%^&*()\-_=+{}|.,:;'"<>?`~]/.test(username)) {
        errores.push("- El usuario no puede comenzar con caracteres especiales.");
    }

    // Validar que no haya espacios en el usuario
    if (/\s/.test(username)) {
        errores.push("- El usuario no puede contener espacios.");
    }

    // Validar longitud de contraseña
    if (password.length !== 8) {
        errores.push("- La contraseña debe tener 8 caracteres.");
    }

    // Validar minúsculas en la contraseña
    if (password !== password.toLowerCase()) {
        errores.push("- La contraseña debe contener solo minúsculas.");
    }

    // Invalidar números en la contraseña
    if (/\d/.test(password)) {
        errores.push("- No se permiten números en la contraseña.");
    }

    // Validar caracteres especiales solo al inicio y al final de la contraseña
    if (!/^[!@#$%^&*()\-_=+{}|.,:;'"<>?`~][a-z]*[!@#$%^&*()\-_=+{}|.,:;'"<>?`~]$/.test(password)) {
        errores.push("- Los caracteres especiales solo están permitidos al inicio y al final de la contraseña.");
    }
    
    // Mostrar mensajes de error si los hay
    if (errores.length > 0) {
        mensajeElement.className = "error";
        mensajeElement.innerHTML = errores.join("<br>");
    } else {
        var xhr = new XMLHttpRequest();
        var url = 'php/login.php';
        var params = 'iniciar_sesion=true&username=' + username + '&password=' + password;
        
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Respuesta del servidor:", xhr.responseText);

                    if (xhr.responseText.trim() === "Se ha conectado a la BD correctamente success") {
                        alert('Inicio de sesión exitoso.');
                        window.location.href = 'boletos.html';
                    } else if (xhr.responseText.trim() === "Se ha conectado a la BD correctamente failure") {
                        mensajeElement.className = "error";
                        mensajeElement.innerHTML = "Usuario o contraseña incorrectos.";
                    } else {
                        alert('Error desconocido.');
                    }
                }
            }
        };

        xhr.send(params);
    }
});