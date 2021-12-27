<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Product;
use App\Category;
use App\Cart;
use App\Commande;
use App\Client;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Stripe\Charge;
use Stripe\Stripe;


class ClientController extends Controller
{
    //
   public function home()
   {
       # code...
       $slider= Slider::where('status', 1)->get();
       $produit=Product::where('status', 1)->get();
       
       return view('client.home')->with('slider', $slider)
       ->with('produit', $produit);
   }
   public function shop()
   {
       # code...
       $produit=Product::where('status', 1)->get();
       $produitCategory=Category::get();
       return view('client.shop')->with('produit', $produit)
       ->with('produitCategory', $produitCategory);
   }
   public function select_categorie($name)
   {
       # code...
       $produitCategory=Category::get();
       $produit=Product::where('product_category', $name)->where('status', 1)->get();
       return view('client.shop')->with('produit', $produit)
       ->with('produitCategory', $produitCategory);;
   }
   public function ajouter_panier($id)
   {
       # code...
       $produit=Product::find($id);
      //si le panier est vide on ajoute des produits
       $oldCart = Session::has('cart')? Session::get('cart'):null;
       $cart = new Cart($oldCart);
       $cart->add($produit, $id);
       Session::put('cart', $cart);

       //dd(Session::get('cart'));
       return redirect('/shop');
    
   }
   public function panier()
   {
       # code...
       if(!Session::has('cart')){
        return view('client.cart');
        }

        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        return view('client.cart', ['products' => $cart->items]);
   }
   public function modifier_qty(request $request, $id)
   {
       # code...
       $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->updateQty($request->id, $request->quantity);
        Session::put('cart', $cart);

        //dd(Session::get('cart'));
        return redirect('/panier');
   }
     public function retirer_produit($id)
     {
         # code...
         $oldCart = Session::has('cart')? Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart->removeItem($id);
        
         if(count($cart->items) > 0){
             Session::put('cart', $cart);
         }
         else{
             Session::forget('cart');
         }
 
         //dd(Session::get('cart'));
         return redirect('/panier');
     }
   public function paiement()
   {
       # code...
        if(!Session::has('cart')){
        return view('client.cart');
        }

       return view('client.chekout');
   }
     public function payer(request  $request)
     {
         # code...
         if(!Session::has('cart')){

            return view('client.cart');

            }
              $oldCart = Session::has('cart')? Session::get('cart'):null;
              $cart = new Cart($oldCart);

         Stripe::setApiKey('sk_test_51K6HylCV9Cpi0mJ1RGMxQoPzZP6JNTMUw4tXvSQLyKIOB4HUh8t7KlsQijaJW022D25uUppnj5FZt0BpxeMEr3rN00EtqMVahW');

        try{

            $charge = Charge::create(array(
                 "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtainded with Stripe.js
                "description" => "Test Charge"
            ));

                $commandes = new Commande();

                $commandes->client_name= $request->input('client_name');
                $commandes->client_adresse= $request->input('card_adresse');
                $commandes->panier= serialize($cart);
                $commandes->payement_id= $charge->id;

                $commandes->save();
                
                
        } catch(\Exception $e){
            Session::put('error', $e->getMessage());
            return redirect('/paiement');
        }

        Session::forget('cart');
        //Session::put('success', 'Purchase accomplished successfully !');
        return redirect('/panier')->with('status', 'Achat accomplis avec success'.$commandes->nom);
     }

    public function creer_compte(request $request)
    {
        # code...
        $this->validate($request, ['email'=>'email|required|unique:clients',
    
                            'pass'=>'required|min:']);
        $client = new Client();
        $client->email=$request->input('email');
        $client->password= bcrypt($request->input('pass'));

        
        $client->save();

        
        return back()->with('status', 'votre compte à été créer avec succes');
    }
   
    public function acceder_compte(request $request)
    {
        # code...
        $this->validate($request, ['email'=>'email|required|unique:clients',
    
                            'pass'=>'required|min:']);
      
          $client = Client::where('email', $request->input('email'))->first();
       
        if ($client){
            # code...
            if (Hash::check($request->input('pass'), $client->password)) {
                # code...
                Session::put('client', $client);
                return redirect('/shop');
            } else {
                # code...
                return back()->with('status', 'Mauvais Mot de passe');
            }
            
        } else {
            # code...
            return back()->with('status', 'vous n'.'avez pas de compte');
        }
        
         
        
        
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
