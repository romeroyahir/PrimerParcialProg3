<?php
require __DIR__ . '/vendor/autoload.php';
require('./controllers/usuario.php');
require('./controllers/autos.php');
require('./class/User.php');
require('./class/Autos.php');
require('./helpers/helper.php');

/* Me falto punto 5 y punto 9 */


$metodo = $_SERVER['REQUEST_METHOD'] ?? "";
$path = $_SERVER['PATH_INFO'] ?? "";
$token = (getallheaders())['token'] ?? "";

switch ($metodo) {
    case 'POST':
        if($path == "/registro"){
            createUser(["tipo","email","password"]);
        }else if($path == "/login"){
            login(["email","password"]);
        }else if($path == "/vehiculo"){
            ingresoAuto(["marca","modelo","patente","precio"]);
        }else if($path == "/servicio"){
          //  pedidoService(["id","modelo","patente","precio"]);
        }
        else{
            response(false,"BAD REQUEST","msg");
        }
        break;
 
        case 'GET':
            if($path == "/patente"){
                if( explode( "=", $_SERVER['QUERY_STRING'])[0] == "patente" ){
                    getAutosByPatente();
                    return;
                }
            }
            else{
                response(false,"BAD REQUEST","msg");
            }
            if($path == "/turno"){

            }
            

    default:
        response(false,"BAD REQUEST","msg");
        break;
}
