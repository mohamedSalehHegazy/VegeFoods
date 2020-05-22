@include('layouts.header')
@include('layouts.navbar')
@include('layouts.errors')

<div class="hero-wrap hero-bread" style="background-image:url('images/bg_1.jpg');">">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
            @foreach($product as $prod)
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a class="image-popup"><img src="{{asset('images/'.$prod->prod_img)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$prod->prod_name}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
                        </div>
                        <p class="price"><span class="mr-2 price-dc">${{$prod->prod_price}}</span></p>
    				    <p>{{$prod->prod_desc}}</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"></div>
	                  
	                </div>
		            </div>
					</div>
					
					<!-- Add To Cart -->
					<form action="{{url('cart')}}" method="post">
					 {{csrf_field()}}
						<div class="input-group col-md-6 d-flex justify-content-center mb-3 ml-4">
						<label class="col-sm-2 col-form-label"> Quantity </label>
						<input type="number" name="quantity">
	          			</div>
			  <a class="btn btn-black py-3 px-5">      
                <input type="hidden" name="id" value="{{$prod->prod_id}}">
				<input type="hidden" name="name" value="{{$prod->prod_name}}">
				<input type="hidden" name="desc" value="{{$prod->prod_desc}}">
				<input type="hidden" name="price" value="{{$prod->prod_price}}">
				<input type="hidden" name="img" value="{{$prod->prod_img}}">
				<input type="hidden" name="discount" value="{{$prod->prod_discount}}">
              <button type="submit" class="text-white" >Add to Cart</button>
			  </form>
			</a>


			<a class="btn btn-black py-3 px-5 ml-2">      
			<form action="{{url('cart')}}" method="post">
              {{csrf_field()}}
                <input type="hidden" name="id" value="{{$prod->prod_id}}">
              <button type="submit" class="text-white" >Add to Wishlist</button>
			  </form>
			</a>
    		</div>
    	</div>
    </section>
    @endforeach
@include('layouts.footer')