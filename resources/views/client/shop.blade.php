@extends('layout.app1')
@section('contenu')
    

<div class="hero-wrap hero-bread" style="background-image: url('/frontend/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Home</a></span> <span>Products</span></p>
          <h1 class="mb-0 bread">Products</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-10 mb-5 text-center">
                  <ul class="product-category">
                    <li><a href="{{URL::to('/shop')}}" class="{{request()->is('shop')?'active':''}}">All</a></li>
                      @foreach ($produitCategory as $produitCategory)
                     
                      <li><a href="/select_categorie/{{$produitCategory->category_name}}"
                         class="{{request()->is('select_categorie/'.$produitCategory->category_name)?'active':''}}">  {{$produitCategory->category_name}}</a></li>
                    @endforeach
                  </ul>
              </div>
          </div>
          <div class="container">
            <div class="row">
               @foreach ($produit as $produit)
               
       
                   <div class="col-md-6 col-lg-3 ftco-animate">
                       <div class="product">
                           <a href="#" class="img-prod"><img class="img-fluid" src="/storage/product_images/{{$produit->product_image}}" alt="Colorlib Template">
                               <span class="status">30%</span>
                               <div class="overlay"></div>
                           </a>
                           <div class="text py-3 pb-4 px-3 text-center">
                               <h3><a href="#">{{$produit->product_name}}</a></h3>
                               <div class="d-flex">
                                   <div class="pricing">
                                       <p class="price"><span class="mr-2 price-dc">{{$produit->product_price}}</span><span class="price-sale">{{$produit->product_price}}</span></p>
                                   </div>
                               </div>
                               <div class="bottom-area d-flex px-3">
                                   <div class="m-auto d-flex">
                                       <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                           <span><i class="ion-ios-menu"></i></span>
                                       </a>
                                       <a href="/ajouter_panier/{{$produit->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                           <span><i class="ion-ios-cart"></i></span>
                                       </a>
                                       <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                           <span><i class="ion-ios-heart"></i></span>
                                       </a>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
            
                    @endforeach
              </div>
           </div>
          <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
      </div>
  </section>

      
@endsection