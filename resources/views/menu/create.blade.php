@include ('layouts.header')
@include ('layouts.sidebar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard v3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
<form action="{{ route('menu.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug">
    </div>
    <div class="form-group">
        <label for="parent_id">Parent ID</label>
        <input type="number" name="parent_id" id="parent_id" class="form-control" placeholder="Enter parent_id">
    </div>
    <div class="form-group">
        <label for="order">Order</label>
        <input type="number" name="order" id="order" class="form-control" placeholder="Enter order">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


@include ('layouts.footer')