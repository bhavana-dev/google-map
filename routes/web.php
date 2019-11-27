<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//(created by Bhavana)For Maps
Route::prefix('mapRoute')->group(function () {

    //Drawing manager with nearby place within shapes
    Route::get('/map_integration', 'MapController@index');

    // Route::get('/places_search', 'MapController@places_search');

    //To show cluster and add dynamic marker ,change cluster count and image 
    Route::get('/cluster', 'MapController@cluster');

    //route to get address using latitude and longitude
    Route::get('/reverse_geocoding', 'MapController@reverse_geocoding');

    //To get current lat-long
    Route::get('/navigator', 'MapController@navigator');

    //Calculate distance between two address
    Route::get('/distance', 'MapController@distance');

    //Draw rectangle boundary around markers
    Route::get('/indexMap', 'MapController@indexMap');

    // Another example to Draw rectangle boundary around markers
    Route::get('/google_Example', function(){
        return view('maps/google_Example');
    });

    //(google example) route for moving marker between two points 
    Route::get('/demoRoute', function(){
        return view("maps/demoRoute");
    });

    // route for showing suggation with limited bound
    Route::get('/autocomplete', function(){
        return view("maps/autocomplete");
    });

    //route for showing marker , cluster according to nearby change , drawing manager
    Route::get('/api_test', function(){
        return view("maps/test_area");
    });
    //route for moving marker between two points 
    Route::get('/get/direction', 'MapController@GetDirection');

});

//ES6 javascript routes
//For Js filter ,find
Route::prefix('ES6')->group(function () {

    Route::get('/jsExample', 'JsController@index');

    //Seacrh Find
    Route::get('/example2', 'JsController@example2');

    //Every and Some function
    Route::get('/example3', 'JsController@example3');

    //Reduce function
    Route::get('/example4', 'JsController@example4');

    //For  function
    Route::get('/example5', 'JsController@example5');

    //Fat Arrow function
    Route::get('/example6', 'JsController@example6');

    //Fat Arrow function
    Route::get('/example7', 'JsController@example7');

    //Template string or Template Literals
    Route::get('/example8', 'JsController@example8');

    //Template string or Template Literals3 and Literals4
    Route::get('/example9', 'JsController@example9');

    //Template string or Template Literals4
    Route::get('/example10', 'JsController@example10');

    //Helper forech
    Route::get('/example11', 'JsController@example11');

    //Helper forech other
    Route::get('/example12', 'JsController@example12');

    //Helper Map 
    Route::get('/example13', 'JsController@example13');

    //Object Literals
    Route::get('/example14', 'JsController@example14');
    //Default Arguments
    Route::get('/example15', 'JsController@example15');
    //Rest Operator and Spread 
    Route::get('/example16', 'JsController@example16');
    //Class
    Route::get('/example17', 'JsController@example17');
    //Destructing
    Route::get('/example18', 'JsController@example18');
    //Promises and Fetch
    Route::get('/example19', 'JsController@example19');


    Route::get('/getuser/{id}', 'JsController@getUser');
    Route::post('/postuser', 'JsController@postuser');

    //String and Numbers
    Route::get('/example20', 'JsController@example20');
    //Modules
    Route::get('/example21', 'JsController@example21');
    //Generators
    Route::get('/example22', 'JsController@example22');
    Route::get('/example23', 'JsController@example23');

    //Set methods
    Route::get('/example24', 'JsController@example24');
    //Map methods
    Route::get('/example25', 'JsController@example25');

    ////////////////////////////////////////////////
    //Javascript

    Route::get('/script1', 'ScriptController@index');
    Route::get('/script2', 'ScriptController@script2');
    Route::get('/script3', 'ScriptController@script3');
    Route::get('/script4', 'ScriptController@script4');
    Route::get('/script5', 'ScriptController@script5');
    Route::get('/script6', 'ScriptController@script6');
    Route::get('/script7', 'ScriptController@script7');
    Route::get('/script8', 'ScriptController@script8');

    //Underscore.js
    Route::get('/script9', 'ScriptController@script9');

});



Route::get('testOld', function () {	
    event(new App\Events\StatusLiked('Someone'));
    return "Event has been sent!";
});

//Under score Js routes
Route::get('underscorejs/demo1','HomeController@demo1');
Route::get('underscorejs/mvc','HomeController@MVCDemo');

///////////////////////////////////////////////
//MySql Routes
Route::get('/mysql1', 'MysqlController@index');

Route::get('/test', 'PusherNotificationController@test');
Route::get('/test/{id}', 'PusherNotificationController@testWithId');
Route::get('/notification', 'PusherNotificationController@sendNotification');



Route::get('zoap/{key}/server', [
    'as' => 'zoap.server.wsdl',
    'uses' => '\Viewflex\Zoap\ZoapController@server'
]);
Route::post('zoap/{key}/server', [
    'as' => 'zoap.server',
    'uses' => '\Viewflex\Zoap\ZoapController@server'
]);