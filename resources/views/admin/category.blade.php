<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')
<style type="text/css">
    input[type="text"]
    {
        width:400px;
        height:45px;
    }
    .div_deg
    {
        display:flex;
        justify-content:center;
        align-items:center;
        margin:30px;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  

  <!-- Navbar -->
  @include('admin.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar')
  <!-- Content Wrapper. Contains page content -->

  




  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h1>Add Category</h1>
        <div class="div_deg">
        <form action="{{url('add_category')}}" method="post">
          @csrf
            <div>
                <input type="text" name="category">
                <input class="btn btn-primary" type="submit" value="Add Category">
            </div>
        </form>
        </div> 
        <div> 
        <table class="align-items-center table table-hover">
          <tr>
            <th class="d-flex justify-content-center">Category Name</th>
            <th width="200px">Edit</th>
            <th width="200px">Delete</th>
          </tr>
          <tr>
            @foreach($cate as $c1)
              <td class="d-flex justify-content-center">{{$c1->category}}</td>
              <td><a class="btn btn-info" href="{{url('edit_category',$c1->id)}}" width="200px">Edit</a></td>
              <td><a class="btn btn-danger" href="{{url('delete_category',$c1->id)}}" onclick="confirmation(event)" width="200px">Delete</a></td></tr><tr>
            @endforeach
          </tr>
        </table>
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
@include('admin.footer')
<!-- jQuery -->
</body>
</html>