@extends('layout.appAdmin')
@section('title')
        Ajouter Categories
    
@endsection
@section('contenu')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Categorie</h4>
                 
                 
              {!!Form::open(['action'=>'CategorieController@sauverCategorie', 'method'=>'POST',  'id'=>'commentForm', 'class'=>'cmxform'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                          {{Form::label('', 'Nom de la Categories', ['for'=>'cname'])}}
                          {{Form::text('category_name', '', ['class'=>'form-control', 'id'=>'cname'])}}
                       
                        </div>
                      {{--- <div class="form-group">
                        <label for="cemail">E-Mail (required)</label>
                        <input id="cemail" class="form-control" type="email" name="email" required>
                      </div>
                      <div class="form-group">
                        <label for="curl">URL (optional)</label>
                        <input id="curl" class="form-control" type="url" name="url">
                      </div>
                      <div class="form-group">
                        <label for="ccomment">Your comment (required)</label>
                        <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                      </div>---}}
                    
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