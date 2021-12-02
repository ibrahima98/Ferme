<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App\Category;
use App\Product;
class ProductController extends Controller
{
    //
    public function ajouterProduit()
    {
        # recuperer une valeur dans un select 
        $categori = Category::All()->pluck('category_name', 'category_name');
        return view('admin.ajouterProduit')->with('categori',  $categori);
    }
    public function sauverProduit(request $request)
    {
        # ajouter les produit dans la base de données
        

        $this->validate($request, ['product_name'=>'required|unique:products', 
                                   'product_price'=>'required' ,
                                   'product_categorie'=>'required' ,
                                   'product_image'=>'image|nullable|max:1999']);
        if ($request->hasFile('product_image')) {
            #  nom image avec extension
            $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
             # nom image sans extension
            $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
             #  image avec extension seulement
            $fileExt = $request->file('product_image')->getClientOriginalExtension();
             #  file to store
            $fileNameToStore = $fileName.''.time().'.'.$fileExt;

            $path= $request->file('product_image')->storeas('public/product_images', $fileNameToStore);
       
        } else {
            # code...
            $fileNameToStore='noimage.jpg';
        }

        $produit = new Product();
       
        $produit->product_name =$request->input('product_name');
        $produit->product_price =$request->input('product_price');
        $produit->product_category =$request->input('product_categorie');
        $produit->product_image =$fileNameToStore;
        $produit->status =1;

        $produit->save();

        return redirect('/ajouterproduit')->with('status', 'le produit '. $produit->product_name.' à été ajouter avec succes');
     }
    public function Produit()
    {
        # code...
        $produit=Product::get();

        return view('admin.produit')->with('produit', $produit);
    }
    public function editProduit($id)
    {
        #
        $editProduit=Product::find($id);
        $categori = Category::All()->pluck('category_name', 'category_name');

      
        return view('admin.editProduit')->with('editProduit',
         $editProduit)->with('categori', $categori);
    }
    public function modifierProduit (Request $request)
    {
        # modifier un categorie
       
        $this->validate($request, ['product_name'=>'required', 
                                    'product_price'=>'required' ,
                                    'product_categorie'=>'required' ,
                                    'product_image'=>'image|nullable|max:1999']);
    
              $produit = Product::find($request->input('id'));
              $produit->product_name =$request->input('product_name');
              $produit->product_price =$request->input('product_price');
              $produit->product_category =$request->input('product_categorie');

             if ($request->hasFile('product_image')) {
               #  nom image avec extension
               $fileNameWithExt = $request->file('product_image')->getClientOriginalName();
                # nom image sans extension
                 $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 #  image avec extension seulement
                  $fileExt = $request->file('product_image')->getClientOriginalExtension();
                 #  file to store
                 $fileNameToStore = $fileName.''.time().'.'.$fileExt;

                 $path= $request->file('product_image')->storeas('public/product_images', $fileNameToStore);

                 if ($produit->product_images !='noimage.jpg') {
                     # suprimer l'ancien image
                     Storage::delete('public/product_images'.$product_image);
                 }
            
                  $produit->product_image =$fileNameToStore;
                }

                  $produit->update();

                return redirect('/produit')->with('status', 'le produit '. $produit->product_name.' à été ajouter avec succes');
    }
   /* public function suprimerproduit($id)
    {
        # code...
        $suprimer=Product::find($id);

        $suprimer->delete();

        return redirect('/categorie')->with('status', 'Le produit '. $suprimer->category_name.' à été Suprimer avec succes');
    }*/
    public function activerProduit($id)
    {
        # code...
        $activerproduit=Product::find($id);
         
        $activerproduit->status=1;

        $activerproduit->update();

        return redirect('/produit')->with('status', 'Le produit à été activer  avec succes');


    }
    public function desactiverProduit($id)
    {
        # code...
                $activerproduit= Product::find($id);
                
                $activerproduit->status=0;

                $activerproduit->update();

        return redirect('/produit')->with('status', 'Le slider à été desactiver  avec succes');


    }
}
