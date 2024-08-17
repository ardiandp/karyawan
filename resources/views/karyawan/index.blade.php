@include ('layouts.header')
@include ('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
         
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
                <h3 class="card-title">DataTable with default features</h3>
                <div class="card-tools">
                    <a href="{{ route('karyawan.create') }}" class="btn btn-success"><i class="fas fa-plus"></i>  Tambah Baru</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                   <td>Nama Depan </td>
                   <td>Email</td>
                   <td>Telp </td>
                   <td>Satus </td>
                   <td>Action</td>
                  </tr>
                  </thead>
                  <tbody>
                 
                  @foreach ($karyawan as $karyawan)
                   <tr>
                     <td>{{$karyawan->nama_depan}}</td>
                     <td>{{$karyawan->email}}</td>
                     <td>{{$karyawan->telepon}}</td>
                     <td>{{$karyawan->status_pegawai}}</td>
                     <td>
                       <a href="/karyawan/edit/{{ $karyawan->id}}" class="btn btn-primary">Edit</a>
                       <form action="/karyawan/{{$karyawan->id}}" method="post" class="d-inline">
                         @csrf
                         @method('delete')
                         <button type="submit" class="btn btn-danger">Delete</button>
                       </form>
                     </td>
                   </tr>
                   @endforeach 
                             
                  </tfoot>
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