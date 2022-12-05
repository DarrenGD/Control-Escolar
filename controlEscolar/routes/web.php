<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControlEstudiantesController;
use App\Http\Controllers\PagosAdminController;
use App\Http\Controllers\AdminFormController;
use App\Http\Controllers\Auth\AuthController;


/**
 * Correr el siguiente comando en la consola para ver las rutas
 *
 * php artisan route:list
 */

Route::get('/', function () {
    return redirect()->route('adminForm.index');
})->name('index')->middleware(['auth:root']);


/**
 * Auth biblioteca
 */
Route::prefix('auth')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:root');

/**
 * Documentacion de la Ruta y Controller resource
 *
 * https://laravel.com/docs/8.x/controllers#resource-controllers
 */

    Route::resource('adminpagos', PagosAdminController::class)->except('show')->parameters([
        'adminpagos' => 'adminpagos'
        ])->middleware('auth:root');
    Route::put('adminpagos/togglestatus/{adminpagos}', [PagosAdminController::class, 'toggleStatus'])->name('adminpagos.toggle.status')->middleware(['auth:root']);

    Route::resource('adminForm', AdminFormController::class)->except('show')->parameters([
        'adminForm' => 'adminForm'
        ])->middleware('auth:root');

    Route::get('usuario/perfil', [AdminController::class, 'perfil'])->middleware('auth:root')->name('perfil');
    Route::put('updatepassword/{id}', [AdminController::class, 'updatepassword'])->name('updatepassword');
    Route::put('updatefoto/{id}', [AdminController::class, 'updatefoto'])->name('updatefoto');

//-------------------------------Reportes Alumnos---------------------------------------
Route::get('consulta', [ControlEstudiantesController::class, 'consulta'])->name('consulta')->middleware('auth:root');
Route::get('contenido', [ControlEstudiantesController::class, 'contenido'])->name('contenido')->middleware('auth:root');
Route::get('detalle_carreras/{id}/{idce}',[ControlEstudiantesController::class, 'detalle_carreras'])->name('detalle_carreras')->middleware('auth:root');
Route::get('detalle_grupos/{id}',[ControlEstudiantesController::class, 'detalle_grupos'])->name('detalle_grupos')->middleware('auth:root');
Route::get('regresar/{idce}', [ControlEstudiantesController::class, 'regresar'])->name('regresar')->middleware('auth:root');