@extends('layout.appAdmin')

@section('tile')
       Categorie
@endsection
{{Form::hidden('', $compteur=1)}}
@section('contenu')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Categorie </h4>
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
                        <th>Nom de la Categorie</th>
                        <th>Actions </th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produitCategory as $produitCategory)
                   
                    <tr>
                      <td>{{$compteur}}</td>
                      
                      <td>{{$produitCategory->category_name}}</td>
                      {{--<td>
                        <label class="badge badge-info">On hold</label>
                      </td>--}}
                      <td>
                        <button class="btn btn-outline-primary" 
                        onclick="window.location='{{url('/editcategorie/'.$produitCategory->id)}}'">Edit</button>
                        <a href="{{'/suprimercategorie/'.$produitCategory->id}}" id="delete" class="btn btn-outline-danger">Delete</a>
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