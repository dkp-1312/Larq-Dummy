<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css');
<style type="text/css">
    input[type="text"]
    {
        width:400px;
        height:30px;
    }
    .div_deg
    {
        display:flex;
        justify-content:center;
        align-items:center;
        margin-top:60px;
    }
    h1
    {
      display:flex;
      justify-content:center; 
    }
    label
    {
      width:200px;
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
            <h1 class="m-0">Dashboard</h1>
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
     <h1>Add Product</h1>
    <div class="div_deg">
      <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <label>Product Title</label>
          <input type="text" name="title" required>
        </div>

        <div>
          <label>Description</label>
          <textarea name="description" required></textarea>
        </div>

        <div>
          <label>Price</label>
          <input type="text" name="price" required>
        </div>

        <div>
          <label>Quantity</label>
          <input type="number" name="qty" min=0>
        </div>

        <div>
          <label>Product Category</label>
          <select name="category" required>
            <option name="">select</option>
            @foreach($category as $c1)
            <option value="{{$c1->category}}">{{$c1->category}}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label>Product Image</label>
          <input type="file" name="image">
        </div>

        <div>
          <input class="btn btn-primary div_deg" type="Submit" value="Add Product">
        </div>

      </form>
    </div>
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