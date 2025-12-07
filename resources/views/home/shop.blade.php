<html lang="en">

<head>
        @include('home.css')
        <style>
            .div_reg
            {
                display:flex;
                justify-content:center;
                align-items:center;
                margin-top:60px;
            }
            .table_deg,th,td
            {
                border:2px solid black;
            }
            th
            {
                background-color:skyblue;
                color:white; 
                font-size:19px;
                font-weight:bold;
                padding:15px; 
            }
            td
            {
                border:1px solid black;
                text-align:center;
            }
        </style>
</head>

<body>
    @include('home.header')
    <main id="main-content" class="c011">
    
    <div class="div_reg">
    </div>
            @if($product)
                @foreach($product as $products)
                    <div class="card d-inline-flex justify-content-center align-items-center" style='width: 18rem;display:inline-block;'>
                <img src='photo/product/{{$products->image}}' class='ard-img-top' alt='...'><br><div class=\"card-body\">
                    <h5 class="card-title fw-bold">{{$products->title}}</h5>
                    <p class="card-text">
                        <ul>
                            <li>{{$products->category}}</li>
                            <li>{{$products->description}}</li>
                        </ul>
                        Price: ${{$products->price}}
                    </p>
                    <span>
                <a href="{{url('product_details',$products->id)}}" class="btn btn-primary mt-2 ">Details</a>
                <a href="{{url('add_cart',$products->id)}}" class="btn btn-warning mt-2 text-white">Add to Cart</a>
                </span>
                </div>
                </div>
                @endforeach
            @endif
    </main>
    @include('home.footer')
</body>
</html>