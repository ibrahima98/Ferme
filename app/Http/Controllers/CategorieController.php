<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategorieController extends Controller
{
    //
    public function ajouterCategorie()
    {
        # code...
        return view('admin.ajouterCategorie');
    }
    public function sauverCategorie(Request $request)
    {
        # ajout d'une nouvelle categorie
        $this->validate($request, ['category_name'=>'required |unique:categories']);
        $categorie=new Category();

        $categorie->category_name =$request->input('category_name');

        $categorie->save();

        return redirect('/ajoutercategorie')->with('status', 'La categorie '.$categorie->category_name.' à été ajoutée avec succes');
     
    }
    public function categorie()
    {
        # affichage de tout les categories

        $produitCategory=Category::get();

      
        return view('admin.categorie')->with('produitCategory', $produitCategory);
     
       
    }
    public function editCategorie($id)
    {
        #
        $editCategory=Category::find($id);

      
        return view('admin.editCategorie')->with('editCategory', $editCategory);
    }
    public function modifierCategorie (Request $request)
    {
        # modifier un categorie
        $this->validate($request, ['category_name'=>'required |unique:categories']);
        $produitCategory=Category::find($request->input('id'));

        $produitCategory->category_name =$request->input('category_name');

        $produitCategory->update();

        return redirect('/categorie')->with('status', 'La categorie '. $produitCategory->category_name.' à été Modifier avec succes');
    }
    public function suprimerCategorie($id)
    {
        # code...
        $produitCategory=Category::find($id);

        $produitCategory->delete();

        return redirect('/categorie')->with('status', 'La categorie '. $produitCategory->category_name.' à été Suprimer avec succes');
    }
}
