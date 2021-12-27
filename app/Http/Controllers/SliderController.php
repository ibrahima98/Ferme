<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Support\Facades\Storage;
use App\Category;
use App\Product;
use App\Slider;

class SliderController extends Controller
{
    //
    public function ajouterSlider()
    {
        # code...
        return view('admin.ajouterSlider');
    }
    public function sauverSlider(request $request)
    {
        # code...
        $this->validate($request, ['description1'=>'required', 
                                    'description2'=>'required',
                                    'slider_image'=>'required']);

         if ($request->hasFile('slider_image')) {
            #  nom image avec extension
           $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
              # nom image sans extension
            $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
               #  image avec extension seulement
            $fileExt = $request->file('slider_image')->getClientOriginalExtension();
             #  file to store
           $fileNameToStore = $fileName.''.time().'.'.$fileExt;

          $path= $request->file('slider_image')->storeas('public/slider_images', $fileNameToStore);

          } else {
                 # code...
                 $fileNameToStore='noimage.jpg';
            }

          $slider = new Slider();

       
           $slider->description1 =$request->input('description1');
           $slider->description2 =$request->input('description2');
           $slider->slider_image =$fileNameToStore;
           $slider->status =1;

         $slider->save();

       return redirect('/ajouterslider')->with('status', 'le slider 
      à été ajouter avec succes');
        
    }
    public function Slider()
    {
        # code...
        $slider= Slider::get();

        return view('admin.slider')->with('slider',  $slider);
       ;
    }
    public function editSlider($id)
    {
        # code...
        $editslider=Slider::find($id);
      
        return view('admin.editslider')->with('editslider',
        $editslider);
    }
    public function modifierSlider (Request $request)
    {
        # modifier un categorie
        $this->validate($request, ['description1'=>'required', 
        'description2'=>'required',
        'slider_image'=>'image|nullable|max:1999']);
       
    
              $slider = Slider::find($request->input('id'));
              $slider ->description1 =$request->input('description1');
              $slider ->description2 =$request->input('description2');
              

             if ($request->hasFile('slider_image')) {
               #  nom image avec extension
               $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
                # nom image sans extension
                 $fileName= pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                 #  image avec extension seulement
                  $fileExt = $request->file('slider_image')->getClientOriginalExtension();
                 #  file to store
                 $fileNameToStore = $fileName.''.time().'.'.$fileExt;

                 $path= $request->file('slider_image')->storeas('public/slider_images', $fileNameToStore);

                 if ($slider->slidert_images !='noimage.jpg') {
                     # suprimer l'ancien image
                     //Storage::delete('/public/slider_image'.$slider_image);
                 }
            
                 $slider->slider_image =$fileNameToStore;
                }

                $slider->update();

                return redirect('/slider')->with('status', 'le slider à été ajouter avec succes');
    }
    public function suprimerslider($id)
    {
        # code...
        $suprimer=Slider::find($id);

        if ($suprimer->suprimer_images !='noimage.jpg') {
            # suprimer l'ancien image
            //Storage::delete('/public/storage/suprimer_images'.$slider_image);
        }

        $suprimer->delete();

        return redirect('/slider')->with('status', 'Le slider  à été Suprimer avec succes');
    }
    public function activerslider($id)
    {
        # code...
        $slider=Slider::find($id);
         
        $slider->status=1;

        $slider->update();

        return redirect('/slider')->with('status', 'Le produit à été activer  avec succes');


    }
    public function desactiverslider($id)
    {
        # code...
        $slider=Slider::find($id);
         
        $slider->status=0;

        $slider->update();

        return redirect('/slider')->with('status', 'Le slider à été desactiver  avec succes');


    }
}
