@include('layouts.header')
@include('layouts.navbar')
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>
	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
      <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
	 
		
    <div class="col-md-6 d-flex align-items-center">
            <form class="subscribe-form"  method="get" action="{{url('shop/search')}}"
			enctype="multipart/form-data">
			{{csrf_field()}}
			<!-- @method('get') -->
              <div class="form-group d-flex">
                <input type="text" name="searchtxt" class="form-control" placeholder="Enter Product Name">
                <button type="submit" class="submit px-3">Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
    					<li><a href="{{url('shop')}}">All</a></li>
    					<li><a href="{{url('shop/veg')}}">Vegetables</a></li>
    					<li><a href="{{url('shop/fruits')}}">Fruits</a></li>
    					<li><a href="{{url('shop/juice')}}">Juice</a></li>
    				</ul>
    			</div>
    		</div>
    		<div class="row">
    					
				@if(count($allproducts)==0)
          			<p class="alert alert-warning"> No Products Available</p>
       			@else
				  @foreach($allproducts as $product)
				  <div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{url('product/'.$product->prod_id)}}" class="img-prod"><img class="img-fluid" src="{{asset('images/'.$product->prod_img)}}" alt="Colorlib Template">
    						<span class="status">{{$product->prod_discount}}%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">{{$product->prod_name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">${{$product->prod_price}}</span><span class="price-sale">${{$product->prod_price -$product->prod_price*$product->prod_discount*0.01}}</span></p>
		    					</div>
	    					</div>
	    					<!-- <div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="shop/add" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div> -->
    					</div>
    				</div>
				</div>
				@endforeach
				@endif
    		
    		</div>
        </div>
    	</di>
    </section>
    @include('layouts.footer')