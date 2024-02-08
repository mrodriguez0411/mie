$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "ajax/leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenaCarrito(response);
    },
  });
  //Ajax para llenar el detalle del carrito de Compra o editarlo
  $.ajax({
    type: "post",
    url: " ajax/leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenaTabla(response);
    },
  });
  
  function llenaTabla(response) {
    $("#tablaCarrito tbody").text("");
    let total = 0;
    response.forEach((element) => {
      let subTotal = element["cantidad"] * element["precio"];
      let precio = element["precio"];

      total = total + subTotal;
      //le doy formato de pesos a todos los numeros
      const subTotalAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(subTotal);
      
      const precioAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(precio);
      
      
      
      $("#tablaCarrito tbody").append(
        `
                <tr>
                    <td><img src="${element["web_path"]}" class="img-size-50"/></td>
                    <td scope="row">${element["nombre"]}</td>
                    <td>
                        ${element["cantidad"]}
                        <button type=button class="btn-xs btn-primary mas" data-id="${element['id']}" data-tipo="mas">+<button/>
                        <button type=button class="btn-xs btn-danger menos" data-id="${element['id']}" data-tipo="menos">-<button/>
                    </td>
                    <td>${precioAR}</td>
                    <td>${subTotalAR}</td>
                    <td><i class="fa fa-trash text-danger borraProductoCarrito" data-id="${element['id']}"></i></td>
                </tr>
                `
      );
    });

    
    const totalAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(total);
    $("#tablaCarrito tbody").append(
      `
            <tr style="background-color: #00b2ee;">
                <td colspan="4" class="text-right"><strong>TOTAL:</strong></td>
                <td>${totalAR}</td>
                <td></i></td>
                
            </tr>
            
            `
    );
  }

  //Llenar tabla de pasarela
  $.ajax({
    type: "post",
    url: " ajax/leerCarrito.php",
    dataType: "json",
    success: function (response) {
      llenaTablaPasarela(response);
    },
  });
  
  function llenaTablaPasarela(response) {
    $("#tablaPasarela tbody").text("");
    let total = 0;
    response.forEach((element) => {
      let subTotal = element["cantidad"] * element["precio"];
      let precio = element["precio"];

      total = total + subTotal;
      //le doy formato de pesos a todos los numeros
      const subTotalAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(subTotal);
      
      const precioAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(precio);
      
      
      
      $("#tablaPasarela tbody").append(
        `
                <tr>
                    <td><img src="${element["web_path"]}" class="img-size-50"/></td>
                    <td scope="row">${element["nombre"]}</td>
                    <td>
                        ${element["cantidad"]}
                    </td>
                    <td>${precioAR}</td>
                    <td>${subTotalAR}</td>
                </tr>
                `
      );
    });

    const totalAR = new Intl.NumberFormat("es-ar", {
        style: "currency",
        currency: "ARS",
      }).format(total);
    $("#tablaPasarela tbody").append(
      `
            <tr style="background-color: #00b2ee;">
                
            <td colspan="4" class="text-right"><strong>TOTAL:</strong></td>
                
                <td>${totalAR}</td>
                
                
            </tr>
            
            `
    );
  }
  
  //este evento es para agregar y quitar productos de visualizar carrito, boton mas y menos
  
  $(document).on("click",".mas,.menos", function(e){
    e.preventDefault();
    //recibo el id del producto
    let id=$(this).data('id');
    let tipo=$(this).data('tipo');//si suma o resta según el botón.
    //jqery ajax
    $.ajax({
        type: "post",
        url: "ajax/modificaCantidadCarrito.php",
        data: {"id":id,"tipo":tipo},
        dataType: "json",
        success: function(response){
            llenaTabla(response);
            llenaCarrito(response);
        }
    });
  });

  //Evento click boton borrrar productos de carrito
  $(document).on("click",".borraProductoCarrito", function(e){
    e.preventDefault();
    //recibo el id del producto
    let id=$(this).data('id');
    //jqery ajax
    $.ajax({
        type: "post",
        url: "ajax/borrarProductoCarrito.php",
        data: {"id":id},
        dataType: "json",
        success: function(response){
            llenaTabla(response);
            llenaCarrito(response);
        }
    });
  });
  
  // Agrega todos los productos al carrito al apretar el boton agregaCarrrito
  $("#agregarCarrito").click(function (e) {
    e.preventDefault();
    let id = $(this).data("id");
    let nombre = $(this).data("nombre");
    let web_path = $(this).data("web_path");
    let precio = $(this).data("precio");
    let cantidad = $("#cantidadProducto").val();
    $.ajax({
      type: "post",
      url: "ajax/agregarCarrito.php",
      data: {
        id: id,
        nombre: nombre,
        web_path: web_path,
        precio: precio,
        cantidad: cantidad,
      },
      dataType: "json",
      success: function (response) {
        llenaCarrito(response);
        $("#badgeProducto")
          .hide(500)
          .show(500)
          .hide(500)
          .show(500)
          .hide(500)
          .show(500);
        $("#iconoCarrito").click();
      },
    });
  });
  function llenaCarrito(response) {
    let cantidad = Object.keys(response).length;
    if (cantidad > 0) {
      $("#badgeProducto").text(cantidad);
    } else {
      $("#badgeProducto").text("");
    }
    $("#listaCarrito").text("");
    response.forEach((element) => {
      $("#listaCarrito").append(
        `
                <a href="index.php?modulo=detalleproducto&id=${element["id"]}" class="text-sm">
                    <!-- Message Start -->
                    <div class="media" style:"width:100%;">
                        <img src="${element["web_path"]}" class="img-size-50 mr-1">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                ${element["nombre"]}
                                <span class="float-right text-sm text-primary"><i class="fas fa-eye"></i></span>
                            </h3>
                            <p class="text-sm">Cantidad ${element["cantidad"]}</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                `
      );
    });
    $("#listaCarrito").append(
      `
            <a href="index.php?modulo=carritoCompras" class="dropdown-item dropdown-footer" style="color: #23282e;">
                Visualizar Carrito 
                <i class="fa fa-cart-plus"></i>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer text-danger" id="borrarCarrito">
                Borrar Carrito 
                <i class="fa fa-trash"></i>
            </a>
            `
    );
  }
  $(document).on("click", "#borrarCarrito", function (e) {
    e.preventDefault();
    $.ajax({
      type: "post",
      url: "ajax/borrarCarrito.php",
      dataType: "json",
      success: function (response) {
        llenaCarrito(response);
      },
    });
  });
  /*jquery para copiar los datos del cliente en la de envios.php el Checkbo*/
  let nombreEnv=$("#nombreEnv").val();
  let emailEnv=$("#emailEnv").val();
  let direccionEnv=$("#direccionEnv").val();
  
  $("#copiaCli").click(function(e){
    let nombreCli=$("#nombreCli").val();
    let emailCli=$("#emailCli").val();
    let direccionCli=$("#direccionCli").val();

    if( $(this).prop("checked")==true ){
        $("#nombreEnv").val(nombreCli);
        $("#emailEnv").val(emailCli);
        $("#direccionEnv").val(direccionCli);
    } else {
        $("#nombreEnv").val(nombreEnv);
        $("#emailEnv").val(emailEnv);
        $("#direccionEnv").val(direccionEnv);
    }

  });
});
//MOdulo de Mercdo Pago

