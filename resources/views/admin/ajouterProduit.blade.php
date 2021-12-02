@extends('layout.appAdmin')
@section('title')
        Ajouter Produit
    
@endsection
@section('contenu')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Produit</h4>
                  @if (Session::has('status'))
                  <div class="alert alert-success">
                    {{Session::get('status')}}
                  </div>
                      
                  @endif
                  @if (count($errors)>0)
                 
                  <div class="alert alert-danger">
                    <ul>
                    
                      @foreach ($errors->all() as $error)
                       <li>{{$error}}</li>
                      @endforeach
                    
                    </ul>
                  </div>
                      
                  @endif
                 
              {!!Form::open(['action'=>'ProductController@sauverProduit', 'method'=>'POST',  
               'id'=>'commentForm', 'class'=>'cmxform', 'enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                          {{Form::label('', 'Nom du Produit', ['for'=>'cname'])}}
                          {{Form::text('product_name', '', ['class'=>'form-control', 'id'=>'cname'])}}
                       
                        </div>
                        <div class="form-group">
                            {{Form::label('', 'Prix du Produit', ['for'=>'cname'])}}
                            {{Form::number('product_price', '', ['class'=>'form-control', 'id'=>'cname'])}}
                         
                          </div>
                          <div class="form-group">
                            {{Form::label('', 'Categorie du Produit', ['for'=>'cname'])}}
                            {{Form::select('product_categorie',  $categori ,null,  
                            ['placeholder'=>'Select Category','class'=>'form-control'])}}
                         
                          </div>
                          <div class="form-group">
                            {{Form::label('', 'Image', ['for'=>'cname'])}}
                            {{Form::file('product_image',  ['class'=>'form-control', 'id'=>'cname'])}}
                         
                          </div>
                          
                     
                      {{Form::submit('Ajouter', ['class'=>'btn btn-primary'])}}
                      {!!Form::close()!!}
      
                </div>
              </div>
            </div>
          </div>
      
 
    
@endsection
@section('scripts')
{{--<script src="backend/js/form-validation.js"></script>
<script src="backend/js/bt-maxLength.js"></script>
    --}}

@endsection