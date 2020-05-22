@include('layouts.header')
@include('layouts.navbar')
	 
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>
	
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
								
						      <tr class="text-center">
							  @if(count($products)==0)
          			<p class="alert alert-warning"> No Products Available</p>
					  @else
					  @foreach($products as $prod)
						        <td> 
						<form method="post" action="cart/{{$prod->id}}"
                          enctype="multipart/form-data">
                          {{csrf_field()}}
						  @method('delete')
						  <button type="submit" class="btn btn-warning pl-3 pr-3"> X </button>
						</td>
						</form>
						        <td class="image-prod"><img class="img" src="{{asset('images/'.$prod->img)}}"></td>
						        
						        <td class="product-name">
						        	<h3>{{$prod->name}}</h3>
						        	<p>{{$prod->desc}}</p>
						        </td>
						        
						        <td class="price">${{$prod->price}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
									
									<input type="text" name="quantity" class="quantity form-control input-number" value="{{$prod->quantity}}" min="1" max="100">
									
								</div>
								  
					          </td>
						        
						        <td class="total">${{$prod->quantity*$prod->price}}</td>
						      </tr><!-- END TR-->
							@endforeach
							@endif 
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    	
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
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
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
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
						
    				</div>
    				<p><a href="{{url('/login')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>
		
@include('layouts.footer')