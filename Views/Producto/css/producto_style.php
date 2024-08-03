<style>
  #main-image {
    /* Añade una sombra o borde si es necesario */
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    border-radius: 1rem;
    /* Ejemplo de sombra */
  }

  .iconos_producto {
    display: flex;
    flex-direction: row;
  }

  @media (max-width: 480px) {
    .iconos_producto {
      flex-direction: column;
    }
  }

  .list-group-item {
    background-color: transparent;
    /* Esto hará que el fondo sea transparente */
    border: none;
    /* Esto elimina el borde si lo hay */
  }

  .list-group-item img {
    opacity: 0.6;
    /* Esto hará que las miniaturas no seleccionadas sean un poco transparentes */
  }

  .list-group-item.active img {
    opacity: 1;
    /* Esto hará que la miniatura seleccionada sea completamente opaca */
    border: 2px solid grey;
    /* Esto añadirá un borde gris alrededor de la miniatura seleccionada */
  }

  .list-group-item {
    background-color: white !important;
    /* Esto hará que el fondo sea transparente */
    border-color: white !important;
    /* Esto elimina el borde si lo hay */
  }

  #list-tab .list-group-item img.img-thumbnail {
    width: 150px;
    /* El ancho deseado para las miniaturas */
    height: 65px;
    /* Para mantener la proporción de aspecto */
  }

  /* Estilos para miniaturas */
  .list-group-item img.img-thumbnail {
    width: 100px;
    /* Ancho que desees para las miniaturas */
    height: 100px;
    /* Altura que desees para las miniaturas */
    object-fit: cover;
    /* cover recortará la imagen para ajustarla al tamaño */
  }

  /* Estilos para imagen principal */
  #main-image {
    width: 500px;
    /* Ancho que desees para la imagen principal */
    height: 500px;
    /* Altura que desees para la imagen principal */
    object-fit: cover;
    /* contain asegurará que la imagen se ajuste dentro de este espacio sin recortarse */
    cursor: pointer;
  }


  @media (max-width: 768px) {

    /* Estilos para imagen principal */
    #main-image {
      width: 300px;
      /* Ancho que desees para la imagen principal */
      height: 300px;
      /* Altura que desees para la imagen principal */
      object-fit: cover;
      /* contain asegurará que la imagen se ajuste dentro de este espacio sin recortarse */
    }
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
  }

  .left-column {
    width: 50%;
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
    width: 50%;
    padding: 20px;
    padding-top: 60px;
  }

  .product-image {
    max-width: 100%;
  }

  .product-price {
    font-size: 28px;
    color: #333;
  }

  .product-title {
    font-size: 24px;
  }

  .color-options {
    list-style: none;
    padding: 0;
  }

  .color-option {
    display: inline-block;
    width: 24px;
    height: 24px;
    margin-right: 10px;
  }

  .color-option input[type="radio"] {
    display: none;
  }

  .color-option label {
    display: block;
    width: 100%;
    height: 100%;
    border: 1px solid #ccc;
    cursor: pointer;
  }

  .color-option input[type="radio"]:checked+label {
    border: 2px solid blue;
  }

  .iframe-container {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%;
    /* Aspect ratio 16:9 */
    height: 0;
  }

  .iframe-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  .button {
    background-color: red;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
  }

  @keyframes jump {
    0% {
      transform: translateY(0);
      /* Sin desplazamiento vertical */
    }

    50% {
      transform: translateY(-5px);
      /* Desplazamiento hacia arriba */
    }

    100% {
      transform: translateY(0);
      /* Volver a la posición original */
    }
  }

  /* Aplicar la animación al botón */
  .jump-button {
    animation: jump 3s ease infinite;
    /* Animación llamada 'jump' que dura 3 segundos y se repite infinitamente */
  }

  .content_left_right {
    display: flex;
  }

  .ahorra {
    font-size: 20px;
  }

  /* Añade más estilos según sea necesario */

  /* Para dispositivos con un ancho de 768px o menos */
  .precios_producto {
    display: flex;
    flex-direction: row;
  }

  @media (max-width: 768px) {
    .content_left_right {
      display: flex;
      flex-direction: column;
      max-width: 100%;
      margin: 0 auto;
    }

    .left-column,
    .right-column {
      width: 100% !important;
      padding: 10px !important;
    }

    .precios_producto {
      flex-direction: column;
    }

    .ahorra {
      font-size: 15px;
    }

    .container {
      flex-direction: column;
    }

    #navbarLogo {
      height: 60px;
      width: 60px;
    }

    .container {
      align-items: flex-end !important;
    }

    .navbar-brand_1 {
      top: 0;
      padding-left: 20px;
    }

    .left-column {
      position: static !important;
      /* Para compatibilidad con Safari */
    }

    .list-group {
      flex-direction: row !important;
      padding-top: 10px;
    }

    /* Otros ajustes responsivos */
  }

  /* Para dispositivos con un ancho de 480px o menos */
  @media (max-width: 480px) {
    .navbar-brand img {
      height: 50px;
      width: 50px;
    }

    /* Ajustes adicionales para dispositivos más pequeños */
  }

  /* checkout */
  .left-column {
    width: 50%;
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
    width: 50%;
    padding: 20px;
    padding-top: 60px;
  }

  /* Seccion Hidden */
  .list-group-item {
    display: flex;
    flex-direction: column;
    /* Asegura que el contenido fluya de arriba hacia abajo */
  }

  .edit-section {
    width: 100%;
    /* Ocupa todo el ancho disponible */
    /* Otros estilos que desees aplicar */
  }

  .hidden {
    display: none;
    /* Oculta la sección */
  }

  /* Este estilo se aplica cuando se muestra la sección */
  .edit-section:not(.hidden) {
    display: block;
    /* O 'flex' si necesitas más control sobre el contenido interior */
  }

  .caja_transparente {
    border-radius: 0.5rem;
    border: 1px solid #ccc;
    padding: 10px;
  }

  .caja_variable {
    padding-top: 10px;
    padding-right: 10px !important;
    padding-left: 10px !important;
    border-radius: 0.5rem;
    background-color: #dedbdb;
  }

  .caja_oferta {
    padding: 10px;
    border-radius: 0.5rem;
    background-color: rgba(0, 164, 251, 0.5);
    /* 50% de opacidad */
  }

  .discount-code-container {
    max-width: 300px;
    /* O el ancho que prefieras */
    padding-top: 10px;
  }

  .applied-discount {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 10px;
    padding: 5px 10px;
    background: #f2f2f2;
    /* Fondo gris claro para destacar */
    border-radius: 5px;
  }

  .discount-tag {
    font-weight: bold;
  }

  .close {
    font-size: 20px;
    color: #000;
    opacity: 0.6;
  }

  .close:hover {
    opacity: 1;
  }

  .sub_titulos {
    font-size: 17px;
    font-weight: 700;
  }

  hr {
    border: none;
    /* Quita el borde predeterminado */
    height: 2px;
    /* Ajusta el grosor de la línea */
    background-color: #000;
    /* Ajusta el color de la línea */
    margin: 15px 0;
    /* Ajusta el espaciado vertical de la línea */
  }

  .input-group-text {
    background: transparent;
    padding-right: 10px;
    /* Ajusta el espacio a la derecha del ícono si es necesario */
    border: 1px solid #ced4da;
    /* Ajusta al color de borde deseado */
    border-right: none;
    /* Remueve el borde derecho del span */
    border-radius: 0.25rem 0 0 0.25rem;
    /* Ajusta el radio del borde */
    height: 100%;
  }

  .form-group .input-group .form-control {
    border: 1px solid #ced4da;
    /* Ajusta al color de borde deseado */
    border-left: none;
    /* Remueve el borde izquierdo donde se unen el ícono y el input */
    border-radius: 0 0.25rem 0.25rem 0;
    /* Ajusta el radio del borde */
    padding-left: 10px;
    /* Ajusta el espacio a la izquierda del texto */
  }

  .icon-btn.active i {
    color: white;
    /* O puedes usar #FFFFFF */
  }

  .form-group {
    margin: 0 !important;
  }

  .btn_comprar {
    border-radius: 0.5rem;
    padding: 10px;
  }

  /* CSS para tachar codigo de descuentro*/
  #codigosDescuento_temporal .d-flex {
    text-decoration: line-through;
    color: red;
    /* Cambia el color del texto a rojo */
  }

  #codigosDescuento_temporal button {
    pointer-events: none;
    /* Desactiva los eventos del ratón, haciendo los botones no clickeables */
    opacity: 0.5;
    /* Cambia la opacidad para mostrar que están desactivados */
  }

  /* animaciones del boton comprar */
  /* Animación Bounce */
  .bounce {
    animation: bounce 1.2s ease-in-out infinite;
  }

  @keyframes bounce {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  /* Animación Shake */
  .shake {
    animation: shake 6s linear infinite;
  }

  @keyframes shake {

    0%,
    100% {
      transform: translateX(0);
    }

    10%,
    20%,
    30%,
    40%,
    50%,
    60%,
    70%,
    80%,
    90% {
      transform: translateX(5px);
    }

    15%,
    25%,
    35%,
    45%,
    55%,
    65%,
    75%,
    85%,
    95% {
      transform: translateX(-5px);
    }
  }

  /* Animación Pulse */
  .pulse {
    animation: pulse 1s ease-in-out infinite;
  }

  @keyframes pulse {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.1);
    }

    100% {
      transform: scale(1);
    }
  }

  /* fin checkout */

  #landing img {
    width: 100%;
    /* La imagen ocupará el 100% del ancho del contenedor */
    max-width: 100%;
    /* No excederá el ancho del contenedor */
    height: auto;
    /* Mantiene la relación de aspecto original */
    display: block;
    /* Elimina el espacio blanco adicional */
    margin: 0 auto;
    /* Centra la imagen si es más pequeña que el contenedor */
    object-fit: cover;
    /* Ajusta la imagen para cubrir el contenedor, manteniendo el aspecto */
    border-radius: 8px;
    /* Opcional: bordes redondeados para mejorar la estética */
  }
</style>