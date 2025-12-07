<html lang="en">

<head>
        @include('home/css')
</head>
<body>
    @include('home/header')

    <h1>Product Details</h1>

    <div class="col-md-11 m-5" style="background-color:#EEEEEE;">
                    <div class="card d-flex justify-content-center align-items-center m-3 p-2 border-0" style="background-color:#EEEEEE;">
                <img src="/photo/product/{{$data->image}}" class='card d-flex justify-content-center border border-2 border-dark' alt='...' width="400px" style="background-color:#FFFFFF;border:5px;"></div>
                <div class="card m-3 p-2 border border-2 border-dark">
                    <h5 class="card-title fw-bold d-inline-flex justify-content-start">{{$data->title}}</h5>
                    <p class="card-text">
                        <ul>
                        <li>Category: {{$data->category}}</li>
                            <li>Available Quantity: {{$data->quantity}}</li>
                        </ul>
                        <b>Price: ${{$data->price}}</b>
                    </p>
                </div>
                <div class="card detail-box m-3 p-2 border border-2 border-dark">
                    <legend>Description:</legend>
                    <p>
                        {{$data->description}}
                    </p>
                </div>
                <a href="{{url('product_details',$data->id)}}" class="btn btn-primary mt-2">Details</a>
                </div>
      </div>


    @include('home/footer')
</body>
</html>