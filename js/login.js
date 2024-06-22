const loginForm = document.getElementById("loginForm");
const inputs = document.querySelectorAll("#loginForm input");

const expresiones = {

  correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  contrasena: /^.{4,12}$/,
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  apellido_paterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  apellido_materno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  telefono: /^\d{10}$/, // 10 numeros.
  // La direccion separada por comas, ejemplo, Municipio, calle, cp
  direccion: /^[a-zA-ZÀ-ÿ\s]{1,40},[a-zA-ZÀ-ÿ\s]{1,40},[a-zA-ZÀ-ÿ\s]{1,40}$/,
};

const campos = {
  correo: false,
  contrasena: false,
  nombre: false,
  apellido_paterno: false,
  apellido_materno: false,
  telefono: false,
  direccion: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "correo":
      validarCampo(expresiones.correo, e.target, "correo");
      break;
    case "contrasena":
      validarCampo(expresiones.contrasena, e.target, "contrasena");
      break;
    case "nombre":
      validarCampo(expresiones.nombre, e.target, "nombre");
      break;
    case "apellido_paterno":
      validarCampo(expresiones.apellido_paterno, e.target, "apellido_paterno");
      break;
    case "apellido_materno":
      validarCampo(expresiones.apellido_materno, e.target, "apellido_materno");
      break;
    case "telefono":
      validarCampo(expresiones.telefono, e.target, "telefono");
      break;
    case "direccion":
      validarCampo(expresiones.direccion, e.target, "direccion");
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
    campos[campo] = true;
  } else {
    input.classList.add("is-invalid");
    input.classList.remove("is-valid");
    campos[campo] = false;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if (
    campos.correo &&
    campos.contrasena &&
    campos.nombre &&
    campos.apellido_paterno &&
    campos.apellido_materno &&
    campos.telefono &&
    campos.direccion
  ) {
    loginForm.submit();
  } else {
    alert("Por favor, rellena el formulario correctamente.");
  }
});
