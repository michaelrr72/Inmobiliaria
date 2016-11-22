<?php

namespace App\Register;

require "generated-conf/config.php";

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Base\UsuariosQuery;
use Base\PersonasQuery;
use Personas;
use Usuarios;

class RegisterController implements ControllerProviderInterface {

    // la función "connect" define las rutas del módulo
    public function connect(Application $app) {
        // creates a nuevo controlador
        $controller = $app['controllers_factory'];

        // Configura las rutas del módulo
        // ==============================
        // la ruta "/registro" muestra el formulario de login
        $controller->get('/register', function() use($app) {

            // muestra la plantilla views/register.html.twig
            return $app['twig']->render('Register/register.html.twig');
        })->bind('register');
        
        //registra usuario
        $controller->post('/doRegister', function(Request $request) use($app) {

            // toma los datos de la petición web
            $name = $request->get('complete_name');
            $login = $request->get('login');
            $correo = $request->get('correo');
            $password = $request->get('password');
            $admin = $request->get('administrador');
            
            $persona = new Personas();
            $persona->setNombreCompleto($name);
            $persona->setCorreo($correo);
            
            $usuario = new Usuarios();
            $usuario->setLogin($login);
            $usuario->setPassword($password);
            $usuario->setAdministrador($admin);
            $usuario->setPersonas($persona);
            $usuario->save();
            
            return $app->redirect($app['url_generator']->generate('login'));

            // hace un bind con el nombre "doRegister"
        })->bind('doRegister');

        // retorna el controlador
        return $controller;
    }

}
