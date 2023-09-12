<?php

include('../php/conexion.php');

if(isset($_POST['enviar'])){

    $id=$_POST['id'];
    $descripcion=$_POST['descri'];
    $foto = $_FILES['foto']['name'];
    $municipio=$_POST['muni'];

    

   if(isset($foto) && $foto != ""){
        $tipo = $_FILES['foto']['type'];
        $temp  = $_FILES['foto']['tmp_name'];

       if( !((strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp') || strpos($tipo,'jpg')))){
            echo "<script>alert('el archivo tiene que ser de extension png, jpeg, webp y jpg'); </script>";
            echo "<script>window.location.href='crudsaray.php';</script>";
            }else{
         $query = "INSERT INTO destino (idDestino,descripcion,foto,municipio) values('$id','$descripcion','$foto','$municipio')";
         $resultado = mysqli_query($conexion,$query);
        if ($resultado) {
             move_uploaded_file($temp, '../imagenes/'.$foto);
          echo "<script>alert('Datos subidos correctamente');</script>";
         // echo "<script>window.location.href='crudsaray.php';</script>";

         }else{
          echo "<script>alert('ha ocurrido un error en el servidor');</script>";
            
         }
       }
    } 
}







?>