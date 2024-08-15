@include('layouts.header')
@include('layouts.sidebar')

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

<a href="{{ route('menu.create') }}" class="btn btn-primary mb-3">Create</a>
<table class="table table-bordered" id="example">
    <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Parent ID</th>
            <th>Order</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($menu as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->slug}}</td>
            <td>{{$item->parent_id}}</td>
            <td>{{$item->order}}</td>
            <td>
                <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#modal-{{$item->id}}">Edit</a>
                <a href="{{ route('menu.destroy', $item->id) }}" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</a>
                <div class="modal fade" id="modal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel">Edit Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('menu.update', $item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{$item->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter slug" value="{{$item->slug}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="parent_id">Parent ID</label>
                                        <input type="number" name="parent_id" id="parent_id" class="form-control" placeholder="Enter parent_id" value="{{$item->parent_id}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="order">Order</label>
                                        <input type="number" name="order" id="order" class="form-control" placeholder="Enter order" value="{{$item->order}}">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        </tr>
    @endforeach
    </tbody>
</table>



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

@include('layouts.footer')