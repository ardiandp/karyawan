@include ('layouts.header')
@include ('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
                <a href="#" data-toggle="modal" data-target="#modal-add-menu" class="btn btn-primary float-right">Add Menu</a>
                <div class="modal fade" id="modal-add-menu">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Add Menu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('menu.store') }}" method="post">
                          @csrf
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control">
                          </div>
                          <div class="form-group">
                            <label>Parent ID</label>
                            <select name="parent_id" class="form-control select2">
    <option value="">-- Pilih Menu Induk --</option>
    @foreach ($menu as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endforeach
</select>
                          </div>
                          <div class="form-group">
                            <label>Order</label>
                            <input type="number" name="order" class="form-control">
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
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
            <td>{{ $item->parent->name ?? 'None' }}</td>
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
                                        <select name="parent_id" class="form-control">
                                        <option value="">-- Pilih Menu Induk --</option>
                                        @foreach ($menu as $item)
                                            <option value="{{ $item->id }}" {{ $item->parent_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    @include ('layouts.footer')