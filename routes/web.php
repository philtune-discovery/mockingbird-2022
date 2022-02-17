<?php

use App\Http\Controllers\{ClientController,
    CampaignController,
    DeliverableController,
    ImageController,
    ProjectController
};
use Illuminate\Support\Facades\Route;

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
})->middleware('guest')->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('clients', ClientController::class);
Route::get('clients/{client}/campaigns/create', [ClientController::class, 'create_campaign'])
     ->name('clients.create_campaign');
Route::put('clients/{client}/campaigns', [ClientController::class, 'store_campaign'])
     ->name('clients.store_campaign');

Route::resource('campaigns', CampaignController::class);
Route::get('campaigns/{campaign}/projects/create', [CampaignController::class, 'create_project'])
     ->name('campaigns.create_project');
Route::put('campaigns/{campaign}/projects', [CampaignController::class, 'store_project'])
     ->name('campaigns.store_project');

Route::resource('projects', ProjectController::class);

Route::resource('images', ImageController::class);

Route::resource('deliverables', DeliverableController::class);
