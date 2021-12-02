@extends('layout.appAdmin')
@section('title')
        Edit Categories
    
@endsection
@section('contenu')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit Categorie</h4>
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
                 
              {!!Form::open(['action'=>'CategorieController@modifierCategorie', 'method'=>'POST',  'id'=>'commentForm', 'class'=>'cmxform'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                          {{Form::hidden('id',  $editCategory->id)}}
                          {{Form::label('', 'Nom de la Categories', ['for'=>'cname'])}}
                          {{Form::text('category_name',  $editCategory->category_name, ['class'=>'form-control', 'id'=>'cname'])}}
                       
                        </div>
                   
                    
                      {{Form::submit('Modifier', ['class'=>'btn btn-primary'])}}
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