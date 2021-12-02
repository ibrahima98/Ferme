@extends('layout.appAdmin')

@section('tile')
       Commandes
@endsection
@section('contenu')




      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Commandes </h4>
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
                    <tr>
                        <td>1</td>
                        <td>Ibrahima Ly</td>
                        <td>HLM Rufisque</td>
                        <td>CFA 12.500</td>
                        
                        
                        <td>
                          <label class="badge badge-info">35</label>
                        </td>
                        <td>
                            <button class="btn btn-outline-primary">VIEW</button>
                          
                        </td>
                    </tr>
                 
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