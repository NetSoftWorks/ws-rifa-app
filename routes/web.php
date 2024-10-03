<?php

use Illuminate\Support\Facades\Route;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ticket', function () {
    $ticket['codigo'] = "Ticket01";
    $ticket['fecha'] = "23/09/2024";
    $ticket['vendedor'] = "DiegoLM";
    $ticket['numero'] = "031";
    $ticket['valor'] = "1";
    $ticket['premio1'] = "580";
    $ticket['premio2'] = "100";
    $ticket['premio3'] = "25";
    $ticket['premio4'] = "15";
    $ticket['premio5'] = "10";
    $ticket['premio6'] = "10";
    $ticket['premio7'] = "5";
    $qrCode = QrCode::size(200)->generate($ticket['codigo']);

    return view('pdfs/ticket', compact('ticket', 'qrCode'));
});
