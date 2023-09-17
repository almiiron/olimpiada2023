function visibleSubmenu(i) {
    var menu = document.querySelectorAll(".menu-vertical");
    if (i == 1) {
        menu[0].classList.add("activo");
    } else if (i == 2) {
        menu[1].classList.add("activo");
    } else if (i == 3) {
        menu[2].classList.add("activo");
    } else if (i == 4) {
        menu[3].classList.add("activo");
    }
}

function invisibleSubmenu(i) {
    var menu = document.querySelectorAll(".menu-vertical");
    if (i == 1) {
        menu[0].classList.remove("activo");
    } else if (i == 2) {
        menu[1].classList.remove("activo");
    } else if (i == 3) {
        menu[2].classList.remove("activo");
    } else if (i == 4) {
        menu[3].classList.remove("activo");
    }
}

function foco(input) {
    // console.log(input);
    input.style.outline = "none";
}
// validaar que solo ingrese letras
function sololetras(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚäëïöüÿÄËÏÖÜŸ"
    especiales = "8-10-13-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        {
            return false;
        }
    }
}
// validar que solo ingrese numeros
function solonumeros(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = " 1234567890"
    especiales = "8-13-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        {
            return false;
        }
    }
}

//validar letras y numeros
function validaambos(e) {
    key = e.keyCode || e.which;
    teclado = String.fromCharCode(key);
    letras = " 1234567890abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚäëïöüÿÄËÏÖÜŸ"
    especiales = "8-10-13-37-38-46-164";
    teclado_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            teclado_especial = true; break;
        }
    }
    if (letras.indexOf(teclado) == -1 && !teclado_especial) {
        {
            return false;
        }
    }
}

// function comprobarChecks(event) {
//     var checkbox = document.getElementsByName('servicio[]');
//     var contador = 0;
//     for (var i = 0; i < checkbox.length; i++) {
//         if (checkbox[i].checked)
//             contador++
//     }
//     if (contador == 0) {
//         alert("Seleccione al menos un servicio");
//         event.preventDefault();
//     }
// }


// function confirmacion(e) {
//     if (confirm("¿Esté seguro que desea eliminar este registro?")) {
//         return true;
//     } else {
//         e.preventDefault();
//     }
// };



function ocultarDiv() {
    var select = document.getElementById("opciones");
    var div1 = document.getElementById("miDiv1");
    var div2 = document.getElementById("miDiv2");
    // var div3 = document.getElementById("miDiv3");
    // var div4 = document.getElementById("miDiv4");


    div1.style.display = "none";
    div2.style.display = "none";

    if (select.value === "1") {
        div1.style.display = "block";
    } else if (select.value === "2") {
        div2.style.display = "block";
    } 
  

}

function mostrarNotas() {
    var notasDiv1 = document.getElementById("notasDiv1");
    var notasDiv2 = document.getElementById("notasDiv2");
  sDiv4 = document.getElementById("notasDiv4");

    notasDiv1.style.display = "none";
    notasDiv2.style.display = "none";
   
    if (select.value === "1") {
        notasDiv1.style.display = "block";
    } else if (select.value === "2") {
        notasDiv2.style.display = "block";
    } 
 

}

document.getElementById('miBoton').addEventListener('click', function() {
    var audio = document.getElementById('miSonido');
    audio.play();
});