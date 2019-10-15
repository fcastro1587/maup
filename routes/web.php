<?php

Route::middleware(['auth'])->group(function() {

Route::resource('users', 'Admin\UserController', ['except' => ['create', 'store']]);
                                                                        //Users
Route::resource('roles', 'Admin\RoleController');                       //Roles

Route::get('/', 'HomeController@index')->name('index');      //pagina principal

Route::resource('viaje', 'Admin\HomeController', ['except' => ['destroy']]);                      //Viaje

Route::resource('bloqueos', 'Admin\BloqueoController',  ['except' => ['show', 'destroy', 'store', 'create']]);
                                                                    //bloqueos
Route::get('alert', 'Admin\HomeController@alert')->name('alert.alert')
    ->middleware('permission:alert.alert');                            //Alert

Route::resource('tours',     'Admin\ToursController', ['except' => ['show']]); //tours
Route::resource('rooms',     'Admin\RoomsController', ['except' => ['show', 'destroy']]); //Rooms
Route::resource('city',      'Admin\CityController',  ['except' => ['show']]); //city
Route::resource('visas',     'Admin\VisasController', ['except' => ['show']]); //visas

/*Route::get('seasons',        'Admin\SeasonsController@list')->name('season.index')
    ->middleware('permission:season.index');                //temporadas list
Route::get('seasons/{code}',              'Admin\SeasonsController@vie')->name('seasons.vie')
    ->middleware('permission:seasons.vie');                  //temporadas ver*/

Route::resource('department',             'Admin\DepartmentController', ['except' => 'destroy', 'show']);
Route::get('department/{id}/list',        'Admin\DepartmentController@list')->name('department.list')
    ->middleware('permission:department.list');                   //department

Route::resource('season_travel',          'Admin\SeasonTravelController', ['except' => ['destroy', 'show']]);
Route::get('season_travel/{season}/list', 'Admin\SeasonTravelController@list')->name('seasontravel.list')
    ->middleware('permission:seasontravel.list');       //slider por temporada

Route::resource('carousel',               'Admin\CarouselController', ['except' => ['destroy', 'show', 'create']]);
Route::get('carousel/{col}/createv',     'Admin\CarouselController@createv')->name('carousel.createv'); //esta ruta replasaria a la de create
Route::get('carousel/{code}/list',        'Admin\CarouselController@list')->name('carousel.list');              //caousel por depto

Route::resource('main',                   'Admin\MainCarouselController', ['except' => ['destroy', 'show']]);
                                                            //Slider principal
Route::resource('recommend',              'Admin\RecommendedController',  ['except' => ['destroy', 'show']]);
                                            //programa recomendado por destino
Route::resource('offers',                  'Admin\OffersController',      ['except' => ['show', 'destroy']]);
                                                             //oferta especial
Route::resource('congratulations',         'Admin\CongratulationsController', ['except' => ['show']]);
                                                              //felicitaciones
Route::resource('filters',                 'Admin\FiltersController');
                                                //divisiones por pais o ciudad
Route::resource('revistas',                'Admin\RevistasController');
                                                                      //Revistas
Route::get('admintc', 'Admin\AdminTController@admin')->name('admintc.admin')
     ->middleware('permission:admintc.admin');                //Tipo de Cambio

Route::resource('file',                    'Admin\FileController');
Route::resource('files-ajax',              'Admin\FilesController');
Route::get('file/{var}/createfile',        'Admin\FileController@createfile')->name('file.createfile'); //esta ruta replasaria a la de create
Route::get('files/{var}/createupload',     'Admin\FilesController@createupload')->name('files.createupload'); //solo subira archivos





//images
Route::resource('upload-files',                   'Admin\UploadFilesController');  //bueno
Route::get('upload-files/megaofertas/{var}',      'Admin\UploadFilesController@megaofertas')->name('upload-files.megaofertas');  //megaofertas

Route::get('detalle',                             'Admin\UploadFilesController@indexdetalle')->name('uploadfiles.indexdetalle');
Route::get('upload-files/detalle/{var}',          'Admin\UploadFilesController@detalle')->name('upload-files.detalle');  //detalle

Route::get('panoramic',                             'Admin\UploadFilesController@indexpanoramic')->name('uploadfiles.indexpanoramic');
Route::get('upload-files/panoramic/{var}',          'Admin\UploadFilesController@panoramic')->name('upload-files.panoramic');  //panoramic

Route::get('temporada',                           'Admin\UploadFilesController@indextemporada')->name('uploadfiles.indextemporada');
Route::get('upload-files/temporadas/{var}',       'Admin\UploadFilesController@temporadas')->name('upload-files.temporadas');  //temporada 

Route::get('blq',                          'Admin\UploadFilesController@indexblq')->name('uploadfiles.indexblq');
Route::get('upload-files/blq/{var}',       'Admin\UploadFilesController@blq')->name('upload-files.blq');  //bloqueo

Route::get('fav',                           'Admin\UploadFilesController@indexfav')->name('uploadfiles.indexfav');
Route::get('upload-files/fav/{var}',       'Admin\UploadFilesController@fav')->name('upload-files.fav');  //favoritos

Route::get('recommended',                           'Admin\UploadFilesController@indexrecommended')->name('uploadfiles.indexrecommended');
Route::get('upload-files/recommended/{var}',       'Admin\UploadFilesController@recommended')->name('upload-files.recommended');  //favoritos
});

Route::get('upload-files/destro/{id}',            'Admin\UploadFilesController@destro')->name('upload-files.destro');//para temporadas travel
Route::get('upload-files/destromt/{id}',          'Admin\UploadFilesController@destromt')->name('upload-files.destromt');//para detalle
Route::get('upload-files/destropanoramic/{id}',   'Admin\UploadFilesController@destropanoramic')->name('upload-files.destropanoramic');//para detalle
Route::get('upload-files/destrorecomended/{id}',  'Admin\UploadFilesController@destrorecomended')->name('upload-files.destrorecomended');//para detalle




//ajax datatables viaje
Route::get('alert/datalert',          'Admin\HomeController@datalert')->name('datalert.datalert');
Route::get('role/viaje',              'Admin\HomeController@viaje')->name('viaje.viaje');
Route::get('bloqueo/mt',              'Admin\BloqueoController@mt')->name('mt.mt');
Route::get('congratulation/congra',   'Admin\CongratulationsController@congra')->name('congra.congra');
Route::get('select/dataremote-load',  'Admin\HomeController@load')->name('load.load');
Route::get('select/dataremote',       'Admin\HomeController@img')->name('img.img');
Route::get('offers/dataoffer',        'Admin\OffersController@dataoffer')->name('dataoffer.dataoffer');
Route::get('city/datacity',           'Admin\CityController@datacity')->name('datacity.datacity');



//envio de tipo de cambio
Route::post('admintc/sendtc', 'Admin\AdminTController@FormTC')->name('FormTC.send');

/*route for dowload pdf*/
Route::get('pdf/creapdf.php',                   'Admin\PdfController@pdf')->name('pdf.pdf');

/*aun no estan en manager, pero ya existe la db*/
Route::resource('toptravels',                  'Admin\TopTravelController');
Route::get('api/toptravels',                   'Admin\TopTravelController@apitoptravels')->name('api.toptravels');


/*libres*/
Route::get('/filters/{name}/{city}',           'Admin\FiltersController@show_city')->name('filters.show_city');
Route::get('/cities/{id}',                     'Admin\HomeController@countries');
Route::get('/filter/{id}',                     'Admin\HomeController@destination');
Route::get('imagepanoramic/{panoramic}',       'Admin\HomeController@panoramica')->name('panoramica');
Route::get('rangeoper/{clv}',                  'Admin\HomeController@range');
Route::get('filtercountry/{cont}',             'Admin\DepartmentController@cont');
Route::get('filterec/{ec}',                    'Admin\HomeController@mtec');
Route::get('filters_sections/{filters_eumcp}', 'Admin\HomeController@filters_sections');
Route::get('tours_opc/{tourmt}',               'Admin\HomeController@toursmt');

/*API*/
Route::get('/tester',                            'HomeController@ApiTest')->name('ApiTest');
Route::get('/tester/destination/{destination}',  'HomeController@ApiTest')->name('ApiTest');
Route::get('/tester/countries/{coleccountries}', 'HomeController@ApiTest')->name('ApiTest');
Route::get('/tester/cities/{coleccities}',       'HomeController@ApiTest')->name('ApiTest');
Route::get('/tester/keyword/{keyword}',          'HomeController@ApiTest')->name('ApiTest');
Route::get('/tester/{mt}',                       'HomeController@ApiTest')->name('ApiTest');


/*url mega conexion*/
Route::group(['prefix' => 'tools'], function() {
Route::match(array('get', 'post'),'vi.php',       'Admin\IframeController@vi')->name('vi.vi');
Route::get('circuito.php',                        'Admin\IframeController@Circuito');
Route::get('ofertas-viaje.php',                   'Admin\IframeController@Ofertasblq')->name('Ofertasblq.Ofertasblq');
});


/*pendiente por implementar*/
Route::get('/programa/{id}/status', ['as' => 'panel.programa.status', 'uses' => 'Admin\HomeController@status']);
