<?php
    $productos=unserialize($_COOKIE['productos']);
    foreach($productos as $key => $value){
        if($_REQUEST['id']==$value['id']){
            unset($productos[$key]);
            
        }
    }
    $productos=array_values($productos);//cuando se borra sin esta funcion queda un hueco en la tabla
    setcookie("productos",serialize($productos));
    echo json_encode($productos);
?>