<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css');
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  @include('admin.header');
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar');
  <div class="content-wrapper">
    <div class="content-header">
        <h1>Update Category</h1>
    </div>
    <form action="{{url('update_category',$data->id)}}" method="post" class="d-flex justify-content-center">
      @csrf
        <div>
            <input type="text" name="category" value="{{$data->category}}">
            <input class="btn btn-primary" type="submit" value="Update Category">
        </div>
    </form>
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