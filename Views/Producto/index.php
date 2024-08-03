<?php include 'Views/templates/header.php'; ?>
<?php include 'Views/Producto/css/producto_style.php'; ?>
<?php /* require_once './Views/Producto/Modales/boton_compra.php'; */ ?>
<?php require_once './Views/Producto/Modales/checkout.php'; ?>
<?php

$id_producto = $_GET['id'];

?>

<main style="background-color: #f9f9f9;">
  <div class="container flex-column" style="align-items: center !important;">
    <div class="content_left_right">
      <div class="left-column">
        <div class="slider_producto">
          <div class="d-flex flex-column" style="width: 100%;">
            <!-- Indicadores del carrusel para las miniaturas -->
            <div class="list-group" id="list-tab" role="tablist">
              <!-- Imágenes dinámicas aquí -->
            </div>
          </div>
          <div class="col-lg-10" style="max-width: 600px !important;">
            <!-- Área principal de visualización de imagen -->
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="list-image1" role="tabpanel" aria-labelledby="list-image1-list">
                <img id="main-image" src="" class="img-fluid" alt="Responsive image" data-bs-toggle="modal" data-bs-target="#imagenModal">
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="right-column">
        <div class="caja px-5" style="width:100%;">
          <div class="product-title" id="nombre-producto"></div>
          <br>
          <div class="precios_producto">
            <div>
              <span style="font-size: 20px; padding-right: 10px;" class="texto_precio">
                <strong id="precio-especial"></strong>
              </span>
            </div>
            <div id="precio-normal-container">
              <span class="tachado" style="font-size: 20px; padding-right: 10px;">
                <strong id="precio-normal"></strong>
              </span>
            </div>
            <div id="ahorra-container" class="px-2" style="background-color: #4464ec; color:white !important; border-radius: 0.3rem;">
              <span class="ahorra"><i class="bx bxs-purchase-tag"></i>
                <strong id="ahorra"></strong>
              </span>
            </div>
          </div>
          <div id="landing" style="padding: 20px;">

          </div>
          <a style="height: 50px; font-size: 26px; width: 100%; border-radius: 15px" class="jump-button btn btn-primary texto_boton" href="#" id="comprar-ahora">
            <span style="margin-top: 10px">COMPRAR AHORA </span>
          </a>
          <br><br>
        </div>
      </div>
    </div>
    <!-- Inicio de Iconos-->
    <div id="iconos-container" class="iconos_producto col-md-12" style="padding-bottom: 75px;">
      <!-- Los iconos se cargarán aquí mediante AJAX -->
    </div>
    <!-- Fin Iconos-->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="imagenModal" tabindex="-1" aria-labelledby="imagenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imagenModalLabel">Visualización de Imagen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="" id="imagenEnModal" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</main>

<script>
  function cargarLanding(id) {
    let formData = new FormData();
    formData.append("id_producto_tienda", id);

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://imagenes.imporsuitpro.com/obtenerLandingTienda", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        try {
          var response = JSON.parse(xhr.responseText);
          console.log("Respuesta de la API:", response);

          // Decodificar entidades HTML
          var decodedHTML = decodeEntities(response.data);
          console.log("HTML decodificado:", decodedHTML);

          // Crear un documento temporal para manipular el HTML decodificado
          var parser = new DOMParser();
          var doc = parser.parseFromString(decodedHTML, 'text/html');

          // Comprobar si el body está presente en la respuesta
          var body = doc.body;
          if (body) {
            var bodyContent = body.innerHTML;
            console.log("Contenido del body:", bodyContent);

            // Insertar el contenido del body en el div con id="landing"
            document.getElementById("landing").innerHTML = bodyContent;
          } else {
            console.error("No se encontró la etiqueta <body> en la respuesta.");
          }
        } catch (e) {
          console.error("Error al decodificar JSON:", e);
        }
      } else {
        console.error("Error en la solicitud AJAX.");
      }
    };
    xhr.send(formData);
  }

  function decodeEntities(encodedString) {
    var textArea = document.createElement('textarea');
    textArea.innerHTML = encodedString;
    return textArea.value;
  }

  $(document).ready(function() {
    var id_producto = '<?php echo $_GET['id']; ?>';
    let formData = new FormData();
    formData.append("id_plataforma", ID_PLATAFORMA);
    formData.append("id_producto_tienda", id_producto);

    var id_productoPrincipal = "";

    $.ajax({
      url: SERVERURL + 'Tienda/obtener_productos_tienda',
      method: 'POST',
      data: formData,
      processData: false, // No procesar los datos
      contentType: false, // No establecer ningún tipo de contenido
      dataType: "json",
      success: function(response) {

        if (response.length > 0) {

          var producto = response[0]; // Asumimos que el primer producto es el deseado

          var precioEspecial = parseFloat(producto.pvp_tienda);
          var precioNormal = parseFloat(producto.pref_tienda);

          var ahorro = 0;
          if (precioNormal > 0) {
            ahorro = 100 - (precioEspecial * 100 / precioNormal);
          }
          $('#nombre-producto').text(producto.nombre_producto_tienda);
          $('#precio-especial').text('$' + parseFloat(precioEspecial).toFixed(2));
          $('#precio-normal').text('$' + parseFloat(precioNormal).toFixed(2));
          $('#ahorra').text('$' + parseFloat(ahorro).toFixed(2));

          // Ocultamos el precio normal y el contenedor de ahorro ya que no se utilizan en el ejemplo proporcionado
          if (ahorro == 0) {
            $('#ahorra-container').hide();
          }

          // Manejo de imágenes
          var mainImageSrc = producto.imagen_principal_tienda;
          mainImageSrc = obtenerURLImagen(mainImageSrc, SERVERURL);

          $('#main-image').attr('src', mainImageSrc);

          // Miniaturas
          var thumbnailsHtml = '';
          // Suponemos que `producto.imagenes` es un array de URLs de imágenes
          if (producto.imagenes && producto.imagenes.length > 0) {
            producto.imagenes.forEach(function(imagen, index) {
              var imagePath = imagen.url;
              imagePath = obtenerURLImagen(imagePath, SERVERURL);
              thumbnailsHtml += `
                  <a class="list-group-item list-group-item-action ${index === 0 ? 'active' : ''}" style="max-width: 100px !important; max-height: 100px !important; padding:0;" id="list-image${index+1}-list" data-bs-toggle="list" href="#list-image${index+1}" role="tab" aria-controls="image${index+1}">
                    <img src="${imagePath}" class="img-thumbnail">
                  </a>
                `;
            });
            $('#list-tab').html(thumbnailsHtml);

            // Eventos para las miniaturas
            $('#list-tab a').on('click', function(e) {
              e.preventDefault();
              var targetImage = $(this).find('img').attr('src');
              $('#main-image').attr('src', targetImage);
            });
          }

          // Modal para la imagen principal
          $('#main-image').on('click', function() {
            var modalImageSrc = $(this).attr('src');
            $('#imagenEnModal').attr('src', modalImageSrc);
          });

          // Botón de comprar
          $('#comprar-ahora').on('click', function() {
            agregar_tmp(id_producto, parseFloat(producto.pvp_tienda), producto.id_inventario);
          });

          id_productoPrincipal = producto.id_producto;
          cargarLanding(id_producto);
        } else {
          console.error('No se encontraron productos.');
        }
      },
      error: function(xhr, status, error) {
        console.error('Error al obtener los datos:', error);
        console.log(xhr.responseText);
      }
    });

    // Manejo del navbar y logo al hacer scroll
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

    // Evento para mostrar el modal de imagen
    $('#imagenModal').on('show.bs.modal', function(event) {
      var imageSrc = $('#main-image').attr('src');
      $('#imagenEnModal').attr('src', imageSrc);
    });

    /* Carga de landing */
    /* cargarLanding(id_productoPrincipal); */
    /* Fin carga de landing */
  });

  function agregar_tmp(id_producto, precio, id_inventario) {
    $("#id_productoTmp").val(id_producto);
    $("#precio_productoTmp").val(precio);
    $("#id_inventario").val(id_inventario);

    /* $("#boton_compraModal").modal("show"); */
    $("#checkoutModal").modal("show");
  }

  // Función llamada si la imagen no puede cargarse
  function imagenError(image) {
    console.log("La imagen no pudo cargarse.");
    image.src = 'ruta/a/tu/imagen/por/defecto.jpg';
  }

  // Función llamada cuando la imagen se ha cargado correctamente
  function imagenCargada(image) {
    console.log("La imagen se cargó correctamente.");
    image.classList.add("cargada-correctamente");
  }


  function obtenerURLImagen(imagePath, serverURL) {
    // Verificar si el imagePath no es null
    if (imagePath) {
      // Verificar si el imagePath ya es una URL completa
      if (imagePath.startsWith("http://") || imagePath.startsWith("https://")) {
        // Si ya es una URL completa, retornar solo el imagePath
        return imagePath;
      } else {
        // Si no es una URL completa, agregar el serverURL al inicio
        return `${serverURL}${imagePath}`;
      }
    } else {
      // Manejar el caso cuando imagePath es null
      console.error("imagePath es null o undefined");
      return null; // o un valor por defecto si prefieres
    }
  }
  /* Iconos */
  // Cargar iconos mediante AJAX
  let formDataIconos = new FormData();
  formDataIconos.append("id_plataforma", ID_PLATAFORMA);

  $.ajax({
    url: SERVERURL + 'Tienda/iconostienda', // Actualiza esta URL según tu configuración
    method: 'POST',
    data: formDataIconos,
    contentType: false,
    processData: false,
    success: function(response) {
      console.log(response); // Para depurar la respuesta
      try {
        var iconos = JSON.parse(response);
      } catch (e) {
        console.error('Error al parsear la respuesta:', e);
        return;
      }

      if (iconos && Array.isArray(iconos)) {
        var $iconosContainer = $("#iconos-container");

        iconos.forEach(function(icono) {
          var texto = icono.texto || '';
          var icon_text = icono.icon_text || '';
          var enlace_icon = icono.enlace_icon || '';
          var subtexto_icon = icono.subtexto_icon || '';

          var enlaceHTML = enlace_icon ? `href="${enlace_icon}" target="_blank" style="text-decoration: none; color: inherit;"` : '';

          var iconoItem = `
              <div class="col-md-4 icon_responsive" style="padding-bottom: 20px;">
                <a ${enlaceHTML}>
                  <div class="card card_icon text-center">
                    <div class="card-body card-body_icon d-flex flex-column">
                      <div>
                        <i class="fas ${icon_text} fa-2x"></i> <!-- Cambia el icono según corresponda -->
                      </div>
                      <div>
                        <h5 class="card-title card-title_icon">${texto}</h5>
                        <p class="card-text card-text_icon">${subtexto_icon}</p>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            `;

          // Agregar el icono al contenedor
          $iconosContainer.append(iconoItem);
        });
      } else {
        console.error('La respuesta no contiene iconos válidos.');
      }
    },
    error: function(error) {
      console.log('Error al cargar los iconos:', error);
    }
  });
  /* Fin Iconos */


  //cargar select ciudades y provincias
  $(document).ready(function() {
    cargarProvincias(); // Llamar a cargarProvincias cuando la página esté lista

    // Llamar a cargarCiudades cuando se seleccione una provincia
    $("#provinica").on("change", cargarCiudades);
  });

  // Función para cargar provincias
  function cargarProvincias() {
    $.ajax({
      url: SERVERURL + "Ubicaciones/obtenerProvincias", // Reemplaza con la ruta correcta a tu controlador
      method: "GET",
      success: function(response) {
        let provincias = JSON.parse(response);
        let provinciaSelect = $("#provinica");
        provinciaSelect.empty();
        provinciaSelect.append('<option value="">Provincia *</option>'); // Añadir opción por defecto

        provincias.forEach(function(provincia) {
          provinciaSelect.append(
            `<option value="${provincia.codigo_provincia}">${provincia.provincia}</option>`
          );
        });
      },
      error: function(error) {
        console.log("Error al cargar provincias:", error);
      },
    });
  }

  // Función para cargar ciudades según la provincia seleccionada
  function cargarCiudades() {
    let provinciaId = $("#provinica").val();
    if (provinciaId) {
      $.ajax({
        url: SERVERURL + "Ubicaciones/obtenerCiudades/" + provinciaId, // Reemplaza con la ruta correcta a tu controlador
        method: "GET",
        success: function(response) {
          let ciudades = JSON.parse(response);
          let ciudadSelect = $("#ciudad_entrega");
          ciudadSelect.empty();
          ciudadSelect.append('<option value="">Ciudad *</option>'); // Añadir opción por defecto

          ciudades.forEach(function(ciudad) {
            ciudadSelect.append(
              `<option value="${ciudad.id_cotizacion}">${ciudad.ciudad}</option>`
            );
          });

          ciudadSelect.prop("disabled", false); // Habilitar el select de ciudades
        },
        error: function(error) {
          console.log("Error al cargar ciudades:", error);
        },
      });
    } else {
      $("#ciudad_entrega")
        .empty()
        .append('<option value="">Ciudad *</option>')
        .prop("disabled", true); // Deshabilitar el select de ciudades si no hay provincia seleccionada
    }
  }
  /* Fin cargar provincia y ciudad*/
</script>

<?php include 'Views/templates/footer.php'; ?>