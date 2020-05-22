@include('layouts.header')
@include('layouts.navbar')
@include('layouts.app')
@include('layouts.errors')
                 
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
		  <form action="{{url('order')}}" method="get" class="billing-form">
					 {{csrf_field()}}
							<h3 class="mb-4 billing-heading">Billing Details</h3>
	          	<div class="row align-items-end">
                <div class="w-100"></div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" name="street" class="form-control" placeholder="House number and street name">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" name="appartment" class="form-control" placeholder="Appartment, suite, unit etc: (optional)">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" name="city" class="form-control" placeholder="">
	                </div>
		            </div>
		            
		           
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" name="phone" class="form-control" placeholder="">
	                </div>
	              </div>
                </div>
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">

	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			
						  <?php 
						$subtotals= array(); 
						$subtotal=0.00;
						$discounts= array(); 
						$discount=0.00;
						foreach($products as $prod){
							$subprod=$prod->price * $prod->quantity;
							array_push($subtotals, $subprod);
							$discprod=$prod->quantity*($prod->price*$prod->discount*0.01);
							array_push($discounts, $discprod);
						}
						foreach($subtotals as $sub){
							$subtotal+=$sub;
						}
						foreach($discounts as $sub){
							$discount+=$sub;
						}
					?>
						@foreach($products as $prod)
							<p class="d-flex">
		    				<span>{{$prod->name}}</span>
    						<span>{{$prod->quantity}} Kg</span>
						</p>
						@endforeach
							<p class="d-flex">
		    				<span>Subtotal</span>
    						<span>${{$subtotal}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>${{$discount}}</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{$subtotal-$discount}}</span>
    					</p>
						<input type="hidden" name="total" value="{{$subtotal-$discount}}">
						<input type="hidden" name="status" value="Pending">

						</div>
	          	</div>
	          	<div class="col-md-12">
	          		<div class="cart-detail p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Payment Method</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="payment" value="cash" class="mr-2"> Cash On Delivery</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="payment" value="fakat" class="mr-2"> Fakat </label>
											</div>
										</div>
									</div>
									
									<p><button type="submit" class="btn btn-primary py-3 px-4">Place an order</button></p>
								</div>
								</form>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

                </div>
            </div>
        </div>
    </div>
</div>
<hr>
@include('layouts.footer')

