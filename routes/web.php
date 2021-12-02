<?php

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
//differents page de l'utilisateur
Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/panier', 'ClientController@panier');
Route::get('/paiement', 'ClientController@paiement');
Route::get('/client_login', 'ClientController@client_login');
Route::get('/signup', 'ClientController@signup');
//page administrateur
Route::get('/admin', 'AdminController@dashboard');
Route::get('/commande', 'AdminController@commande');

//differents route qui gère la fonctionnalité categorie
Route::get('/ajoutercategorie', 'CategorieController@ajouterCategorie');
Route::post('/sauvercategorie', 'CategorieController@sauverCategorie');
Route::get('/categorie', 'CategorieController@categorie');
Route::get('/editcategorie/{id}', 'CategorieController@editCategorie');
Route::post('/modifiercategorie', 'CategorieController@modifierCategorie');
Route::get('/suprimercategorie/{id}', 'CategorieController@suprimerCategorie');


//ajouter produit
Route::get('/ajouterproduit', 'ProductController@ajouterProduit');
Route::post('/sauverproduit', 'ProductController@sauverProduit');
Route::get('/produit', 'ProductController@Produit');
Route::get('/editproduit/{id}', 'ProductController@editProduit');
Route::post('/modifierproduit', 'ProductController@modifierProduit');
Route::get('/suprimerproduit/{id}', 'ProductController@suprimerProduit');
Route::get('/activerproduit/{id}', 'ProductController@activerProduit');
Route::get('/desactiverproduit/{id}', 'ProductController@desactiverProduit');

//ajouter slider
Route::get('/ajouterslider', 'SliderController@ajouterSlider');
Route::post('/sauverslider', 'SliderController@sauverSlider');
Route::get('/slider', 'SliderController@Slider');
Route::post('/sauverslider', 'SliderController@sauverSlider');
Route::get('/editslider/{id}', 'SliderController@editSlider');
Route::post('/modifierslider', 'SliderController@modifierSlider');
Route::get('/suprimerslider/{id}', 'SliderController@suprimerSlider');
Route::get('/activerslider/{id}', 'SliderController@activerSlider');
Route::get('/desactiverslider/{id}', 'SliderController@desactiverSlider');