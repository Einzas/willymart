<?php include 'Views/templates/header.php'; ?>
<?php include 'Views/Categoria/css/categoria_style.php'; ?>
<?php require_once './Views/Producto/Modales/checkout.php'; ?>

<main>
    <!-- área de categorías -->
    <div class="container-fluid mt-4">
        <h1 style="text-align: center">Categorías</h1>
        <br>
        <div class="content_left_right">
            <!-- Modal -->
            <div class="modal fade" id="leftColumnModal" tabindex="-1" aria-labelledby="leftColumnModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <!-- Cabeza del modal con el botón de cerrar -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="leftColumnModalLabel">Filtros</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Contenido del modal -->
                        <div class="modal-body">
                            <!-- Aquí incluyes el contenido de tu left-column -->
                            <div class="filtro_productos caja px-3">
                                <!-- Acordeón -->
                                <div class="accordion" id="accordionCategoriasModal">
                                    <!-- Este es el acordeón padre para la categoría principal -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingCategoriasModal">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoriasModal" aria-expanded="true" aria-controls="collapseCategoriasModal">
                                                <strong>Categorías</strong>
                                            </button>
                                        </h2>
                                        <div id="collapseCategoriasModal" class="accordion-collapse collapse show" aria-labelledby="headingCategoriasModal" data-bs-parent="#accordionCategoriasModal">
                                            <div class="accordion-body">
                                                <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                                <div class="accordion" id="accordionSubcategoriasModal"></div>
                                                <!-- Fin del acordeón anidado para las subcategorías -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Acordeón -->

                                <div>
                                    <form id="form-rango-precios-modal" method="post">
                                        <div class="filter-header"><strong>Rango de precios</strong></div>
                                        <div id="slider-rango-precios-modal"></div>
                                        <p>Valor mínimo: $<span id="valorMinimo-modal">0</span></p>
                                        <p>Valor máximo: $<span id="valorMaximo-modal">0</span></p>
                                        <input type="hidden" id="inputValorMinimo-modal" name="valorMinimo" value="0">
                                        <input type="hidden" id="inputValorMaximo-modal" name="valorMaximo" value="0">
                                        <button type="submit" class="btn-filter">Filtrar</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Modal -->

            <div class="left-column d-none d-lg-block">
                <div class="filtro_productos caja px-3">
                    <!-- Acordeón -->
                    <div class="accordion" id="accordionCategorias">
                        <!-- Este es el acordeón padre para la categoría principal -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingCategorias">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategorias" aria-expanded="true" aria-controls="collapseCategorias">
                                    <strong>Categorías</strong>
                                </button>
                            </h2>
                            <div id="collapseCategorias" class="accordion-collapse collapse show" aria-labelledby="headingCategorias" data-bs-parent="#accordionCategorias">
                                <div class="accordion-body">
                                    <!-- Aquí comienza el acordeón anidado para las subcategorías -->
                                    <div class="accordion" id="accordionSubcategorias"></div>
                                    <!-- Fin del acordeón anidado para las subcategorías -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Acordeón -->

                    <div>
                        <form id="form-rango-precios-left" method="post">
                            <div class="filter-header"><strong>Rango de precios</strong></div>
                            <div id="slider-rango-precios-left"></div>
                            <p>Valor mínimo: $<span id="valorMinimo-left">0</span></p>
                            <p>Valor máximo: $<span id="valorMaximo-left">0</span></p>
                            <input type="hidden" id="inputValorMinimo-left" name="valorMinimo" value="0">
                            <input type="hidden" id="inputValorMaximo-left" name="valorMaximo" value="0">
                            <button type="submit" class="btn-filter">Filtrar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="right-column">
                <div class="caja_categorias">
                    <form id="ordenarForm" method="post">
                        <!-- <div class="custom-select-wrapper" onclick="this.querySelector('.custom-select').classList.toggle('open');">
                            <div class="custom-select">
                                <div class="custom-select-trigger">Ordenar por</div>
                                <div class="custom-options">
                                    <button type="submit" class="option" name="ordenar_por" value="Mayor precio">Mayor precio</button>
                                    <button type="submit" class="option" name="ordenar_por" value="Menor precio">Menor precio</button>
                                </div>
                            </div>
                        </div> -->
                        <!-- Campos ocultos para mantener los valores de rango de precios -->
                        <input type="hidden" name="valorMinimo" id="hiddenValorMinimo">
                        <input type="hidden" name="valorMaximo" id="hiddenValorMaximo">
                    </form>
                    <!-- Botón que se muestra solo en pantallas pequeñas -->
                    <div class="d-lg-none filtro-flotante">
                        <button type="button" class="btn_filtro btn" data-bs-toggle="modal" data-bs-target="#leftColumnModal">
                            <i class='bx bxs-filter-alt'></i> Filtro
                        </button>
                    </div>
                </div>
                <div class="row" id="productosContainer" style="padding-top: 15px;">
                    <!-- Productos filtrados se mostrarán aquí -->
                </div>
            </div>
        </div>
    </div>
    <!-- Fin área de categorías -->
</main>

<script>
    // Define la función filtrarPorCategoria globalmente
    function filtrarPorCategoria(idCategoria) {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const idPlataforma = ID_PLATAFORMA;

        const formData = new FormData();
        formData.append('id_plataforma', idPlataforma);
        formData.append('id_categoria', idCategoria);
        formData.append('precio_minimo', valorMinimo);
        formData.append('precio_maximo', valorMaximo);
        formData.append('ordenar_por', ordenarPor);

        fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mostrarProductos(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Función para mostrar todos los productos
    function verTodasCategorias() {
        const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
        const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
        const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
        const idPlataforma = ID_PLATAFORMA;

        const formData = new FormData();
        formData.append('id_plataforma', idPlataforma);
        formData.append('id_categoria', "");
        formData.append('precio_minimo', valorMinimo);
        formData.append('precio_maximo', valorMaximo);
        formData.append('ordenar_por', ordenarPor);

        fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                mostrarProductos(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Función para mostrar productos
    function mostrarProductos(productos) {
        const productosContainer = document.getElementById('productosContainer');
        productosContainer.innerHTML = '';

        if (!Array.isArray(productos)) {
            console.error('Productos no es un array:', productos);
            return;
        }

        productos.forEach(producto => {
            const precioEspecial = parseFloat(producto.pvp_tienda);
            const precioNormal = parseFloat(producto.pref_tienda);

            const image_path = obtenerURLImagen(producto.imagen_principal_tienda);
            const productoHtml = `
                    <div class="col-6 col-md-4 col-lg-3 mb-3">
                        <div class="card h-100" style="border-radius: 15px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
                            <a href="producto?id=${producto.id_producto_tienda}" class="category-link">
                                <div class="img-container d-flex" style="aspect-ratio: 1 / 1; overflow: hidden; justify-content: center; align-items: center;">
                                    <img src="${image_path}" class="card-img-top primary-img" alt="${producto.nombre_producto_tienda}" style="object-fit: cover; width: 80%; height: 80%;">
                                </div>
                            </a>
                            <div class="card-body d-flex flex-column">
                                <a href="producto?id=${producto.id_producto_tienda}" style="text-decoration: none; color:black;">
                                    <h6 class="card-title titulo_producto">${producto.nombre_producto_tienda}</h6>
                                </a>
                                <div class="product-footer mb-2">
                                    <span class="text-muted">${precioNormal.toFixed(2)}</span>
                                    <span class="text-price texto_precio">$${precioEspecial.toFixed(2)}</span>
                                </div>
                                <a class="btn texto_boton mt-auto" href="#" onclick="agregar_tmp(${producto.id_producto_tienda}, ${precioEspecial}, ${producto.id_inventario})" data-bs-toggle="modal" data-bs-target="#exampleModal">Comprar</a>
                            </div>
                        </div>
                    </div>
                `;
            productosContainer.innerHTML += productoHtml;
        });
    }

    // Función para obtener URL de la imagen
    function obtenerURLImagen(imagePath) {
        if (imagePath) {
            if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
                return imagePath;
            } else {
                return `${SERVERURL}${imagePath}`;
            }
        } else {
            console.error("imagePath es null o undefined");
            return null;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Inicializa los sliders
        initSlider('slider-rango-precios-left', 'valorMinimo-left', 'valorMaximo-left', 'inputValorMinimo-left', 'inputValorMaximo-left', actualizarProductos);
        initSlider('slider-rango-precios-modal', 'valorMinimo-modal', 'valorMaximo-modal', 'inputValorMinimo-modal', 'inputValorMaximo-modal', actualizarProductos);

        // Obtén las instancias de noUiSlider para cada slider
        const sliderLeft = document.getElementById('slider-rango-precios-left').noUiSlider;
        const sliderModal = document.getElementById('slider-rango-precios-modal').noUiSlider;

        // Función para sincronizar los sliders
        function sincronizarSliders(sourceSlider, targetSlider) {
            sourceSlider.on('update', function(values) {
                const targetValues = targetSlider.get().map(v => parseFloat(v));
                if (values[0] != targetValues[0] || values[1] != targetValues[1]) {
                    targetSlider.set(values);
                }
            });
        }

        // Sincroniza los sliders entre sí
        sincronizarSliders(sliderLeft, sliderModal);
        sincronizarSliders(sliderModal, sliderLeft);

        // Carga las categorías dinámicamente
        cargarCategorias();

        // Verifica si hay un ID de categoría en la URL y actualiza los productos si lo hay
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('id_cat')) {
            const idCategoria = urlParams.get('id_cat');
            filtrarPorCategoria(idCategoria);
        }

        // Evento scroll para navbar
        window.onscroll = function() {
            var nav = document.getElementById('navbarId');
            var logo = document.getElementById("navbarLogo");
            logo.style.maxHeight = "60px";
            logo.style.maxWidth = "60px";
            if (window.pageYOffset > 100) {
                nav.style.height = "70px";
            } else {
                nav.style.height = "100px";
                logo.style.maxHeight = "100px";
                logo.style.maxWidth = "100px";
            }
        };

        // Form submit handlers
        document.getElementById('form-rango-precios-left').addEventListener('submit', function(event) {
            event.preventDefault();
            actualizarProductos();
        });

        document.getElementById('form-rango-precios-modal').addEventListener('submit', function(event) {
            event.preventDefault();
            actualizarProductos();
        });

        document.getElementById('ordenarForm').addEventListener('submit', function(event) {
            event.preventDefault();
            actualizarProductos();
        });

        // Función para cargar categorías dinámicamente
        function cargarCategorias() {
            let formDataCategoria = new FormData();
            formDataCategoria.append("id_plataforma", ID_PLATAFORMA);

            $.ajax({
                url: SERVERURL + 'Tienda/categoriastienda',
                method: 'POST',
                data: formDataCategoria,
                contentType: false,
                processData: false,
                success: function(response) {
                    let categorias = JSON.parse(response);

                    if (!Array.isArray(categorias)) {
                        categorias = Object.values(categorias);
                    }

                    let categoriasHtml = '';
                    categorias.forEach(categoria => {
                        let categoryHtml = `
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-${categoria.id_linea}">
                                    <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="filtrarPorCategoria(${categoria.id_linea})">
                                        ${categoria.nombre_linea}
                                    </button>
                                </h2>
                            </div>
                        `;
                        categoriasHtml += categoryHtml;
                    });

                    categoriasHtml += `
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-ver-todas">
                                <button class="accordion-button collapsed" type="button" style="font-size: 12px;" onclick="verTodasCategorias()">
                                    Ver todas
                                </button>
                            </h2>
                        </div>
                    `;

                    $('#accordionSubcategorias').html(categoriasHtml);
                    $('#accordionSubcategoriasModal').html(categoriasHtml);
                },
                error: function(error) {
                    console.error("Error al consumir la API:", error);
                }
            });
        }

        // Función para inicializar un slider
        function initSlider(sliderId, valorMinimoId, valorMaximoId, inputValorMinimoId, inputValorMaximoId, onSliderUpdateCallback) {
            var slider = document.getElementById(sliderId);
            noUiSlider.create(slider, {
                start: [parseInt(localStorage.getItem(inputValorMinimoId) || 0), parseInt(localStorage.getItem(inputValorMaximoId) || 3000)],
                connect: true,
                range: {
                    'min': 0,
                    'max': 3000
                }
            });

            slider.noUiSlider.on('update', function(values, handle) {
                var value = values[handle];
                var valorMinimo = document.getElementById(valorMinimoId);
                var valorMaximo = document.getElementById(valorMaximoId);
                var inputValorMinimo = document.getElementById(inputValorMinimoId);
                var inputValorMaximo = document.getElementById(inputValorMaximoId);

                if (handle) {
                    valorMaximo.textContent = Math.round(value);
                    inputValorMaximo.value = Math.round(value);
                    localStorage.setItem(inputValorMaximoId, Math.round(value));
                } else {
                    valorMinimo.textContent = Math.round(value);
                    inputValorMinimo.value = Math.round(value);
                    localStorage.setItem(inputValorMinimoId, Math.round(value));
                }

                // Ejecutar el callback después de actualizar el slider
                if (onSliderUpdateCallback) {
                    onSliderUpdateCallback(values[0], values[1]);
                }
            });
        }

        // Función para actualizar los productos
        function actualizarProductos() {
            const valorMinimo = document.getElementById('inputValorMinimo-left').value || document.getElementById('inputValorMinimo-modal').value;
            const valorMaximo = document.getElementById('inputValorMaximo-left').value || document.getElementById('inputValorMaximo-modal').value;
            const ordenarPor = document.querySelector('input[name="ordenar_por"]:checked') ? document.querySelector('input[name="ordenar_por"]:checked').value : null;
            const urlParams = new URLSearchParams(window.location.search);
            const idCategoria = urlParams.has('id_cat') ? urlParams.get('id_cat') : '';

            const idPlataforma = ID_PLATAFORMA;

            document.getElementById('hiddenValorMinimo').value = valorMinimo;
            document.getElementById('hiddenValorMaximo').value = valorMaximo;

            const formData = new FormData();
            formData.append('id_plataforma', idPlataforma);
            formData.append('id_categoria', idCategoria);
            formData.append('precio_minimo', valorMinimo);
            formData.append('precio_maximo', valorMaximo);
            formData.append('ordenar_por', ordenarPor);

            fetch(SERVERURL + 'Tienda/obtener_productos_tienda_filtro', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    mostrarProductos(data);
                })
                .catch(error => console.error('Error:', error));
        }
    });

    function agregar_tmp(id_producto, precio, id_inventario) {
        $("#id_productoTmp").val(id_producto);
        $("#precio_productoTmp").val(precio);
        $("#id_inventario").val(id_inventario);

        /* $("#boton_compraModal").modal("show"); */
        $("#checkoutModal").modal("show");
    }
</script>

<?php include 'Views/templates/footer.php'; ?>