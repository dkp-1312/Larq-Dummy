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
        <h1>Update User</h1>
        <div class="div_deg">
        <form action="{{url('update_user',$data->id)}}" method="post" enctype="multipart/form-data">
          @csrf
            <div>
                <label>Name</label>:
                <input type="text" name="name" value="{{$data->name}}">
            </div>

            <div>
                <label>Email</label>:
                <textarea name="email" style="width:400px;">{{$data->email}}</textarea>
            </div>

            <div>
                <label>Phone</label>:
                <input type="text" name="phone" value="{{$data->phone}}">
            </div>

            <div>
                <label>Address</label>:
                <textarea name="address">{{$data->address}}</textarea>
            </div>
            
            <div>
                <input class="btn btn-primary" type="Submit" value="Update User">
            </div>
        </form>
        </div> 
    </div>

    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- /.content -->
  </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    
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
<!-- jQuery -->
</body>
</html>