<style>
    .card {
        transition: transform .2s;
        /* Animación para el efecto de hover */
    }

    .card:hover {
        transform: scale(1.05);
        /* Aumenta ligeramente el tamaño de la tarjeta al pasar el ratón */
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .text-muted {
        text-decoration: line-through;
        /* Efecto tachado para el precio anterior */
    }

    .text-price {
        font-weight: bold;
    }

    .left-column {
        width: 20%;
        padding: 20px;
        padding-top: 60px;
        position: -webkit-sticky;
        /* Para compatibilidad con Safari */
        position: sticky;
        top: 0;
        /* Ajusta esto a la altura de cualquier cabecera o menú que tengas */
        height: 100%;
        /* O la altura que quieras que tenga */
    }

    .right-column {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* Esto centrará sus hijos horizontalmente */
        align-self: start;
        /* Añade esta línea para alinear la propia .right-column al inicio de su contenedor flex */
        width: 80%;
        padding: 20px;
        padding-top: 60px;
        min-height: 600px;
        /* Ajusta esto según la altura mínima que desees */
    }

    .content_left_right {
        display: flex;
    }

    #accordionCategorias .card {
        margin-bottom: 0.5rem;
        border: none;
        /* Elimina los bordes si lo deseas */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        /* Sombra suave para dar profundidad */
    }

    #accordionCategorias .card-header {
        padding: 0;
        /* Ajusta el relleno según sea necesario */
        background: #fff;
        /* Fondo blanco o el color que prefieras */
        border-bottom: 1px solid #eaeaea;
        /* Borde suave en la parte inferior */
    }

    #accordionCategorias .btn {
        width: 100%;
        /* Asegúrate de que los botones usen todo el ancho disponible */
        text-align: left;
        /* Alinea el texto a la izquierda */
        padding: 0;
        /* Ajusta el relleno para aumentar la altura de las filas */
        color: #333;
        /* Color de texto */
        background-color: transparent;
        /* Fondo transparente */
        border: none;
        /* Sin bordes */
        border-radius: 0.25rem;
        /* Esquinas ligeramente redondeadas */
    }

    #accordionCategorias .btn:hover,
    #accordionCategorias .btn:focus {
        color: #0056b3;
        /* Cambia el color del texto al pasar el mouse o enfocar */
        text-decoration: none;
        /* Elimina la decoración de subrayado */
        background-color: #f8f9fa;
        /* Fondo ligeramente más oscuro al pasar el mouse o enfocar */
    }

    #accordionCategorias .collapse.show {
        max-height: none;
        /* Asegúrate de que el contenido colapsable pueda expandirse completamente */
    }

    /* Transición suave para el colapso y la expansión */
    #accordionCategorias .collapse {
        transition: max-height 0.4s ease;
        padding-top: 0;
    }

    #accordionCategorias .btn {
        text-transform: capitalize;
        /* Solo la primera letra de cada palabra en mayúsculas */
        font-size: 1rem;
        /* Ajusta al tamaño de fuente deseado */
    }

    /* Esconde la columna izquierda en pantallas pequeñas */
    @media (max-width: 768px) {
        .left-column {
            display: none;
        }

        .right-column {
            width: 100%;
            padding: 0px;
        }
    }

    /* Estilo para el modal que ocupe toda la pantalla */
    .fullscreen-modal .modal-dialog {
        width: 100%;
        max-width: none;
        height: 100%;
        margin: 0;
    }

    .fullscreen-modal .modal-content {
        height: 100%;
        border-radius: 0;
    }

    /* Slide de rango de precions con noUiSlider */
    /* Base del Slider */
    .noUi-target {
        background-color: #B2B2B2;
        height: 10px;
        border-radius: 5px;
    }

    /* Conexión entre las manijas */
    .noUi-connect {
        background-color: <?php echo COLOR_BACKGROUND; ?>;
        /* Tu color de elección para la barra activa */
    }

    /* Manijas del Slider */
    .noUi-handle {
        outline: none;
        top: -5px;
        /* Ajusta esta propiedad para cambiar la posición vertical de la manija */
        border: 1px solid #D3D3D3;
        /* Borde de la manija */
        background-color: white;
        border-radius: 50%;
        width: 19px !important;
        /* Ancho de la manija */
        height: 19px !important;
        /* Altura de la manija */
        box-shadow: none;
        cursor: pointer;
        background-image: none !important;
    }

    .noUi-handle::after,
    .noUi-handle::before {
        content: none !important;
        /* Elimina el contenido de los pseudo-elementos */
    }

    /* Tooltips (los que muestran los valores encima de las manijas) */
    .noUi-tooltip {
        display: none;
        /* Oculta el tooltip por defecto de noUiSlider */
    }

    .caja_categorias {
        padding-top: 20px !important;
        padding-bottom: 40px !important;
        border-radius: 25px;
        -webkit-box-shadow: -2px 5px 5px 0px rgba(0, 0, 0, 0.23);
        -moz-box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        box-shadow: -2px 2px 5px 0px rgba(0, 0, 0, 0.23);
        background-color: white;
        position: relative;
        z-index: 10;
        /* Asegúrate de que esto sea mayor que el z-index de otros elementos */
        display: flex;
        /* Usa flexbox para alinear elementos internos */
        justify-content: flex-start;
        /* Alinea el menú a la izquierda */
        width: 100%;
        /* O el ancho que desees para esta caja */
        box-sizing: border-box;
        /* Asegura que el padding no añada al ancho total */
    }

    .filtro-flotante {
        position: absolute;
        right: 20;
    }

    .btn_filtro {
        font-size: 20px !important;
        background: transparent;
        color: black !important;
        border-radius: 0.5rem !important;
    }

    .row {
        width: 100%;
    }

    .ver-todo-btn {
        background-color: transparent;
        /* Hace que el fondo sea transparente */
        color: #b4b4b4;
        /* Establece el color inicial del texto */
        text-decoration: none;
        /* Elimina el subrayado */
        padding: .375rem .75rem;
        /* Añade algo de padding */
        border: 1px solid white;
        /* Añade un borde si lo deseas */
        border-radius: .25rem;
        /* Redondea las esquinas si lo deseas */
        transition: color .3s;
        /* Suaviza la transición del color */
    }

    .ver-todo-btn:hover {
        color: black;
        /* Cambia el color del texto al pasar el ratón por encima */
        background-color: rgba(255, 255, 255, .3);
        /* Opcional: cambia ligeramente el color de fondo al pasar el ratón por encima */
    }

    /* Estilo sin imagen doble de producto*/
    .image-sin-hover {
        position: relative;
    }

    /* Fin estilo sin imagen doble de producto*/

    /* Estilo imagen doble de producto*/
    .img-container {
        position: relative;
    }

    .img-container .hover-img {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        transition: opacity 0.7s ease-in-out;
        opacity: 0;
        display: block !important;
    }

    .img-container:hover .hover-img {
        opacity: 1;
    }

    .img-container:hover .primary-img {
        opacity: 0;
    }

    /* Fin estilo imagen doble de producto*/
</style>