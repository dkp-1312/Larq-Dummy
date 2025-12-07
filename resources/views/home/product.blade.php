<div class="row">
            @if($product)
                @foreach($product as $products)
                    <div class="card d-inline-flex justify-content-center align-items-center m-3 p-2" style='width: 18rem;display:inline-block;'>
                <img src='photo/product/{{$products->image}}' class='ard-img-top' alt='...'><br><div class=\"card-body\">
                    <h5 class="card-title fw-bold d-inline-flex justify-content-start">{{$products->title}}</h5>
                    <p class="card-text d-inline-flex justify-content-end">
                        Price: ${{$products->price}}
                    </p>
                </div>
                <span>
                <a href="{{url('product_details',$products->id)}}" class="btn btn-primary mt-2 ">Details</a>
                <a href="{{url('add_cart',$products->id)}}" class="btn btn-warning mt-2 text-white">Add to Cart</a>
                </span>
                </div>
                @endforeach
            @endif
      </div>