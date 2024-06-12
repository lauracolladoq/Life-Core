/**
 * Modificar el tema de la aplicación
 */
function changeTheme() {
    // Obtener los elementos de la lista de los tamaños de fuente
    let fontSizes = document.querySelectorAll(".choose-size span");

    // Remover la clase 'active' de los elementos de la lista
    const removeActiveSelector = () => {
        fontSizes.forEach((size) => {
            size.classList.remove("active");
        });
    };

    // Obtenemos el tamaño de fuente seleccionado y lo aplicamos
    fontSizes.forEach((size) => {
        size.addEventListener("click", () => {
            let fontSizeValue;
            removeActiveSelector();
            size.classList.add("active");

            if (size.classList.contains("font-size-1")) {
                fontSizeValue = "10px";
            } else if (size.classList.contains("font-size-2")) {
                fontSizeValue = "13px";
            } else if (size.classList.contains("font-size-3")) {
                fontSizeValue = "16px";
            } else if (size.classList.contains("font-size-4")) {
                fontSizeValue = "19px";
            }

            document.querySelector("html").style.fontSize = fontSizeValue;
            localStorage.setItem("fontSize", fontSizeValue);
        });
    });

    // Obtenemos los elementos de la lista de la paleta de colores
    let colorPallette = document.querySelectorAll(".choose-color span");
    var root = document.querySelector(":root");

    // Remover la clase 'active' de los elementos de la lista
    const removeActiveColor = () => {
        colorPallette.forEach((color) => {
            color.classList.remove("active");
        });
    };

    // Obtenemos el color seleccionado y lo aplicamos
    colorPallette.forEach((color) => {
        color.addEventListener("click", () => {
            let primaryHue;

            removeActiveColor();
            color.classList.add("active");

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

            root.style.setProperty("--primary-color-hue", primaryHue);
            localStorage.setItem("primaryColorHue", primaryHue);
        });
    });

    // Obtenemos los elementos de la lista de los temas
    let bg1 = document.querySelector(".bg1");
    let bg2 = document.querySelector(".bg2");

    // Variables para los colores de los temas
    let lightColorLightTheme;
    let whiteColorLightTheme;
    let darkColorLightTheme;

    // Cambiar el tema de la aplicación a oscuro
    bg2.addEventListener("click", () => {
        darkColorLightTheme = "95%";
        lightColorLightTheme = "5%";
        whiteColorLightTheme = "10%";

        bg2.classList.add("active");
        bg1.classList.remove("active");

        root.style.setProperty("--color-dark-light-theme", darkColorLightTheme);
        root.style.setProperty("--color-light-light-theme", lightColorLightTheme);
        root.style.setProperty("--color-white-light-theme", whiteColorLightTheme);
        icon("dark");
        localStorage.setItem("theme", "dark");
    });

    // Cambiar el tema de la aplicación a claro
    bg1.addEventListener("click", () => {
        darkColorLightTheme = "15%";
        lightColorLightTheme = "97%";
        whiteColorLightTheme = "100%";

        bg1.classList.add("active");
        bg2.classList.remove("active");

        root.style.setProperty("--color-dark-light-theme", darkColorLightTheme);
        root.style.setProperty("--color-light-light-theme", lightColorLightTheme);
        root.style.setProperty("--color-white-light-theme", whiteColorLightTheme);
        icon("light");
        localStorage.setItem("theme", "light");
    });

    // Cambiar el color de fondo de los iconos del menú
    let menuItemImg = document.querySelectorAll(".menu-item span img");
    
    //Si el tema es oscuro, se agrega la clase 'icon-bg' a los iconos, si no, se remueve
    const icon = (theme) => {
        const menuItems = document.querySelectorAll(".menu-item");

        menuItems.forEach((item) => {
            const icon = item.querySelector("span img");
            if (icon) {
                if (theme === "dark") {
                    icon.classList.add("icon-bg");
                } else if (theme === "light") {
                    icon.classList.remove("icon-bg");
                }
            }
        });
    };

    // Aplicar los cambios almacenados en localStorage al cargar la página
    const applyStoredSettings = () => {
        const storedFontSize = localStorage.getItem("fontSize");
        if (storedFontSize) {
            document.querySelector("html").style.fontSize = storedFontSize;
            fontSizes.forEach((size) => {
                size.classList.remove("active");
                if (size.style.fontSize === storedFontSize) {
                    size.classList.add("active");
                }
            });
        }

        const storedPrimaryColorHue = localStorage.getItem("primaryColorHue");
        if (storedPrimaryColorHue) {
            root.style.setProperty("--primary-color-hue", storedPrimaryColorHue);
            colorPallette.forEach((color) => {
                color.classList.remove("active");
                if (parseInt(color.dataset.hue) === parseInt(storedPrimaryColorHue)) {
                    color.classList.add("active");
                }
            });
        }

        const storedTheme = localStorage.getItem("theme");
        if (storedTheme) {
            if (storedTheme === "dark") {
                bg2.click();
            } else {
                bg1.click();
            }
        }
    };

    applyStoredSettings();
}

changeTheme();
