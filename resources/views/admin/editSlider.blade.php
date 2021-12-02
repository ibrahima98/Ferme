@extends('layout.appAdmin')
@section('title')
        Edit Slider
    
@endsection
@section('contenu')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Edit slider</h4>
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
              {!!Form::open(['action'=>'SliderController@modifierSlider', 'method'=>'POST',  
              'id'=>'commentForm', 'class'=>'cmxform', 'enctype'=>'multipart/form-data'])!!}
                    {{ csrf_field() }}
                      <div class="form-group">
                        {{Form::hidden('id', $editslider->id)}}
                          {{Form::label('', 'Description one', ['for'=>'cname'])}}
                          {{Form::text('description1', $editslider->description1, ['class'=>'form-control', 'id'=>'cname'])}}
                       
                        </div>
                        <div class="form-group">
                            {{Form::label('', 'Description two', ['for'=>'cname'])}}
                            {{Form::text('description2',$editslider->description2, ['class'=>'form-control', 'id'=>'cname'])}}
                         
                          </div>
                         
                          <div class="form-group">
                            {{Form::label('', 'Image', ['for'=>'cname'])}}
                            {{Form::file('product_image',  ['class'=>'form-control', 'id'=>'cname'])}}
                         
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