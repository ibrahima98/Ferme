@extends('layout.appAdmin')

@section('tile')
       Produit
@endsection
{{Form::hidden('', $compteur=1)}}
@section('contenu')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produit </h4>
          @if (Session::has('status'))
          <div class="alert alert-success">
            {{Session::get('status')}}
          </div>
              
          @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Nom du Produit </th>
                        <th>Prix</th>
                        <th>Status</th>
                        <th>Actions </th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produit as $produits)
                    <tr>
                      <td>{{$compteur}}</td>
                      <td><img src="/storage/product_images/{{$produits->product_image}}" alt="" srcset=""></td>
                      <td>{{$produits->product_name}}</td>
                      <td>{{$produits->product_price}}</td>
                      <td>
                            @if ($produits->status==1)
                                
                                    <label class="badge badge-success">Activé</label>
                            @else
                       
                                    <label class="badge badge-danger">Désactivé</label>
                            @endif
                      </td>
                      <td>
                        <button class="btn btn-outline-primary" 
                        onclick="window.location='{{url('/editproduit/'.$produits->id)}}'">Edit</button>
                        <a href="{{'/suprimerproduit/'.$produits->id}}" id="delete" class="btn btn-outline-danger">Delete</a>
                      @if ($produits->status==1)
                      <button class="btn btn-outline-warning" 
                      onclick="window.location='{{url('/desactiverproduit/'.$produits->id)}}'">Désactiver</button>
                      @else
                      <button class="btn btn-outline-success" 
                      onclick="window.location='{{url('/activerproduit/'.$produits->id)}}'">Activer</button>
                      @endif
                      
                      
                      
                      
                      </td>

                  </tr>
                  {{Form::hidden('', $compteur++)}}
                    @endforeach
                   
                 
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    
@endsection
@section('scripts')
<script src="backend/js/data-table.js"></script>
    
@endsection