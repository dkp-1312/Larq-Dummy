<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.css');
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
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
            <h1 class="m-0">Order Page</h1>
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
    <div> 
          <table class="align-items-center table table-hover">
          <tr>
            <th class="d-flex justify-content-center">Customer Name</th>
            <th >Address</th>
            <th >Phone</th>
            <th >Product Title</th>
            <th >Price</th>
            <th >Image</th>
            <th >Status</th>
            <th >Change Status</th>
            <!-- <th >Print PDF</th> -->
          </tr>
          
            @foreach($data as $c1)
            <tr> 
            <td width="170px" class="d-flex justify-content-center">{{$c1->name}}</td>
              <td >{!!Str::limit($c1->rec_address,30)!!}</td>
              <td >{{$c1->phone}}</td>
              <td >{{$c1->product->title}}</td>
              <td >{{$c1->product->price}}</td>
              <td>
                <img src="photo/product/{{$c1->product->image}}" width="120px" height="120px">
              </td>
              <td >
                @if($c1->status=='in progress')
                    <span style="color:red;">{{$c1->status}}</span>
                @elseif($c1->status=='On The Way')
                    <span style="color:blue;">{{$c1->status}}</span>
                @else
                    <span style="color:green;">{{$c1->status}}</span>
                @endif
                </td>
                <td width="200px">
                <a href="{{url('on_the_way',$c1->id)}}" class="btn btn-primary m-1">On the Way</a>
                <a href="{{url('delivered',$c1->id)}}" class="btn btn-success m-1">Delivered</a>
              </td>
                <!-- <td width="200px"><a href="{{url('print_pdf',$c1->id)}}" class="btn btn-danger">Print PDF</a></td> -->
              
              
              </tr>
              @endforeach
          
        </table>
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