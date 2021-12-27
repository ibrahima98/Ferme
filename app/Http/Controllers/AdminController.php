<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Commande;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        # code...
        return view('admin.dashboard');
    }
    public function commande()
    {
        # code...
        $commandes=Commande::get();

       /* $commandes->transform(function($commandes, $key){

            $commandes->panier= unserialize($commandes->panier);

            return $commandes->panier;
        });*/

        return view('admin.commande')->with('commandes', $commandes);
    }
}
