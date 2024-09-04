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
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        @if(session()->has('success'))
            <script>
                swal({
                    title: "Berhasil!",
                    text: "{{ session()->get('success') }}",
                    icon: "success",
                    button: "Ok",
                });
            </script>
        @endif

        <!-- Main content -->
        <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Peserta BPJS Dian Mustika</h3>
                <div class="card-tools">
                  <a href="{{ route('bpjs.create') }}" class="btn btn-sm btn-success">Tambahkan Data Baru</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIK</th>
            <th>No Akun</th>
            <th>Hubungan Keluarga</th>
            <th>Aksi</th>
            <!-- Kolom lainnya -->
        </tr>
    </thead>
    <tbody>
        @foreach ($bpjsData as $b)
            <tr>
                <td>{{ $b['nama'] }}</td>
                <td>{{ $b['nik'] }}</td>
                <td>{{ $b['no_akun'] }}</td>
                <td>{{ $b['hub_keluarga'] }}</td>
                <td>
                 <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_{{ $b['id'] }}">Edit</a>
                 <form action="{{ route('bpjs.delete', $b['id']) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('get')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="edit_{{ $b['id'] }}" tabindex="-1" role="dialog" aria-labelledby="edit_{{ $b['id'] }}Label" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="edit_{{ $b['id'] }}Label">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('bpjs.update', $b['id']) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $b['nama'] }}">
                          </div>
                          <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="{{ $b['nik'] }}">
                          </div>
                          <div class="form-group">
                            <label for="no_akun">No Akun</label>
                            <input type="text" class="form-control" id="no_akun" name="no_akun" value="{{ $b['no_akun'] }}">
                          </div>
                          <div class="form-group">
                            <label for="hub_keluarga">Hubungan Keluarga</label>
                            <input type="text" class="form-control" id="hub_keluarga" name="hub_keluarga" value="{{ $b['hub_keluarga'] }}">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>

                </td>
                <!-- Kolom lainnya -->
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
