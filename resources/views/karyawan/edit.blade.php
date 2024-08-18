@include ('layouts.header')
@include ('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
       <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="row">
        <div class="col-md-8">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Data Karyawan</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="nama_depan">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="Nama Depan" value="{{$karyawan->nama_depan}}">
              </div>
              <div class="form-group">
                <label for="nama_belakang">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang" value="{{$karyawan->nama_belakang}}">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$karyawan->email}}">
              </div>
              <div class="form-group">
                <label for="telepon">Telepon</label>
                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon" value="{{$karyawan->telepon}}">
              </div>
              <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="{{$karyawan->tempat_lahir}}">
              </div>
              <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="{{$karyawan->tanggal_lahir}}">
              </div>
              <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                  <option value="Laki-laki" {{$karyawan->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                  <option value="Perempuan" {{$karyawan->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{$karyawan->alamat}}</textarea>
              </div>
              <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="{{$karyawan->jabatan}}">
              </div>
              <div class="form-group">
                <label for="agama">Agama</label>
                <select class="form-control" id="agama" name="agama">
                  <option value="Islam" {{$karyawan->agama == 'Islam' ? 'selected' : ''}}>Islam</option>
                  <option value="Kristen" {{$karyawan->agama == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                  <option value="Hindu" {{$karyawan->agama == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                  <option value="Budha" {{$karyawan->agama == 'Budha' ? 'selected' : ''}}>Budha</option>
                </select>
              </div>
              <div class="form-group">
                <label for="status_pegawai">Status Pegawai</label>
                <select class="form-control" id="status_pegawai" name="status_pegawai">
                  <option value="Aktif" {{$karyawan->status_pegawai == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                  <option value="Tidak Aktif" {{$karyawan->status_pegawai == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Photo & Tanggal Bergabung</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" class="form-control" id="photo" name="photo">
              </div>
              <div class="form-group">
                <label for="tanggal_bergabung">Tanggal Bergabung</label>
                <input type="date" class="form-control" id="tanggal_bergabung" name="tanggal_bergabung" placeholder="Tanggal Bergabung" value="{{$karyawan->tanggal_bergabung}}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-warning">Update Data</button>
                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
      <!-- /.card -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include  ('layouts.footer')