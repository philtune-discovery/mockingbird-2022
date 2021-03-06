<?php

use App\Http\Controllers\{AdvertiserController,
    CampaignController,
    DeliverableController,
    ImageController,
    ProjectController
};
use Illuminate\Support\Facades\Redirect;
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

Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('advertisers', AdvertiserController::class)
//         ->parameter('advertisers', 'tag:slug')
    ;
    Route::get('advertisers/{advertiser}/campaigns/create', [AdvertiserController::class, 'create_campaign'])
         ->name('advertisers.create_campaign');
    Route::put('advertisers/{advertiser}/campaigns', [AdvertiserController::class, 'store_campaign'])
         ->name('advertisers.store_campaign');

    Route::resource('campaigns', CampaignController::class);
    Route::get('campaigns/{campaign}/projects/create', [CampaignController::class, 'create_project'])
         ->name('campaigns.create_project');
    Route::put('campaigns/{campaign}/projects', [CampaignController::class, 'store_project'])
         ->name('campaigns.store_project');

    Route::resource('projects', ProjectController::class);

    Route::resource('images', ImageController::class);

    Route::resource('deliverables', DeliverableController::class);

});

require __DIR__ . '/auth.php';
