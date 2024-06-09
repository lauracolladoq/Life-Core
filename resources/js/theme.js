
//Funcionamiento de Theme Costumize para personalizar la página en cuanto a color, tamaño de texto y tema (claro y oscuro)

/* --------------- Tamaño de la Fuente --------------- */
let fontSizes = document.querySelectorAll(".choose-size span");

// Eliminación de clase "active" en todos los elementos de tamaño de fuente
const removeActiveSelector = () => {
    fontSizes.forEach((size) => {
        size.classList.remove("active");
    });
};

// Añadir listener a cada elemento de tamaño de fuente cuando se hace click
fontSizes.forEach((size) => {
    size.addEventListener("click", () => {
        let fontSizeValue;
        // Elimino la clase "active"
        removeActiveSelector();
        // La añado al elemento seleccionado
        size.classList.add("active");

        // Asignación de tamaño de fuente según el elemento seleccionado
        if (size.classList.contains("font-size-1")) {
            fontSizeValue = "10px";
        } else if (size.classList.contains("font-size-2")) {
            fontSizeValue = "13px";
        } else if (size.classList.contains("font-size-3")) {
            fontSizeValue = "16px";
        } else if (size.classList.contains("font-size-4")) {
            fontSizeValue = "19px";
        }

        // Se aplica en el HTML
        document.querySelector("html").style.fontSize = fontSizeValue;
    });
});

/* --------------- Color primario --------------- */
let colorPallette = document.querySelectorAll(".choose-color span");
var root = document.querySelector(":root");

// Eliminación de clase "active" en todos los elementos de de color primario
const removeActiveColor = () => {
    colorPallette.forEach((color) => {
        color.classList.remove("active");
    });
};

// Añadir listener a cada elemento de color primario cuando se hace click
colorPallette.forEach((color) => {
    color.addEventListener("click", () => {
        let primaryHue;

        // Elimino la clase "active"
        removeActiveColor();
        // La añado al elemento seleccionado
        color.classList.add("active");

        // Asignación de color primario según el elemento seleccionado
        if (color.classList.contains("color-1")) {
            primaryHue = 0;
        } else if (color.classList.contains("color-2")) {
            primaryHue = 25;
        } else if (color.classList.contains("color-3")) {
            primaryHue = 60;
        } else if (color.classList.contains("color-4")) {
            primaryHue = 120;
        } else if (color.classList.contains("color-5")) {
            primaryHue = 200;
        } else if (color.classList.contains("color-6")) {
            primaryHue = 268;
        } else if (color.classList.contains("color-7")) {
            primaryHue = 317;
        } else if (color.classList.contains("color-8")) {
            primaryHue = 347;
        }

        // Se aplica en el HTML
        root.style.setProperty("--primary-color-hue", primaryHue);
    });
});

/* --------------- Background --------------- */

let bg1 = document.querySelector(".bg1");
let bg2 = document.querySelector(".bg2");

let lightColorLightTheme;
let whiteColorLightTheme;
let darkColorLightTheme;

// Función para cambiar el fondo y los colores de tema
const changeBg = () => {
    root.style.setProperty("--color-dark-light-theme", darkColorLightTheme);
    root.style.setProperty("--color-light-light-theme", lightColorLightTheme);
    root.style.setProperty("--color-white-light-theme", whiteColorLightTheme);
};

// Al seleccionar el modo oscuro, se cambian los colores y se activa la clase "active"
bg2.addEventListener("click", () => {
    darkColorLightTheme = "95%";
    lightColorLightTheme = "5%";
    whiteColorLightTheme = "10%";

    bg2.classList.add("active");
    bg1.classList.remove("active");

    changeBg();
});

// Al seleccionar el modo claro, se recarga la página y se restablecen los valores predeterminados
bg1.addEventListener("click", () => {
    bg1.classList.add("active");
    bg2.classList.remove("active");

    window.location.reload();
});

// Cambio del color de los iconos del nav
let menuItemImg = document.querySelectorAll(".menu-item span img");

const icon = () => {
    const menuItems = document.querySelectorAll(".menu-item");

    menuItems.forEach((item) => {
        const icon = item.querySelector("span img");
        if (icon) {
            icon.classList.add("icon-bg");
        }
    });
};

//icon();