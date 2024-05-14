import './bootstrap';

// Ocultar/mostrar los comentarios de una publicación

//Seleccionamos todos los botones que tengan un id que empiece por 'toggleComments-'
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