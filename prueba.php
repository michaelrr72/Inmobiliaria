<?php
require "vendor/autoload.php";
require "generated-conf/config.php";
/*
$persona = new Personas();
$persona->setNombreCompleto("Michael");
$persona->setCorreo("michaelrr72@outlook.com");

$usuario = new Usuarios();
$usuario->setLogin("admin");
$usuario->setPassword("12345");
$usuario->setAdministrador('1');
$usuario->setPersonas($persona);
$usuario->save();

$persona = new Personas();
$persona->setNombreCompleto("nk");
$persona->setCorreo("nk@user.com");

$usuario = new Usuarios();
$usuario->setLogin("user");
$usuario->setPassword("123");
$usuario->setAdministrador('0');
$usuario->setPersonas($persona);
$usuario->save();
*/
/*

$tipo = new Tipos();
$tipo->setNombre("habitacion");

$comment = new Comentarios();
$comment->setComentario("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque maximus efficitur lacus placerat tincidunt. Donec varius ligula sed tellus blandit, tristique tincidunt tortor faucibus. Vivamus eget tellus et enim bibendum facilisis et a erat. Etiam suscipit vitae lacus vitae mollis. Vivamus fringilla urna sed arcu tempor, et finibus diam semper. Etiam euismod at libero eu bibendum. Quisque turpis metus, tincidunt et semper et, ultrices eu tortor. Sed hendrerit viverra lacus, ut fermentum ligula dictum a. Quisque dui ligula, semper nec placerat vel, lacinia quis elit. Vivamus eget mauris nec turpis finibus congue vel sit amet sapien.");

$apto = new Apartamentos();
$apto->setNombre("Apto Prueba");
$apto->setDescripcion("Apartamento");
$apto->setPrecio(400000);
$apto->setLatitud("4.635452");
$apto->setLongitud("-74.070138");
$apto->setTipos($tipo);
$apto->setComentarios($comment);
$apto->save();
*/
/*
$tipo = new Tipos();
$tipo->setNombre("Apartamento");

$apto = new Apartamentos();
$apto->setNombre("Apto Prueba");
$apto->setDescripcion("Habitaciones:3, Baños:2");
$apto->setPrecio(669000);
$apto->setLatitud("4.708822");
$apto->setLongitud("-74.135592");
$apto->setTipos($tipo);
$apto->save();
*/
$apartamentos = ApartamentosQuery::create()->find();
echo $apartamentos;
/*

$usuarios = UsuariosQuery::create()->find();
foreach ($usuarios as $usuario) {
    echo $usuario->getLogin()."\n";
}

$elusuario = UsuariosQuery::create()->findOneByLogin('user');
echo $elusuario."\n";
*/