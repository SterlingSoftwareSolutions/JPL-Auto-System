<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplianceController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\SupplierController;
use App\Models\SpecificationCategory;
use App\Models\VehicleSpecification;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.signin');
});

Route::get('/wel', function () {
    return view('welcome');
});

Route::get('/symlink', function () {
    Artisan::call('storage:link');
    return 'Storage link created!';
});

//database migration
Route::get('/migrate-db/{key}', function ($key) {
    abort_if($key !== 'nawodi123@2026', 403);

   Artisan::call('migrate', [
        '--force' => true,
    ]);

    return 'Migration completed!';
});

//database seeder run
Route::get('/seed-only/{key}', function ($key) {

    abort_if($key !== 'nawodi123@2026', 403);

    $seeders = [
        // 'SupplierSeeder',
        // 'CarDataSeeder',
        'VehicleInformationSeeder',
        // 'VehicleSpecificationSeeder',
        //'BuildProcessSeeder',
        // 'VehicleDataSeeder',
        // 'SupplierVehicleSeeder',
        'VehicleSpecificationSeeder',
    ];

    foreach ($seeders as $seeder) {
        Artisan::call('db:seed', [
            '--class' => $seeder,
            '--force' => true,
        ]);
    }

    return 'Selected seeders executed!';
});

//tinker
Route::get('/clear-specifications/{key}', function ($key) {

    abort_if($key !== 'nawodi123@2026', 403);

    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    SpecificationCategory::truncate();
    VehicleSpecification::truncate();

    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    return 'Specification tables cleared successfully.';
});

//auth routes
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::post('forget-password', [MailController::class, 'forgetpassword'])->name('forget-password');
Route::get('reset-password', [MailController::class, 'resetpassword'])->name('reset-password');
Route::get('reset-password-page/{token}', [MailController::class, 'resetpasswordpage'])->name('reset-password-page');
Route::post('reset', [MailController::class, 'reset'])->name('reset');


Route::get('/forget-password', function () {
    return view('auth.forgetpassword');
})->name('forget-password');



Route::middleware('auth:sanctum')->group(function () {


    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Vehicles
    Route::get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.index');
    Route::post('/vehicles', [App\Http\Controllers\VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles/{id}/report', [App\Http\Controllers\VehicleController::class, 'report'])->name('vehicles.report');
    Route::post('/vehicles/{id}/builds', [App\Http\Controllers\VehicleController::class, 'storeBuild'])->name('vehicles.builds.store');
    Route::post('/vehicles/{id}/compliance', [\App\Http\Controllers\ComplianceController::class, 'updateVehicleCompliance'])->name('vehicles.compliance.update');
    Route::post('/vehicles/{id}/model-report-approvals', [\App\Http\Controllers\VehicleController::class, 'storeModelReportApproval'])->name('vehicles.model-report-approvals.store');
    Route::delete('/vehicles/model-report-approvals/{id}', [\App\Http\Controllers\VehicleController::class, 'destroyModelReportApproval'])->name('vehicles.model-report-approvals.destroy');
    Route::post('/builds/{id}/steps/{stepId}/toggle', [\App\Http\Controllers\VehicleController::class, 'toggleStep']);
    Route::post('/builds/{id}/steps/{stepId}/image', [\App\Http\Controllers\VehicleController::class, 'uploadStepImage']);
    Route::post('/builds/{id}/steps/{stepId}/data-entry', [\App\Http\Controllers\VehicleController::class, 'saveDataEntry']);
    Route::post('/builds/{id}/qc/{qcId}', [\App\Http\Controllers\VehicleController::class, 'saveQc']);
    Route::post('/builds/{id}/signoff/{signoffId}', [\App\Http\Controllers\VehicleController::class, 'saveSignoff']);
    Route::post('/builds/{id}/signoff/{signoffId}/clear', [\App\Http\Controllers\VehicleController::class, 'clearSignoff']);
    Route::put('/builds/{id}', [App\Http\Controllers\VehicleController::class, 'updateBuild']);
    Route::delete('/builds/{id}', [App\Http\Controllers\VehicleController::class, 'destroyBuild']);
    Route::post('/vehicles/{id}/parts', [App\Http\Controllers\VehicleController::class, 'storeModelPart']);
    Route::delete('/vehicles/parts/{id}', [App\Http\Controllers\VehicleController::class, 'destroyModelPart']);
    Route::put('/vehicles/parts/{id}', [App\Http\Controllers\VehicleController::class, 'updateModelPart']);
    Route::post('/builds/{id}/parts', [App\Http\Controllers\VehicleController::class, 'storeBuildPart']);
    Route::put('/builds/parts/{id}/status', [App\Http\Controllers\VehicleController::class, 'updateBuildPartStatus']);
    Route::post('/builds/{id}/timeline-tasks', [App\Http\Controllers\VehicleController::class, 'storeTimelineTask']);
    Route::put('/builds/timeline-tasks/{id}', [App\Http\Controllers\VehicleController::class, 'updateTimelineTask']);
    Route::delete('/builds/timeline-tasks/{id}', [App\Http\Controllers\VehicleController::class, 'destroyTimelineTask']);
    // production system
    Route::get('/vehicle-details', [App\Http\Controllers\VehicleDetailsController::class, 'index'])->name('vehicledetailspage');
    Route::post('/vehicle-images/upload', [App\Http\Controllers\VehicleImageController::class, 'upload'])->name('vehicleimages.upload');
    Route::delete('/vehicle-images/remove', [App\Http\Controllers\VehicleImageController::class, 'remove'])->name('vehicleimages.remove');

    Route::get('/working-structions', function () {
        return view('pages.productionsystem.workingstructions');
    })->name('workingstructions');

    Route::get('/build-procedure', function () {
        return view('pages.productionsystem.buildprocedure');
    })->name('buildprocedure');

    Route::get('/build-system', [\App\Http\Controllers\BuildSystemController::class, 'index'])->name('buildpage');
    Route::post('/build-system/tasks', [\App\Http\Controllers\BuildSystemController::class, 'store']);
    Route::put('/build-system/tasks/{id}', [\App\Http\Controllers\BuildSystemController::class, 'update']);
    Route::delete('/build-system/tasks/{id}', [\App\Http\Controllers\BuildSystemController::class, 'destroy']);

    // Route::get('/partslist', function () {
    //     return view('pages.productionsystem.partlistpage');
    // })->name('partlistpage');



    //Supplier Controller
    Route::post('savepartlist', [SupplierController::class, 'savepartlist'])->name('storagesupplier');
    Route::get('/suppliers', [SupplierController::class, 'getsupplier'])->name('supplierspage');
    Route::delete('/delete/{id}', [SupplierController::class, 'destroy'])->name('deletesupplier');
    Route::delete('/timeline/{id}', [\App\Http\Controllers\VehicleController::class, 'destroyTimelineTask'])->name('timeline.destroy');



    Route::put('/builds/{id}/steps/{stepId}/toggle', [\App\Http\Controllers\VehicleController::class, 'toggleStep']);
    Route::post('/builds/{id}/steps/{stepId}/image', [\App\Http\Controllers\VehicleController::class, 'uploadStepImage']);

    // Build Process API — master template + live build state
    Route::prefix('api')->group(function () {
        // Master template (belongs to vehicle, read-only for builds)
        Route::get('/vehicles/{vehicleId}/build-process', [\App\Http\Controllers\BuildProcessController::class, 'masterTemplate']);

        // Live build state (per commissioned build)
        Route::get('/builds/{buildId}/process-state',                    [\App\Http\Controllers\BuildProcessController::class, 'buildState']);
        Route::get('/builds/{buildId}/progress',                         [\App\Http\Controllers\BuildProcessController::class, 'progress']);
        Route::post('/builds/{buildId}/steps/{stepId}/toggle',           [\App\Http\Controllers\BuildProcessController::class, 'toggleStep']);
        Route::post('/builds/{buildId}/steps/{stepId}/image',            [\App\Http\Controllers\BuildProcessController::class, 'uploadStepImage']);
        Route::delete('/builds/{buildId}/steps/{stepId}/image',          [\App\Http\Controllers\BuildProcessController::class, 'removeStepImage']);
        Route::post('/builds/{buildId}/qc/{qcId}',                       [\App\Http\Controllers\BuildProcessController::class, 'saveQc']);
        Route::post('/builds/{buildId}/signoff/{signoffId}',             [\App\Http\Controllers\BuildProcessController::class, 'saveSignoff']);
        Route::delete('/builds/{buildId}/signoff/{signoffId}',           [\App\Http\Controllers\BuildProcessController::class, 'removeSignoff']);
        Route::post('/builds/{buildId}/operations/{opId}/notes',         [\App\Http\Controllers\BuildProcessController::class, 'saveOperationNote']);
        Route::post('/builds/{buildId}/operations/{opId}/diagram',       [\App\Http\Controllers\BuildProcessController::class, 'uploadOperationDiagram']);

        // Master template image uploads (admin only — updates blueprint, visible to all builds)
        Route::post('/master/steps/{stepId}/image',       [\App\Http\Controllers\BuildProcessController::class, 'uploadMasterStepImage']);
        Route::delete('/master/steps/{stepId}/image',     [\App\Http\Controllers\BuildProcessController::class, 'removeMasterStepImage']);
        Route::post('/master/operations/{opId}/diagram',  [\App\Http\Controllers\BuildProcessController::class, 'uploadMasterDiagram']);
        Route::delete('/master/operations/{opId}/diagram', [\App\Http\Controllers\BuildProcessController::class, 'removeMasterDiagram']);
    });


    // Vehicle CRUD
    Route::put('/vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'update'])->name('vehicles.update');
    Route::delete('/vehicles/{id}', [\App\Http\Controllers\VehicleController::class, 'destroy'])->name('vehicles.destroy');

    // get supplier
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('create');
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('show');

    //part list
    Route::get('/partslist', [PartController::class, 'index'])->name('partlistpage');
    Route::post('/partslist/add', [PartController::class, 'addpart'])->name('addpart');



    // customers
    Route::get('/customers-customerlist', [App\Http\Controllers\CustomerController::class, 'index'])->name('customerlist');
    Route::post('/customers-customerlist', [App\Http\Controllers\CustomerController::class, 'store'])->name('customerstore');

    Route::post('/compliance/store', [ComplianceController::class, 'storeCompliance'])->name('compliance.store');
    Route::get('/compliance', [ComplianceController::class, 'showComplianceForm'])->name('compliancepage');


    //ajax get category
    Route::get('/components/{categoryId}', [PartController::class, 'getComponentsByCategory']);


    //page expired view and page unauthorized toke page view
    Route::get('/unauthorized', [MailController::class, 'unauthorizedtoke'])->name('unauthorized');
    Route::get('/pageexpired', [MailController::class, 'pageexpired'])->name('pageexpired');


});


