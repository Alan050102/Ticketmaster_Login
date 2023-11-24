        // Función para mostrar u ocultar los campos según la opción seleccionada
        document.getElementById("metodoPago").addEventListener("change", function() {
            var selectedOption = this.value;
    
            // Oculta todos los campos primero
            document.getElementById("inputTarjetaDebito").style.display = "none";
            document.getElementById("inputTarjetaCredito").style.display = "none";
            document.getElementById("inputPayPal").style.display = "none";
    
            // Muestra el campo correspondiente a la opción seleccionada
            if (selectedOption === "Débito") {
                document.getElementById("inputTarjetaDebito").style.display = "block";
            } else if (selectedOption === "Crédito") {
                document.getElementById("inputTarjetaCredito").style.display = "block";
            } else if (selectedOption === "Paypal") {
                document.getElementById("inputPayPal").style.display = "block";
            }
        });

            // Seleccionar el botón de envío por su ID
            var submitButton = document.getElementById("submitButton");

            // Agregar un evento de clic al botón de envío
            submitButton.addEventListener("click", function() {
            // Mostrar una alerta al hacer clic en el botón
            alert("Se ha realizado el pago correctamente.");
        });