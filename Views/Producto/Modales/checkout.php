<style>
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
        padding-right: 0;
        /* Remover el espacio a la derecha del ícono si es necesario */
    }

    .form-group .input-group .form-control {
        border: 1px solid #ced4da;
        /* Ajusta al color de borde deseado */
        border-left: none;
        /* Remueve el borde izquierdo donde se unen el ícono y el input */
    }

    /* Ajusta el tamaño y el color del icono según sea necesario */
    .bx {
        font-size: 1.5rem;
        /* Tamaño del icono */
        color: #757575;
        /* Color del icono */
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
</style>


<div id="checkoutModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div id="tituloFormularioPreview">
                    <h4 id="texto_tituloPreview">PAGA AL RECIBIR EN CASA!</h4>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="formulario">
                    <input type="hidden" id="id_productoTmp" name="id_productoTmp">
                    <input type="hidden" id="precio_productoTmp" name="precio_productoTmp">
                    <input type="hidden" id="id_inventario" name="id_inventario">
                    <div id="gracias" class="modal-content">
                        <div id="previewContainer" class="p-3">
                            <div id="resultados" class="modal-body" style="padding: 5px">
                            </div>

                            <div id="tarifasEnvioPreview">
                                <hr />
                                <p id="titulo_tarifaPreview" style="font-weight:bold;">Método de envío</p>
                                <div class="caja_transparente d-flex flex-row">
                                    <label for="envioGratisPreview"> Envío gratis</label>
                                    <label id="gratisPreview" style="width: 60%; text-align: end; font-weight:bold;">Gratis</label>
                                </div>
                                <hr />
                            </div>

                            <!--  código de descuento -->
                            <div class="discount-code-container" id="codigosDescuentoPreview">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Código de descuento" id="etiqueta_descuentoPreview" aria-label="Código de descuento">
                                    <button class="btn btn-dark" id="textoBtn_aplicarPreview" type="button">Aplicar</button>
                                </div>
                                <div class="applied-discount">
                                    <span class="discount-tag">4SALE $4.00</span>
                                </div>
                            </div>
                            <!--  código de descuento -->

                            <!-- Nombre y apellidos -->
                            <div class="form-group mb-3" id="nombresApellidosPreview">
                                <label class="sub_titulos">Nombres y Apellidos</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_nombresApellidosPreview"><i class='bx bxs-user'></i></span>
                                    <input type="text" class="form-control" id="txt_nombresApellidosPreview" name="txt_nombresApellidosPreview" placeholder="Nombre y Apellido">
                                </div>
                            </div>
                            <!-- Fin Nombre y apellidos -->

                            <!-- Teléfono -->
                            <div class="form-group mb-3" id="telefonoPreview">
                                <label class="sub_titulos">Teléfono</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="icono_telefonoPreview"><i class='bx bxs-phone-call'></i></span>
                                    <input type="text" class="form-control" id="txt_telefonoPreview" name="txt_telefonoPreview" placeholder="Teléfono">
                                </div>
                            </div>
                            <!-- Fin Teléfono -->

                            <!-- Calle Principal -->
                            <div class="form-group mb-3" id="calle_principalPreview">
                                <label class="sub_titulos" id="titulo_calle_principalPreview">Calle Principal</label>
                                <input type="text" class="form-control" id="txt_calle_principalPreview" name="txt_calle_principalPreview" placeholder="">
                            </div>
                            <!-- Fin Calle Principal -->

                            <!-- Calle Secundaria -->
                            <div class="form-group mb-3" id="calle_secundariaPreview">
                                <label class="sub_titulos" id="titulo_calle_secundariaPreview">Calle Secundaria</label>
                                <input type="text" class="form-control" id="txt_calle_secundariaPreview" name="txt_calle_secundariaPreview" placeholder="">
                            </div>
                            <!-- Fin Calle Secundaria -->

                            <!-- Barrio o Referencia -->
                            <div class="form-group mb-3" id="barrio_referenciaPreview">
                                <label class="sub_titulos" id="titulo_barrio_referenciaPreview">Barrio o Referencia</label>
                                <input type="text" class="form-control" id="txt_barrio_referenciaPreview" name="txt_barrio_referenciaPreview" placeholder="">
                            </div>
                            <!-- Fin Barrio o Referencia -->

                            <!-- Provincia -->
                            <div class="form-group mb-3" id="provinciaPreview">
                                <label class="sub_titulos" id="titulo_provinciaPreview">Provincia</label>
                                <select class="form-control" id="provinica" name="provinica">
                                    <option value="">Provincia *</option>
                                </select>
                            </div>
                            <!-- Fin Provincia -->

                            <!-- Ciudad -->
                            <div class="form-group mb-3" id="ciudadPreview">
                                <label class="sub_titulos" id="titulo_ciudadPreview">Ciudad</label>
                                <div id="div_ciudad">
                                    <select class="form-control" id="ciudad_entrega" name="ciudad_entrega">
                                        <option value="">Ciudad *</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Fin Ciudad -->

                            <!-- Comentario -->
                            <div class="form-group mb-3" id="comentarioPreview">
                                <label class="sub_titulos" id="titulo_comentarioPreview">Comentario</label>
                                <input type="text" class="form-control" id="txt_comentarioPreview" name="txt_comentarioPreview" placeholder="">
                            </div>
                            <!-- Fin Comentario -->
                        </div>

                        <div class="modal-footer">
                            <!-- Botón Comprar -->
                            <div id="btn_comprarPreview" class="d-flex justify-content-center" style="padding: 20px;">
                                <button class="btn btn-dark" id="textoBtn_comprarPreview" type="button" onclick="realizar_pedido()">COMPRAR AHORA</button>
                            </div>
                            <!-- Fin Botón Comprar -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Funcion para que consuma los datos de checkout.json y los utilice

    document.addEventListener('DOMContentLoaded', function() {
        loadAndSetInitialData();
    });

    function loadAndSetInitialData() {
        id_plataforma = <?php echo ID_PLATAFORMA; ?>

        $.getJSON(SERVERURL + 'Models/modales/' + id_plataforma + '_modal.json', function(data) {
            data.forEach(item => {
                processItem(item);
            });
        }).fail(handleLoadingError);
    }

    function processItem(item) {
        Object.keys(item.content).forEach(key => {
            updateFieldAndPreview(key, item.content[key], item.id_elemento);
        });
        toggleVisibility(item.estado, item.id_elemento);
        reorderElements(item.id_elemento, item.posicion);
    }

    function updateFieldAndPreview(key, value, id_elemento) {
        const field = $('#' + key);
        const previewField = $('#' + key + 'Preview');

        // Aplicar valor al campo y disparar evento change para asegurar cualquier lógica de UI
        updateFieldValue(field, value);

        // Específico para animaciones y colores
        if (key === 'animacionBtn_comprar') {
            const btnPreview = $('#textoBtn_comprarPreview');
            btnPreview.removeClass('bounce shake pulse');
            btnPreview.addClass(value);
        } else if (key.startsWith('color')) {
            // Asegurarse de que se actualice el color directamente en la vista previa adecuadamente
            applyColor(key, value, previewField);
        } else if (key.includes('txt_')) {
            previewField.attr('placeholder', value);
        } else if (key.includes('icono')) {
            previewField.html("<i class='" + value + "'></i>");
        } else {
            previewField.text(value);
        }
    }

    function applyColor(key, value, previewField) {
        if (key === 'colorBtn_comprar') {
            // Aplicar el color directamente al botón de compra en la vista previa
            $('#textoBtn_comprarPreview').css('background-color', value);
        } else if (key === 'colorTxt_titulo') {
            $('#texto_tituloPreview').css('color', value);
        } else {
            // Aplica color general si es necesario a otros elementos
            previewField.css('color', value);
        }
    }

    function updateFieldValue(field, value) {
        if (field.is(':checkbox')) {
            field.prop('checked', value === 'on');
        } else {
            field.val(value).change(); // Trigger change for preview updates
        }
    }

    function updatePreviewField(key, previewField, value) {
        if (!previewField.length) {
            console.warn('No preview field found for', key);
            return;
        }

        if (key.includes('txt_')) {
            previewField.attr('placeholder', value);
        } else if (key.includes('icono')) {
            previewField.html("<i class='" + value + "'></i>");
        } else {
            previewField.text(value);
        }
    }

    function toggleVisibility(state, id_elemento) {
        const preview = $('#' + id_elemento + 'Preview');
        const toggleButton = $('#' + id_elemento).find('.toggle-visibility i');

        // Actualiza la visibilidad del elemento
        if (state === '0') {
            preview.hide();
            toggleButton.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            preview.show();
            toggleButton.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }

    function reorderElements(id_elemento, position) {
        const element = $('#' + id_elemento);
        const preview = $('#' + id_elemento + 'Preview');
        reorderElement(element, position, '.list-group');
        reorderElement(preview, position, '#previewContainer');
    }

    function reorderElement(element, position, containerSelector) {
        if (element.index() !== position) {
            element.detach();
            position === 0 ? $(containerSelector).prepend(element) : $(containerSelector).children().eq(position - 1).after(element);
        }
    }

    function updateTextAlignment(value) {
        const textAlign = value === '1' ? 'left' : value === '2' ? 'center' : 'right';
        $('#tituloFormularioPreview').css('text-align', textAlign);
    }

    function updateColor(key, value) {
        if (key === 'colorTxt_titulo') {
            $('#texto_tituloPreview').css('color', value);
        } else if (key === 'colorBtn_aplicar') {
            $('#textoBtn_aplicarPreview').css('background-color', value);
        } else if (key === 'colorBtn_comprar') {
            $('#textoBtn_comprarPreview').css('background-color', value);
        }
    }

    function handleLoadingError(jqXHR, textStatus, errorThrown) {
        console.error('Error loading JSON:', textStatus, errorThrown);
    }

    /* boton de comprar */
    function realizar_pedido() {
        let formData = new FormData();
        formData.append("id_plataforma", ID_PLATAFORMA);
        formData.append("id_inventario", $('#id_inventario').val());
        formData.append("id_producto", $('#id_productoTmp').val());
        formData.append("precio_producto", $('#precio_productoTmp').val());
        formData.append("nombre", $('#txt_nombresApellidosPreview').val());
        formData.append("telefono", $('#txt_telefonoPreview').val());
        formData.append("provincia", $('#provinica').val());
        formData.append("ciudad", $('#ciudad_entrega').val());
        formData.append("calle_principal", $('#txt_calle_principalPreview').val());
        formData.append("calle_secundaria", $('#txt_calle_secundariaPreview').val());
        formData.append("referencia", $('#txt_barrio_referenciaPreview').val());
        formData.append("observacion", $('#txt_comentarioPreview').val());

        $.ajax({
            url: SERVERURL + 'Tienda/guardar_pedido',
            method: 'POST',
            data: formData,
            processData: false, // No procesar los datos
            contentType: false, // No establecer ningún tipo de contenido
            success: function(response) {
                response = JSON.parse(response);
                if (response.status == 400) {
                    toastr.error(
                        "NO SE REALIZO LA PETICION  CORRECTAMENTE",
                        "NOTIFICACIÓN", {
                            positionClass: "toast-bottom-center"
                        }
                    );
                } else if (response.status == 200) {
                    toastr.success("SE REALIZO LA PETICION CORRECTAMENTE", "NOTIFICACIÓN", {
                        positionClass: "toast-bottom-center",
                    });

                    $('#checkoutModal').modal('hide');
                }
            },
            error: function(error) {
                console.error('Error al solicitar el pago:', error);
                alert('Hubo un error al solicitar el pago.');
            }
        });
    }
    /* Fin boton de comprar */
</script>