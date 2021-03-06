<?php

use App\Http\Controllers\AnalyticController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeniedController;
use App\Http\Controllers\HfRolesController;
use App\Http\Controllers\HfUsersController;
use App\Http\Controllers\HfJamathController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HfContactTypeController;
use App\Http\Controllers\HfDistrictController;
use App\Http\Controllers\HfFamilyController;
use App\Http\Controllers\HfFamilyMemberAcademyMajorController;
use App\Http\Controllers\HfFamilyMemberController;
use App\Http\Controllers\HfFamilyReportController;
use App\Http\Controllers\HfLanguageController;
use App\Http\Controllers\HfReligionController;
use App\Http\Controllers\HfShelterController;
use App\Http\Controllers\HfStateController;
use App\Http\Controllers\HfTalukController;
use App\Http\Controllers\MixController;
use App\Http\Controllers\RationCardTypeController;
use App\Models\Denied;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

],
    function ($router) {

        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::post('me', [AuthController::class, 'me']);
    }
);

// resource api's
Route::apiResource('hfRoles', HfRolesController::class );
Route::apiResource('hfUsers', HfUsersController::class );
Route::apiResource('hfJamaths', HfJamathController::class );
Route::apiResource('hfContactTypes', HfContactTypeController::class );
Route::apiResource('hfShelters', HfShelterController::class );
Route::apiResource('hfLanguages', HfLanguageController::class );
Route::apiResource('hfReligions', HfReligionController::class );
Route::apiResource('hffamilies', HfFamilyController::class);
Route::apiResource('family-members', HfFamilyMemberController::class);
Route::apiResource('family-reports',HfFamilyReportController::class);
Route::apiResource('hfAcademy-majors', HfFamilyMemberAcademyMajorController::class);
Route::apiResource('access-denied',DeniedController::class);
Route::apiResource('state',HfStateController::class);
Route::apiResource('district',HfDistrictController::class);
Route::apiResource('taluk',HfTalukController::class);

// api's
Route::post('upload', [FileUploadController::class, 'upload'] );
Route::get('files', [FileUploadController::class, 'files'] );
Route::get('rationCardTypes', [RationCardTypeController::class, 'index']);
Route::get('shelterTypes', [MixController::class, 'shelterTypeList']);
Route::get('shelterOwnerships', [MixController::class, 'shelterOwnershipList']);
Route::post('analytics',[AnalyticController::class, 'dashboard']);
Route::get('state-district/{id}', [HfStateController::class, 'districts']);
Route::get('district-taluk/{id}', [HfDistrictController::class, 'taluks']);
Route::get('taluk-jamath/{id}', [HfJamathController::class, 'jamaths']);
Route::get('user-list/{id}', [HfUsersController::class, 'userList']);
Route::post('denied-access-list/', [DeniedController::class, 'deniedAccess']);
