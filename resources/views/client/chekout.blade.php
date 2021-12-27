@extends('layout.app1')
 @section('contenu')

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Home</a></span> <span>Checkout</span></p>
              <h1 class="mb-0 bread">Checkout</h1>
            </div>
          </div>
        </div>
      </div>
  
      <section class="ftco-section">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-7 ftco-animate">
              <form action="{{URL::to('/payer')}}" method="POST" class="billing-form" id="checkout-form">

                {{ csrf_field() }}

                     <h3 class="mb-4 billing-heading">Effectuer le Paiement</h3>
                              @if (Session::has('error'))
                              <div class="alert alert-success">
                                {{Session::get('error')}}
                                {{Session::put('error', null)}}

                              </div>
                                  
                              @endif
                          <div class="row align-items-end">
                              <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname"> Nom Complet</label>
                              <input type="text" class="form-control" placeholder="" id="client_name" name="client_name">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Adresse</label>
                              <input type="text" class="form-control" placeholder="" id="card-adresse" name="card_adresse">
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="lastname">Nom du carte</label>
                            <input type="text" class="form-control" placeholder="" id="card-name" name="client_name_card" >
                          </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="lastname">Numero du carte</label>
                            <input type="text" class="form-control" placeholder="" id="card-number">
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Mois d'expiration</label>
                          <input type="text" class="form-control" placeholder="" id="card-expiry-month">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="lastname">Année D'expiration</label>
                        <input type="text" class="form-control" placeholder="" id="card-expiry-year">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="lastname">CVC</label>
                        <input type="text" class="form-control" placeholder="" card="card-cvc">
                      </div>
                    </div>
                  
                  <div class="col-md-12">
                      <div class="form-group ">
                            <input type="submit" value="Payer" class="btn btn-primary">
                       </div>
                  </div>
                  </div>
              </form><!-- END -->
                      </div>
                      <div class="col-xl-5">
                <div class="row mt-5 pt-3">
                    <div class="col-md-12 d-flex mb-5">
                        <div class="cart-detail cart-total p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <p class="d-flex">
                                      <span>Subtotal</span>
                                      <span>$20.60</span>
                                  </p>
                                  <p class="d-flex">
                                      <span>Delivery</span>
                                      <span>$0.00</span>
                                  </p>
                                  <p class="d-flex">
                                      <span>Discount</span>
                                      <span>$3.00</span>
                                  </p>
                                  <hr>
                                  <p class="d-flex total-price">
                                      <span>Total</span>
                                      <span>${{Session::get('cart')->totalPrice}}</span>
                                  </p>
                                  </div>
                    </div>
                    <div class="col-md-12">
                        <div class="cart-detail p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Direct Bank Tranfer</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Check Payment</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="radio">
                                                 <label><input type="radio" name="optradio" class="mr-2"> Paypal</label>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-md-12">
                                              <div class="checkbox">
                                                 <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                                              </div>
                                          </div>
                                      </div>
                                      <p><a href="#"class="btn btn-primary py-3 px-4">Place an order</a></p>
                                  </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
          </div>
        </div>
      </section> <!-- .section -->
        
    @endsection

		
@section('scripts')
    <script src="https://js.stripe.com/v2/"></script>
    <script src="src/js/checkout.js"></script>
    <script>
        $(document).ready(function(){

        var quantitiy=0;
          $('.quantity-right-plus').click(function(e){
                
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
                    
                    $('#quantity').val(quantity + 1);

                  
                    // Increment
                
            });

            $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
              
                    // Increment
                    if(quantity>0){
                    $('#quantity').val(quantity - 1);
                    }
            });
            
        });
    
@endsection
  
	