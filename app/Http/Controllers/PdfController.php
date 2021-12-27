<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commande;
use Session;

class PdfController extends Controller
{
    //
    public function voir_pdf($id){

        Session::put('id', $id);
        try{
            $pdf = \App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        }
        catch(\ Exception $e){
            return redirect('/commande')->with('status', $e->getMessage());
        }
    }
    public function convert_orders_data_to_html(){

        $commandes= Commande::where('id',Session::get('id'))->get();

        foreach($commandes as $commandes){
            $name = $commandes->client_name;
            $address = $commandes->client_adresse;
            $date = $commandes->created_at;
        }

        /*$commandes->transform(function($commandes, $key){
            $commandes->panier = unserialize($commandes->panier);

            return $commandes;
        })*/;

        $output = '<link rel="stylesheet" href="frontend/css/style.css">
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                    <th>Client Name : '.$name.'<br> Client Address : '.$address.' <br> Date : '.$date.'</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';
        
        foreach($commandes as $commandes){
           /* foreach($commandes->panier->items as $item){

                $output .= '<tr class="text-center">
                                <td class="image-prod"><img src="storage/product_images/'.$item['product_image'].'" alt="" style = "height: 80px; width: 80px;"></td>
                                <td class="product-name">
                                    <h3>'.$item['product_name'].'</h3>
                                </td>
                                <td class="price">$ '.$item['product_price'].'</td>
                                <td class="qty">'.$item['qty'].'</td>
                                <td class="total">$ '.$item['product_price']*$item['qty'].'</td>
                            </tr><!-- END TR-->
                            </tbody>';

            }

            $totalPrice = $commandes->panier->totalPrice; */

        }

        $output .='</table>';

        $output .='<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th>$ </th>
                            </tr>
                        </thead>
                    </table>';


        return $output;
                
    

    }
}

