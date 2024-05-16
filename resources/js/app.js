import './bootstrap';

/**
 * Ver/ocultar los comentarios de una publicación
 */
function toggleComments() {
    //Obtenemos todos los botones que tienen un id que empieza por 'toggleComments-'
    document.querySelectorAll('[id^="toggleComments-"]').forEach(function (toggleButton) {
        //Añadimos un evento 'click' a cada botón
        toggleButton.addEventListener('click', function () {
            //Obtenemos el id de la publicación a la que pertenece el botón
            var postId = this.id.split('-').pop();
            //Obtenemos el div que contiene los comentarios de la publicación
            var commentsDiv = document.getElementById('comments-' + postId);
            //Cambiamos su propiedad 'display' para ocultar/mostrar los comentarios
            commentsDiv.style.display = commentsDiv.style.display === 'none' ? 'block' : 'none';
        });
    });
}

toggleComments();

/**
 * Ver/ocultar el campo password
 *
 * @param {string} fieldId - ID del campo de password
 * @param {string} toggleButtonId - ID del botón que hará la acción
 */
function togglePassword(fieldId, toggleButtonId) {
    // Obtenemos el campo a ver/ocultar y el botón que hará la acción
    const field = document.getElementById(fieldId);
    const toggleButton = document.getElementById(toggleButtonId);

    // Añadimos un evento 'click' al botón
    toggleButton.addEventListener('click', function () {
        // Cambiamos el tipo del campo de password a text y viceversa
        if (field.type === 'password') {
            field.type = 'text';
        } else {
            field.type = 'password';
        }
    });
}

togglePassword('password', 'togglePassword');
togglePassword('password_confirmation', 'toggleConfirmPassword');
