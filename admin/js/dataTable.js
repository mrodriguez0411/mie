//muestra los productos en base de datos, se edita carga y borra desde el dashboard
$(document).ready(function(){
    $("#tablaProductos").dynamicTable({
        columns: [{
            text:"Nombre",
            key:" nombre"
        },
        {
            text:"Precio",
            key:" precio"
        },
        {
            text:"Categoria",
            key:" categoria"
        },
        {
            text:"Stock",
            key:" stock"
        },
        {
            text:"Imagenes",
            key:"imagenes"
        },
        {
            text:"Descripcion",
            key:"descripcion"
        },
        ],
        data:[{

        }
        
        ],
        //creo los botones de la tabla
        buttons: {
            addButton: '<input type="button" value="Crear" class="btn btn-success" />',
            cancelButton: '<input type="button" value="Cancelar" class="btn btn-primary" />',
            deleteButton: '<input type="button" value="Eliminar" class="btn btn-danger" />',
            editButton: '<input type="button" value="Editar" class="btn btn-primary" />',
            saveButton: '<input type="button" value="Guardar" class="btn btn-success" />'
        },
        showActionColumn: true,
        //cargo las condiciones
        getControl: function(columnKey){
            if(columnKey == "stock"){
                return '<input type="number" class="form-control" />';
            }
            if(columnKey == "categoria"){
                return '<select class="form-control"><option value="P">Alimento Perro</option><option value="G">Alimento Gato</option> <option value="A">Accesorios</option></select>';
            }
            return '<input type="text" class="form-control"/>';
        },
        
    })
    var data = $("#tablaProductos").getTableData();
});