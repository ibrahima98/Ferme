<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
   public function home()
   {
       # code...
       return view('client.home');
   }
   public function shop()
   {
       # code...
       return view('client.shop');
   }
   public function panier()
   {
       # code...
       return view('client.cart');
   }
   public function paiement()
   {
       # code...
       return view('client.chekout');
   }
   public function client_login()
   {
       # code...
       return view('client.login');
   }
   public function signup()
   {
       # code...
       return view('client.signup');
   }
   
   
  
   
   

   

}
