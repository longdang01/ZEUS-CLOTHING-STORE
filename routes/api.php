<?php

use App\Http\Controllers\api\apiStatistic;
use App\Http\Controllers\api\apiUpload;
use App\Http\Controllers\api\BrandController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CartDetailController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\ColorController;
use App\Http\Controllers\api\CustomerController;
use App\Http\Controllers\api\NewsController;
use App\Http\Controllers\api\OrdersController;
use App\Http\Controllers\api\OrdersDetailController;
use App\Http\Controllers\api\OrdersStatusController;
use App\Http\Controllers\api\PaymentController;
use App\Http\Controllers\api\PositionController;
use App\Http\Controllers\api\PriceController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\RoleController;
use App\Http\Controllers\api\SizeController;
use App\Http\Controllers\api\StaffController;
use App\Http\Controllers\api\StockController;
use App\Http\Controllers\api\SubCategoryController;
use App\Http\Controllers\api\SupplierController;
use App\Http\Controllers\api\TransportController;
use App\Http\Controllers\api\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('products', ProductController::class);



Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubCategoryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('users', UsersController::class);   
Route::resource('carts', CartController::class);
Route::resource('cartdetails', CartDetailController::class);
Route::resource('transports', TransportController::class);
Route::resource('payments', PaymentController::class);
Route::resource('orderss', OrdersController::class);
Route::resource('ordersDetails', OrdersDetailController::class);

Route::get('product/get-products', [ProductController::class, 'getProducts']);
Route::get('product/get-new', [ProductController::class, 'getNew']);
Route::get('product/get-best-seller', [ProductController::class, 'getBestSeller']);
Route::get('cart/get-cart/{customer}', [CartController::class, 'getCart']);
Route::get('orders/get-orders/{customer}', [OrdersController::class, 'getOrders']);


Route::resource('brand',BrandController::class);
Route::resource('price',PriceController::class);
Route::resource('supplier',SupplierController::class);
Route::resource('color',ColorController::class);
Route::resource('size',SizeController::class);
Route::resource('product',ProductController::class);
Route::resource('orders_status',OrdersStatusController::class);
Route::resource('staff',StaffController::class);
Route::resource('position',PositionController::class);
Route::resource('role',RoleController::class);
Route::resource('news',NewsController::class);
Route::post('upload',[apiUpload::class, "uploadFile"]);
Route::post('user/getbyusername',[UsersController::class, "GetbyUsername"]);
Route::post('customers/get-customer', [CustomerController::class, 'getCustomers']);
//statistic
Route::post('statistic/getTopCustomer', [apiStatistic::class, 'getTopCustomer']);
Route::post('statistic/getTopProduct', [apiStatistic::class, 'getTopProduct']);
Route::post('statistic/getNewProducts', [apiStatistic::class, 'getNewProducts']);
Route::post('statistic/getNewOrders', [apiStatistic::class, 'getNewOrders']);
Route::post('statistic/getNewCustomers', [apiStatistic::class, 'getNewCustomers']);
Route::post('statistic/getOrderRate', [apiStatistic::class, 'getOrderRate']);
Route::resource('stocks', StockController::class);

