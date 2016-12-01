<?php

namespace App\Apartamentos;

require "generated-conf/config.php";

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Base\ApartamentosQuery;
use Base\TiposQuery;
use Base\ComentariosQuery;
use Apartamentos;
use Tipos;
use Comentarios;

class ApartamentosController implements ControllerProviderInterface {

    public function connect(Application $app) {
        // creates a new controller based on the default route
        $controller = $app['controllers_factory'];

        // la ruta "/aptos/list"
        $controller->get('/list', function() use($app) {

            // obtiene el nombre de apartamento de la sesión
            $user = $app['session']->get('user');
            $apartamentos = ApartamentosQuery::create()->find();

            if (!isset($aptos)) {
                $apto = array();
            }
            foreach ($apartamentos as $apartamento) {
                $ide = $apartamento->getId();
                $n = $apartamento->getNombre();
                $d = $apartamento->getDescripcion();
                $p = $apartamento->getPrecio();
                $la = $apartamento->getLatitud();
                $lo = $apartamento->getLongitud();
                $ti = $apartamento->getTipos();
                $aptos[] = array(
                    'id' => $ide,
                    'nombre' => $n,
                    'descripcion' => $d,
                    'precio' => $p,
                    'latitud' => $la,
                    'longitud' => $lo,
                    'tipo' => $ti
                );
            }


            // ya ingreso un apartamento ?
            if (isset($user) && $user != '') {
                // muestra la plantilla
                return $app['twig']->render('Apartamentos/apartamentos.list.html.twig', array(
                            'user' => $user,
                            'aptos' => $aptos
                ));
            } else {
                // redirige el navegador a "/login"
                return $app->redirect($app['url_generator']->generate('login'));
            }

            // hace un bind
        })->bind('aptos-list');

        // la ruta "/aptos/new"
        $controller->get('/new', function() use($app) {
          // obtiene el nombre de apartamento de la sesión
          $user = $app['session']->get('user');
          // ya ingreso un apartamento ?
          if ( isset( $user ) && $user != '' ) {
            
            // muestra la plantilla
            return $app['twig']->render('Apartamentos/apartamentos.edit.html.twig', array(
              'user' => $user,
              'index' => '',
              'apto_to_edit' => array(
                  'id' => '',
                  'nombre' => '',
                  'descripcion' => '',
                  'precio' => '',
                  'latitud' => '',
                  'longitud' => '',
                  'tipo' => ''
                )
            ));
          } else {
            // redirige el navegador a "/login"
            return $app->redirect( $app['url_generator']->generate('login'));
          }
        // hace un bind
        })->bind('aptos-new');

        // la ruta "/aptos/edit"
        $controller->get('/edit/{index}', function($index) use($app) {

            // obtiene el nombre de apartamento de la sesión
            $user = $app['session']->get('user');

            // obtiene los apartamentos de la sesión
            $aptos = $app['session']->get('aptos');
            if (!isset($aptos)) {
                $aptos = array();
            }
            $apto = ApartamentosQuery::create()->findPK($index);
            // no ha ingresado el apartamento (no ha hecho login) ?
            if (!isset($user) || $user == '') {
                // redirige el navegador a "/login"
                return $app->redirect($app['url_generator']->generate('login'));

                // no existe un apartamento en esa posición ?
            } else if ($apto == NULL) {
                // muestra el formulario de nuevo apartamento
                return $app->redirect($app['url_generator']->generate('aptos-new'));
            } else {
                // muestra la plantilla
                return $app['twig']->render('Apartamentos/apartamentos.edit.html.twig', array(
                            'user' => $user,
                            'index' => $index,
                            'apto_to_edit' => $apto
                ));
            }

            // hace un bind
        })->bind('aptos-edit');

        $controller->post('/save', function( Request $request ) use ( $app ) {

            $aptos = $app['session']->get('aptos');
            if (!isset($aptos)) {
                $aptos = array();
            }

            // index no está incluido en la petición
            $index = $request->get('index');
            if (!isset($index) || $index == '') {
                // agrega el nuevo apartamento
                $aptos2 = array(
                    id => $request->get('id'),
                    nombre => $request->get('nombre'),
                    descripcion => $request->get('descripcion'),
                    precio => $request->get('precio'),
                    latitud => $request->get('latitud'),
                    longitud => $request->get('longitud'),
                    tipo => $request->get('tipo')
                );
                $tip = new Tipos();
                $tip->setNombre($aptos2['tipo']);

                $apto = new Apartamentos();
                $apto->setNombre($aptos2['nombre']);
                $apto->setDescripcion($aptos2['descripcion']);
                $apto->setPrecio($aptos2['precio']);
                $apto->setLatitud($aptos2['latitud']);
                $apto->setLongitud($aptos2['longitud']);
                $apto->setTipos($tip);
                $apto->save();
            } else {
                // modifica el apartamento en la posición $index
                $aptos[$index] = array(
                    id => $request->get('id'),
                    nombre => $request->get('nombre'),
                    descripcion => $request->get('descripcion'),
                    precio => $request->get('precio'),
                    latitud => $request->get('latitud'),
                    longitud => $request->get('longitud'),
                    tipo => $request->get('tipo')
                );
                $apto = ApartamentosQuery::create()->findOneById($index);
                $apto->setNombre($aptos2['nombre']);
                $apto->setDescripcion($aptos2['descripcion']);
                $apto->setPrecio($aptos2['precio']);
                $apto->setLatitud($aptos2['latitud']);
                $apto->setLongitud($aptos2['longitud']);
                $apto->save();
            }


            // actualiza los datos en sesión
            $app['session']->set('aptos', $aptos);

            // muestra la lista de apartamentos
            return $app->redirect($app['url_generator']->generate('aptos-list'));
        })->bind('aptos-save');

        $controller->get('/delete/{index}', function($index) use ($app) {

            // obtiene el apartamento
            $apto = ApartamentosQuery::create()->findPK($index);
            $apto->delete();

            // muestra la lista de apartamentos
            return $app->redirect($app['url_generator']->generate('aptos-list'));
        })->bind('aptos-delete');

        return $controller;
    }

}
