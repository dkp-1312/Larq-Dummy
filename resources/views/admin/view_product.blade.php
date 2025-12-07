<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css');
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  @include('admin.header');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar');
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Display Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <main id="main-content" class="c011">
    
    <form action="{{url('product_search')}}" method="get" class="d-flex justify-content-center align-items-center">
      <input type="search" name="search" class="w-25">
      <input type="Submit" class="btn btn-warning ml-3" value="Search">  
    </form>
    <div class="div_reg">
        <table class="table_deg">
            <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($product as $products)
            <tr>
                <td>{{$products->title}}</td>
                <td>{!!Str::limit($products->description,20)!!}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td>
                    <img src="../photo/product/{{$products->image}}" width="120px" height="120px">
                </td>
                <td>
                  <a class="btn btn-info" href="{{url('update_product',$products->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" href="{{url('delete_product',$products->id)}}" onclick="confirmation(event)">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
      <div class="d-flex justify-content-center m-4">
          {{$product->onEachSide(1)->links()}}
      </div>
    </main>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.footer');
</body>
</html>