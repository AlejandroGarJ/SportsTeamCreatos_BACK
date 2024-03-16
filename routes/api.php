<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;
use App\Http\Controllers\PHPMailerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/prueba', function () {
    return json_encode('Hola mundo1');
});



Route::post('/crear-usuario', function (Request $request) {
    $data = $request->all(); // Obtén los datos de la solicitud
    $respuesta = Usuario::crearUsuario($data); // Llama a la función del modelo Usuario

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});

Route::post('/iniciarSesion', function (Request $request) {
    $data = $request->all(); // Obtén los datos de la solicitud
    $respuesta = Usuario::iniciarSesion($data); // Llama a la función del modelo Usuario

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});

//Correo de cambio contraseña


Route::post('/cambiarContrasena', function (Request $request) {
    $data = $request->all(); // Obtén los datos de la solicitud
    $respuesta = PHPMailerController::store($data); // Llama a la función del modelo Usuario

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});


Route::post('/clubesUsuario', function (Request $request) {
    $data = $request['DNI'];
    $respuesta = Usuario::obtenerClubes($data);

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});

Route::post('/crearClub', function (Request $request) {
    $data = $request->all(); // Obtén los datos de la solicitud
    $respuesta = Usuario::crearClub($data); // Llama a la función del modelo Usuario

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});

Route::post('/unirseAClub', function (Request $request) {
    $data = $request->all(); // Obtén los datos de la solicitud
    $respuesta = Usuario::unirseAClub($data); // Llama a la función del modelo Usuario

    return response()->json($respuesta); // Devuelve la respuesta como JSON
});