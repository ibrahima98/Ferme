@extends('layout.appAdmin')

@section('tile')
       Commandes
@endsection
{{Form::hidden('', $compteur=1)}}
@section('contenu')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Commandes </h4>
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
                        <th>Nom du client</th>
                        <th>Adresse </th>
                        <th>Panier</th>
                        <th>Payement id</th>
                        <th>Actions </th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($commandes as $commandes)
                    <tr>
                      <td>{{$compteur}}</td>
                      <td>{{$commandes->client_name}}</td>
                      <td>{{$commandes->client_adresse}}</td>
                      <td>
                        {{-- @foreach ($commandes->panier->items as $item)
                          {{--$item['product_name'].', '}}
                        @endforeach--}}
                       
                         
                        </td>
                      <td>
                        <label class="badge badge-info">{{$commandes->payement_id}}</label>
                      </td>
                      <td>
                          <button class="btn btn-outline-primary" onclick="window
                          .location='{{url('/voir_pdf/'.$commandes->id)}}'">View</button>
                        
                        
                      </td>
                  </tr>
                  {{Form::hidden('', $compteur+=1)}}
              
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