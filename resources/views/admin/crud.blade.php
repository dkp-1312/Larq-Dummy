<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css')
<style type="text/css">
    .div_deg
    {
        display:flex;
        justify-content:center;
        align-items:center;
        margin:30px;
    }
    label
    {
        width:90px;
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
        <h1>Add User</h1>
        <div class="d-block-flex justify-content-center align-items-center col-md-10 my-3">
        <form action="{{url('add_user')}}" method="post">
          @csrf
            <div class="container">
                <div class="row">
                <div class="col">
                    <label>Name</label>:
                    <input type="text" name="name" class="w-50"><br>
                    <label>Mo No.</label>:
                    <input type="text" name="phone" class="w-50"><br>
                    <label>Password</label>:
                    <input type="password" name="password" class="w-50" min="8"><br>
                </div>
                <div class="col">
                    <label>Email</label>:
                    <input type="text" name="email" class="w-75"><br>
                    <label>Address</label>:
                    <textarea name="address" class="w-100"></textarea><br>
                </div>
                </div>
               <input class="btn btn-primary mb-3 float-right" type="submit" value="Add User">
            </div>
        </form>
        </div> 
        <div> 
          <table class="align-items-center table table-hover">
          <tr>
            <th class="d-flex justify-content-center">Name</th>
            <th >Email</th>
            <th >Phone</th>
            <th >Address</th>
            <th width="200px">Edit</th>
            <th width="200px">Delete</th>
          </tr>
          <tr>
            @foreach($user as $c1)
              <td width="170px" class="d-flex justify-content-center">{{$c1->name}}</td>
              <td >{{$c1->email}}</td>
              <td >{{$c1->phone}}</td>
              <td >{!!Str::limit($c1->address,30)!!}</td>
              <td><a class="btn btn-info" href="{{url('edit_user',$c1->id)}}" width="200px">Edit</a></td>
              <td><a class="btn btn-danger" href="{{url('delete_user',$c1->id)}}" onclick="confirmation(event)" width="200px">Delete</a></td></tr><tr>
            @endforeach
          </tr>
        </table>
        </div>
        <div class="d-flex justify-content-center m-4">
          {{$user->onEachSide(1)->links()}}
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