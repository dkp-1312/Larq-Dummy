<html lang="en">

<head>
        @include('home/css')
        <style>
            label
            {
                width:150px;
                display:inline;
            }
        </style>
</head>
<body>
    @include('home/header')

    <h3 class="text-center">My Cart</h3>
     <table class="border border-2 border-dark table text-center">
        
        <tr>
            <th class="border-2 border-dark">Product Title</th>
            <th class="border-2 border-dark">Price</th>
            <th class="border-2 border-dark">Image</th>
            <th class="border-2 border-dark">Remove</th>
        </tr>
        <?php
        $value=0;
        ?>
        @foreach($cart as $cart)
        <tr>
            <td class="border-1">{{$cart->product->title}}</td>
            <td class="border-1">{{$cart->product->price}}</td>
            <td class="border-1">
                <img src="/photo/product/{{$cart->product->image}}" width="120px" height="120px">
            </td>
            <td class="border-1">
            <a href="{{url('cart_delete',$cart->id)}}" onclick="confirmation(event)" class="btn btn-danger">Remove</a>
            </td>
        </tr>
        <?php
        $value+=$cart->product->price;
        ?>
        @endforeach
    </table>
    <div class="col-md-10 d-flex justify-content-center align-items-center m-5">
        <div class="px-3">
            <form action="{{url('confirm_order')}}" method="post">
                @csrf
                <div>
                    <label>Receiver Name:</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}">
                </div>
                <div>
                    <label>Receiver Address:</label>
                    <textarea name="address">{{Auth::user()->address}}</textarea>
                </div>
                <div>
                    <label>Mobile Number:</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary mt-3" value="Cash On Delivery">
                    <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
                </div>
            </form>
        </div>
   
</div>

        <div class="d-flex justify-content-center align-items-center mb-3">
            <h3>Total value of cart:${{$value}}</h3>
        </div>


    
    @include('home/footer')
</body>
</html>