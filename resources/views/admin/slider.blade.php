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
                        <th>Images</th>
                        <th>Description one</th>
                        <th>Description two </th>
                       
                        <th>Status</th>
                        <th>Actions </th>
                       
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $slider as $slider)
                    <tr>
                      <td>{{$compteur}}</td>
                      <td><img src="/storage/slider_images/{{$slider->slider_image}}" alt="" srcset=""></td>
                      <td>{{$slider->description1}}</td>
                     
                      <td>{{$slider->description2}}</td>
                      
                      
                      <td>
                             @if ($slider->status==1)
                             <label class="badge badge-success">{{$slider->status}}</label>
                             @else
                             <label class="badge badge-danger">Désactivé</label>
                             @endif

                      </td>
                      <td>
                        <button class="btn btn-outline-primary" 
                        onclick="window.location='{{url('/editslider/'.$slider->id)}}'">Edit</button>
                        <a href="{{'/suprimerslider/'.$slider->id}}" id="delete" class="btn btn-outline-danger">Delete</a>
                      @if ($slider->status==1)
                      <button class="btn btn-outline-warning" 
                      onclick="window.location='{{url('/desactiverslider/'.$slider->id)}}'">Désactiver</button>
                      @else
                      <button class="btn btn-outline-success" 
                      onclick="window.location='{{url('/activerslider/'.$slider->id)}}'">Activer</button>
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