$(document).ready(function () {
  $("#form1").submit(function (e) {
    e.preventDefault();
    let mensajesMostrar = "";
    let entrar = false;
    var rut = $("#rut").val();
    var nombre = $("#nombre").val();
    var correo = $("#correo").val();
    var direccion = $("#direccion").val();
    var contra = $("#contra").val();
    var repContra = $("#repContra").val();
    var letras = "ABCDEFGHIJKMNÑLOPQRSTUVWXYZ";


    if (nombre.length < 4 || nombre.length > 20) {
      mensajesMostrar += "El nombre debe tener entre 4 y 20 caracteres. <br>";
      entrar = true;
    }

    var letraInicial = nombre.charAt(0);
    if (!esMayus(letraInicial)) {
      mensajesMostrar += "La primera letra del nombre debe ser mayúscula. <br>";
      entrar = true;
    }

    if (!validateEmail(correo)) {
      mensajesMostrar += "Ingrese un correo válido. <br>";
      entrar = true;
    }

    if (!validateRut(rut)) {
      mensajesMostrar += "Ingrese un RUT válido. <br>";
      entrar = true;
    }

    if (!validateDireccion(direccion)) {
      mensajesMostrar += "La dirección debe tener entre 10 y 100 caracteres. <br>";
      entrar = true;
    }

    if ((/\d/.test(contra) && isNaN(contra)) == false) {
      mensajesMostrar += "La contraseña debe tener al menos 1 número y 1 letra. <br>";
      entrar = true;
    }

    if (contra.length < 8 || contra.length > 18) {
      mensajesMostrar += "La contraseña debe tener entre 8 y 18 caracteres. <br>";
      entrar = true;
    }

    function tiene_mayus(texto) {
      for (i = 0; i < texto.length; i++) {
        if (letras.indexOf(texto.charAt(i), 0) != -1) {
          return 0;
        }
      }
      return 1;
    }

    if (tiene_mayus(contra)) {
      mensajesMostrar += "La contraseña debe tener al menos una mayúscula. <br>";
      entrar = true;
    }

    if (/\s/.test(contra)) {
      mensajesMostrar += "La contraseña no puede tener espacios en blanco. <br>";
      entrar = true;
    }

    function correlativo(texto) {
      for (i = 0; i < texto.length; i++) {
        if (Number(texto.charAt(i)) + 1 == Number(texto.charAt(i + 1))) {
          return 0;
        }
      }
    }

    if (correlativo(contra) == 0) {
      mensajesMostrar += "La contraseña no puede tener 2 números correlativos. <br>";
      entrar = true;
    }

    if (contra != repContra) {
      mensajesMostrar += "Las contraseñas no coinciden. <br>";
      entrar = true;
    }

    if (entrar) {
      $("#mensaje-error").html(mensajesMostrar).show();
      $("#errorM").hide();
      
    } else {
      $("#mensaje-error").hide();
      $(this).unbind("submit").submit();
    }
  });

  function esMayus(letra) {
    return letra == letra.toUpperCase();
  }

  function validateEmail(email) {
    // Expresión regular para validar el correo electrónico
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
    return emailRegex.test(email);
  }

  function validateRut(rut) {
    // Expresión regular para validar el RUT (formato xxxxxxxx-x)
    var rutRegex = /^\d{7,8}-[kK\d]$/;
    return rutRegex.test(rut);
  }

  function validateDireccion(direccion) {
    // Validar que la dirección tenga entre 10 y 100 caracteres
    return direccion.length >= 10 && direccion.length <= 100;
  }
});