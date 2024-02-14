//muestra los productos en base de datos, se edita carga y borra desde el dashboard
let tabla = document.querySelector("#tablaProductos");
let dataTable = new DataTable(tabla,{
    
});    
/*$(document).ready( function () {
    //$('#tablaProductos').DataTable();
    $.ajax({
        type: "post",
        url: "ajax/leerCarrito.php",
        dataType: "json",
        success: function (response) {
        llenaTablaProductos(response);
        },
      });
      function llenaTablaProductos(response) {
      response.forEach((element) => {
        $("#tablaProductos tbody").append(
          `
                  
                  
                  <tr>
                    <td>${element["id"]}</td>
                    <td scope="row">${element["nombre"]}</td>
                    <td>${element["precio"]}</td>
                    <td>${element["categoria"]}</td>
                    <td>${element["stock"]}</td>
                    <td><img src="${element["web_path"]}" class="img-size-50"/></td>
                    <td>${element["descripcion"]}</td>
                    
                    
                </tr>
                          
                  `
        );
      });
    }
});*/


