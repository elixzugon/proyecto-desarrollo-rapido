jQuery(document).ready(function($) {
    $('#primary-menu').slicknav({
        label: '', // Puedes dejar el label vacío o configurarlo según necesites
        prependTo: '.main-navigation'
    });

    $('.menu-toggle').on('click', function() {
        $(this).toggleClass('expanded');
        $('#primary-menu').slideToggle(); // Usa slideToggle para mostrar/ocultar el menú
    });
});
