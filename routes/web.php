<?php
use App\Models\GstBill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\VendorInvoice;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\GstBillController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

# Index page
Route::get('/', [AppController::class,'index']);


# party routes
Route::get('/add-party', [PartyController::class,'addParty'])->name('add-party');
Route::post('/create-party', [PartyController::class, 'createParty'])->name('create-party');
Route::get('/manage-parties', [PartyController::class,'index'])->name('manage-parties');
Route::get('/edit-party/{id}', [PartyController::class,'editParty'])->name('edit-party');
Route::put('/update-party/{id}', [PartyController::class,'updateParty'])->name('update-party');
//Route::delete('/delete-party/{party}', [PartyController::class, 'deleteParty'])->name('delete');
Route::post('delete-party', [PartyController::class,'deleteParty'])->name('delete-party');

# GST bill routes
Route::get('/add-gst-bill', [GstBillController::class,'addGstBill'])->name('add-gst-bill');
Route::get('/manage-gst-bills', [GstBillController::class,'index'])->name('manage-gst-bills');
Route::get('/edit-gst-bill/{id}', [GstBillController::class,'editGstBill'])->name('edit-gst-bill');
Route::put('/update-gst-bill/{id}', [GstBillController::class,'updateGstBill'])->name('update-gst-bill');
Route::get('/print-gst-bill/{id}', [GstBillController::class,'print'])->name('print-gst-bill');
Route::post('/create-gst-bill', [GstBillController::class,'createGstBill'])->name('create-gst-bill');

// Soft Delete route
Route::get('/delete/{table}/{id}', [GstBillController::class,'delete'])->name('delete');

// Resource Controller routes
Route::resource('vendor-invoice',VendorInvoice::class)->names([
    'index' => 'vendor.index',
    'create' => 'vendor.create',
    'store' => 'vendor.store',
    'show' => 'vendor.show'
]);



// # Route with parameter
// Route::get('/about/{paramname}', [AppController::class,'about']);

// # Route with optional parameter
// // Route::get('/services/{paramname?}', function (){
// //     return "<h1> Hello from Services </h1>";
// // });
// Route::get('/services/{paramname?}', [AppController::class,'services']);

// Route::get('/demo', [AppController::class,'demo']);
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
