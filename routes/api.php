<?php

use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LimiteController;
use App\Http\Controllers\Padron\JRVController;
use App\Http\Controllers\Padron\EleccionController;
use App\Http\Controllers\Padron\CantonController;
use App\Http\Controllers\Padron\CircunscripcionController;
use App\Http\Controllers\Padron\DistritoController;
use App\Http\Controllers\Padron\PadronElectoralController;
use App\Http\Controllers\Padron\PaisController;
use App\Http\Controllers\Padron\ParroquiaController;
use App\Http\Controllers\Padron\ProvinciaController;
use App\Http\Controllers\Padron\RecintoController;
use App\Http\Controllers\Padron\ZonaController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\PermisoRolController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SuerteController;
use App\Http\Controllers\TerritorioController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VoluntarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [UsuarioController::class, 'login'])->name('login');
Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('rol', RolController::class);
    Route::resource('usuario', UsuarioController::class);
    Route::resource('rifa', RifaController::class);
    Route::resource('limite', LimiteController::class);
    Route::resource('suerte', SuerteController::class);
    Route::resource('ticket', TicketController::class);


    Route::get('rifas/activas', [RifaController::class, 'rifasActivas']);
    Route::post('usuario/restablecer-password', [UsuarioController::class, 'restablecerPassword']);
    Route::get('ticket/conteo-vendidos/{fecha}/{numero}/{rifa_id}', [TicketController::class, 'conteoVendidos']);
    Route::get('ticket/ticketVendidos/{fechaVenta}',[TicketController::class, 'ticketVendidos']);
    Route::get('ticket/contabilidad/{fecha}',[TicketController::class, 'contabilidad']);
    Route::get('ticket/validar-ticket/{codigoTicket}/{fecha}',[TicketController::class, 'validarTicket']);
    
    
});