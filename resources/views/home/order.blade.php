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

    <table class="border border-2 border-dark table text-center">
        <tr>
            <th class="border-2 border-dark">Product name</th>
            <th class="border-2 border-dark">Price</th>
            <th class="border-2 border-dark">Delivery Status</th>
            <th class="border-2 border-dark">Image</th>
        </tr>
        @foreach($order as $o1)
        <tr>
            <td class="border-1">{{$o1->product->title}}</td>
            <td class="border-1">{{$o1->product->price}}</td>
            <td class="border-1">
            {{$o1->status}}
            </td>
            <td class="border-1">
                <img src="/photo/product/{{$o1->product->image}}" width="120px" height="120px">
            </td>
            
        </tr>
       
        @endforeach
    </table>

    @include('home/footer')
</body>
</html>