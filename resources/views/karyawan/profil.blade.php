@include ('layouts.header')
@include ('layouts.sidebar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil : [ {{ $karyawan->nama_depan }} ] </h1>
           
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
<div class="card">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs" id="profil-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="anggota-keluarga-tab" data-toggle="tab" href="#anggota-keluarga" role="tab" aria-controls="anggota-keluarga" aria-selected="true">Anggota Keluarga</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pendidikan-tab" data-toggle="tab" href="#pendidikan" role="tab" aria-controls="pendidikan" aria-selected="false">Pendidikan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pengalaman-kerja-tab" data-toggle="tab" href="#pengalaman-kerja" role="tab" aria-controls="pengalaman-kerja" aria-selected="false">Pengalaman Kerja</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="berkas-tab" data-toggle="tab" href="#berkas" role="tab" aria-controls="berkas" aria-selected="false">Berkas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pelatihan-tab" data-toggle="tab" href="#pelatihan" role="tab" aria-controls="pelatihan" aria-selected="false">Pelatihan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="penghargaan-tab" data-toggle="tab" href="#penghargaan" role="tab" aria-controls="penghargaan" aria-selected="false">Penghargaan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="keahlian-tab" data-toggle="tab" href="#keahlian" role="tab" aria-controls="keahlian" aria-selected="false">Keahlian</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="profil-tabContent">
      <div class="tab-pane fade show active" id="anggota-keluarga" role="tabpanel" aria-labelledby="anggota-keluarga-tab">
        {{ $karyawan->anggota_keluarga }} 
        <!-- coding awak disini --> 
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_anggota_keluarga">Tambah Anggota</button>
        <!-- Modal -->
        <div class="modal fade" id="add_anggota_keluarga" tabindex="-1" role="dialog" aria-labelledby="add_anggota_keluarga_label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_anggota_keluarga_label">Tambah Anggota Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.anggotakeluargastore', $karyawan->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <input type="text" name="id" value="{{ $karyawan->id }}" hidden >
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
                  </div>
                  <div class="form-group">
                    <label for="hubungan">Hubungan</label>
                    <input type="text" class="form-control" id="hubungan" name="hubungan" placeholder="Hubungan">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                  </div>
                  <div class="form-group">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <table id="example" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Hubungan</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Telepon</th>
          <th scope="col">Alamat</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($karyawan->anggotaKeluarga as $anggota_keluarga)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $anggota_keluarga->nama }}</td>
                <td>{{ $anggota_keluarga->hubungan }}</td>
                <td>{{ $anggota_keluarga->tanggal_lahir }}</td>
                <td>{{ $anggota_keluarga->telepon }}</td>
                <td>{{ $anggota_keluarga->alamat }}</td>
                <td>
                  <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit_anggota_keluarga_{{ $anggota_keluarga->id }}">Edit</a>
                  <a href="{{ route('karyawan.anggotakeluargadelete', $anggota_keluarga->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>

                  <div class="modal fade" id="edit_anggota_keluarga_{{ $anggota_keluarga->id }}" tabindex="-1" role="dialog" aria-labelledby="edit_anggota_keluarga_label_{{ $anggota_keluarga->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="edit_anggota_keluarga_label_{{ $anggota_keluarga->id }}">Edit Anggota Keluarga</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('karyawan.anggotakeluargaupdate', $anggota_keluarga->id) }}" method="POST">
                            @csrf
                           
                            <input type="hidden" name="id" value="{{ $karyawan->id }}">
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota_keluarga->nama }}">
                            </div>
                            <div class="form-group">
                              <label for="hubungan">Hubungan</label>
                              <input type="text" class="form-control" id="hubungan" name="hubungan" value="{{ $anggota_keluarga->hubungan }}">
                            </div>
                            <div class="form-group">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $anggota_keluarga->tanggal_lahir }}">
                            </div>
                            <div class="form-group">
                              <label for="telepon">Telepon</label>
                              <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $anggota_keluarga->telepon }}">
                            </div>
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <textarea class="form-control" id="alamat" name="alamat">{{ $anggota_keluarga->alamat }}</textarea>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
            </tr>
        @endforeach
       
      </tbody>
    </table>

   <!-- coding akhir disini -->
    </div>
      <div class="tab-pane fade" id="pendidikan" role="tabpanel" aria-labelledby="pendidikan-tab">
        Pendidikan

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Institusi</th>
              <th>Jenjang</th>
              <th>Gelar</th>
              <th>Bidang Studi</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Nilai</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan->pendidikan as $pendidikan)
            <tr>
              <td>{{ $pendidikan->nama_institusi }}</td>
              <td>{{ $pendidikan->jenjang }}</td>
              <td>{{ $pendidikan->gelar }}</td>
              <td>{{ $pendidikan->bidang_studi }}</td>
              <td>{{ $pendidikan->tanggal_mulai }}</td>
              <td>{{ $pendidikan->tanggal_selesai }}</td>
              <td>{{ $pendidikan->nilai }}</td>
              <td>{{ $pendidikan->deskripsi }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPendidikan{{ $pendidikan->id }}">
                  Edit
                </button>
                <a href="{{ route('karyawan.pendidikandelete', [$karyawan->id, $pendidikan->id]) }}" class="btn btn-sm btn-danger">Hapus</a>
            
                <div class="modal fade" id="editPendidikan{{ $pendidikan->id }}" tabindex="-1" role="dialog" aria-labelledby="editPendidikanLabel{{ $pendidikan->id }}" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editPendidikanLabel{{ $pendidikan->id }}">Edit Pendidikan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('karyawan.pendidikanupdate', [$karyawan->id, $pendidikan->id]) }}" method="post">
                          @csrf
                          @method('post')
                          <div class="form-group">
                            <label for="nama_institusi">Nama Institusi</label>
                            <input type="text" class="form-control" id="nama_institusi" name="nama_institusi" value="{{ $pendidikan->nama_institusi }}">
                          </div>
                          <div class="form-group">
                            <label for="jenjang">Jenjang</label>
                            <input type="text" class="form-control" id="jenjang" name="jenjang" value="{{ $pendidikan->jenjang }}">
                          </div>
                          <div class="form-group">
                            <label for="gelar">Gelar</label>
                            <input type="text" class="form-control" id="gelar" name="gelar" value="{{ $pendidikan->gelar }}">
                          </div>
                          <div class="form-group">
                            <label for="bidang_studi">Bidang Studi</label>
                            <input type="text" class="form-control" id="bidang_studi" name="bidang_studi" value="{{ $pendidikan->bidang_studi }}">
                          </div>
                          <div class="form-group">
                            <label for="tanggal_mulai">Tanggal Mulai</label>
                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ $pendidikan->tanggal_mulai }}">
                          </div>
                          <div class="form-group">
                            <label for="tanggal_selesai">Tanggal Selesai</label>
                            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $pendidikan->tanggal_selesai }}">
                          </div>
                          <div class="form-group">
                            <label for="nilai">Nilai</label>
                            <input type="text" class="form-control" id="nilai" name="nilai" value="{{ $pendidikan->nilai }}">
                          </div>
                          <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $pendidikan->deskripsi }}</textarea>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPendidikan">
          Add Pendidikan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addPendidikan" tabindex="-1" aria-labelledby="addPengalamanLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addPendidikan">Add Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('karyawan.pendidikanstore', $karyawan->id) }}" method="POST">
                  @csrf
                  <div class="form-group">
                    <label for="nama_institusi">Nama Institusi</label>
                    <input type="text" class="form-control" id="nama_institusi" name="nama_institusi">
                  </div>
                  <div class="form-group">
                    <label for="jenjang">Jenjang</label>
                    <input type="text" class="form-control" id="jenjang" name="jenjang">
                  </div>
                  <div class="form-group">
                    <label for="gelar">Gelar</label>
                    <input type="text" class="form-control" id="gelar" name="gelar">
                  </div>
                  <div class="form-group">
                    <label for="bidang_studi">Bidang Studi</label>
                    <input type="text" class="form-control" id="bidang_studi" name="bidang_studi">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_mulai">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_selesai">Tanggal Selesai</label>
                    <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai">
                  </div>
                  <div class="form-group">
                    <label for="nilai">Nilai</label>
                    <input type="text" class="form-control" id="nilai" name="nilai">
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->


        

     
      </div>
      <div class="tab-pane fade" id="pengalaman-kerja" role="tabpanel" aria-labelledby="pengalaman-kerja-tab">
        {{ $karyawan->pengalaman_kerja }}
        Pengalaman kerja

      </div>
      <div class="tab-pane fade" id="berkas" role="tabpanel" aria-labelledby="berkas-tab">
     
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Jenis Berkas</th>
              <th>Nama Berkas</th>
              <th>Path Berkas</th>
              <th>Tanggal Terbit</th>
              <th>Tanggal Kadaluarsa</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan->berkas as $berkas)
            <tr>
              <td>{{ $berkas->jenis_berkas }}</td>
              <td>{{ $berkas->nama_berkas }}</td>
              <td>{{ $berkas->path_berkas }}</td>
              <td>{{ $berkas->tanggal_terbit }}</td>
              <td>{{ $berkas->tanggal_kadaluarsa }}</td>
              <td style="display: flex; align-items: center;">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_berkas_{{ $berkas->id }}">Edit</a>
                <form action="{{ route('karyawan.berkasdelete', [$karyawan->id, $berkas->id]) }}" method="POST" style="margin-left: 10px;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_berkas">Tambah Berkas</a>
        <div class="modal fade" id="add_berkas" tabindex="-1" role="dialog" aria-labelledby="add_berkas_label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_berkas_label">Tambah Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.berkasstore', $karyawan->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="jenis_berkas">Jenis Berkas</label>
                    <input type="text" class="form-control" id="jenis_berkas" name="jenis_berkas">
                  </div>
                  <div class="form-group">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" class="form-control" id="nama_berkas" name="nama_berkas">
                  </div>
                  <div class="form-group">
                    <label for="path_berkas">Path Berkas</label>
                    <input type="text" class="form-control" id="path_berkas" name="path_berkas">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_terbit">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @foreach ($karyawan->berkas as $berkas)
        <div class="modal fade" id="edit_berkas_{{ $berkas->id }}" tabindex="-1" role="dialog" aria-labelledby="edit_berkas_label_{{ $berkas->id }}" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="edit_berkas_label_{{ $berkas->id }}">Edit Berkas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.berkasupdate', [$karyawan->id, $berkas->id]) }}" method="POST">
                @csrf
                @method('post')
                <div class="modal-body">
                  <div class="form-group">
                    <label for="jenis_berkas">Jenis Berkas</label>
                    <input type="text" class="form-control" id="jenis_berkas" name="jenis_berkas" value="{{ $berkas->jenis_berkas }}">
                  </div>
                  <div class="form-group">
                    <label for="nama_berkas">Nama Berkas</label>
                    <input type="text" class="form-control" id="nama_berkas" name="nama_berkas" value="{{ $berkas->nama_berkas }}">
                  </div>
                  <div class="form-group">
                    <label for="path_berkas">Path Berkas</label>
                    <input type="text" class="form-control" id="path_berkas" name="path_berkas" value="{{ $berkas->path_berkas }}">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_terbit">Tanggal Terbit</label>
                    <input type="date" class="form-control" id="tanggal_terbit" name="tanggal_terbit" value="{{ $berkas->tanggal_terbit }}">
                  </div>
                  <div class="form-group">
                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                    <input type="date" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" value="{{ $berkas->tanggal_kadaluarsa }}">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      <div class="tab-pane fade" id="pelatihan" role="tabpanel" aria-labelledby="pelatihan-tab">
      
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Pelatihan</th>
              <th>Penyelenggara</th>
              <th>Tanggal </th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan->pelatihan as $pelatihan)
            <tr>
              <td>{{ $pelatihan->nama_pelatihan }}</td>
              <td>{{ $pelatihan->penyelenggara_pelatihan }}</td>
              <td>{{ $pelatihan->tanggal_pelatihan }}</td>
              <td style="display: flex; align-items: center;">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_pelatihan_{{ $pelatihan->id }}">Edit</a>
                <div class="modal fade" id="edit_pelatihan_{{ $pelatihan->id }}" tabindex="-1" aria-labelledby="edit_pelatihan_{{ $pelatihan->id }}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="edit_pelatihan_{{ $pelatihan->id }}Label">Edit Pelatihan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('karyawan.pelatihanupdate', [$karyawan->id, $pelatihan->id]) }}" method="POST">
                        @csrf
                        @method('post')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama_pelatihan">Nama Pelatihan</label>
                            <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" value="{{ $pelatihan->nama_pelatihan }}">
                          </div>
                          <div class="form-group">
                            <label for="penyelenggara_pelatihan">Penyelenggara Pelatihan</label>
                            <input type="text" class="form-control" id="penyelenggara_pelatihan" name="penyelenggara_pelatihan" value="{{ $pelatihan->penyelenggara_pelatihan }}">
                          </div>
                          <div class="form-group">
                            <label for="tanggal_pelatihan">Tanggal Pelatihan</label>
                            <input type="date" class="form-control" id="tanggal_pelatihan" name="tanggal_pelatihan" value="{{ $pelatihan->tanggal_pelatihan }}">
                          </div>
                          <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $pelatihan->deskripsi }}</textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <form action="{{ route('karyawan.pelatihandelete', [$karyawan->id, $pelatihan->id]) }}" method="POST" style="margin-left: 10px;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_pelatihan">Tambah Pelatihan</a>
        <div class="modal fade" id="add_pelatihan" tabindex="-1" aria-labelledby="add_pelatihanLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_pelatihanLabel">Tambah Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.pelatihanstore', $karyawan->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_pelatihan">Nama Pelatihan</label>
                    <input type="text" class="form-control" id="nama_pelatihan" name="nama_pelatihan" required>
                  </div>
                  <div class="form-group">
                    <label for="penyelenggara_pelatihan">Penyelenggara Pelatihan</label>
                    <input type="text" class="form-control" id="penyelenggara_pelatihan" name="penyelenggara_pelatihan" required>
                  </div>
                  <div class="form-group">
                    <label for="tanggal_pelatihan">Tanggal Pelatihan</label>
                    <input type="date" class="form-control" id="tanggal_pelatihan" name="tanggal_pelatihan" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="penghargaan" role="tabpanel" aria-labelledby="penghargaan-tab">
        

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Nama Penghargaan</th>
              <th>Tahun</th>
              <th>Deskripsi</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan->penghargaan as $penghargaan)
            <tr>
              <td>{{ $penghargaan->nama_penghargaan }}</td>
              <td>{{ $penghargaan->tanggal_penghargaan }}</td>
              <td>{{ $penghargaan->deskripsi_penghargaan }}</td>
              <td style="display: flex; align-items: center;">
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit_penghargaan_{{ $penghargaan->id }}">Edit</a>
                <div class="modal fade" id="edit_penghargaan_{{ $penghargaan->id }}" tabindex="-1" aria-labelledby="edit_penghargaan_{{ $penghargaan->id }}Label" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="edit_penghargaan_{{ $penghargaan->id }}Label">Edit Penghargaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="{{ route('karyawan.penghargaanupdate', [$karyawan->id, $penghargaan->id]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="modal-body">
                          <div class="form-group">
                            <label for="nama_penghargaan">Nama Penghargaan</label>
                            <input type="text" class="form-control" id="nama_penghargaan" name="nama_penghargaan" value="{{ $penghargaan->nama_penghargaan }}" required>
                          </div>
                          <div class="form-group">
                            <label for="tanggal_penghargaan">Tanggal Penghargaan</label>
                            <input type="text" class="form-control" id="tanggal_penghargaan" name="tanggal_penghargaan" value="{{ $penghargaan->tanggal_penghargaan }}" required>
                          </div>
                          <div class="form-group">
                            <label for="deskripsi_penghargaan">Deskripsi Penghargaan</label>
                            <textarea class="form-control" id="deskripsi_penghargaan" name="deskripsi_penghargaan">{{ $penghargaan->deskripsi_penghargaan }}</textarea>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <form action="{{ route('karyawan.penghargaandelete', [$karyawan->id, $penghargaan->id]) }}" method="POST" style="margin-left: 10px;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
              </td>
            </tr>

            
            @endforeach
          </tbody>
        </table>
        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_penghargaan">Tambah Penghargaan</a>
        <!-- Modal tambah penghargaan -->
        <div class="modal fade" id="add_penghargaan" tabindex="-1" role="dialog" aria-labelledby="add_penghargaanLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_penghargaanLabel">Tambah Penghargaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.penghargaanstore', $karyawan->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_penghargaan">Nama Penghargaan</label>
                    <input type="text" class="form-control" id="nama_penghargaan" name="nama_penghargaan" required>
                  </div>
                  <div class="form-group">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control" id="tahun" name="tanggal_penghargaan" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi_penghargaan"></textarea>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="keahlian" role="tabpanel" aria-labelledby="keahlian-tab">
      
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_keahlian">
          Tambah Keahlian
        </button>
        
        <!-- Modal tambah keahlian -->
        <div class="modal fade" id="add_keahlian" tabindex="-1" role="dialog" aria-labelledby="add_keahlianLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="add_keahlianLabel">Tambah Keahlian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="{{ route('karyawan.keahlianstore', $karyawan->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label for="nama_keahlian">Nama Keahlian</label>
                    <input type="text" class="form-control" id="nama_keahlian" name="nama_keahlian" required>
                  </div>
                  <div class="form-group">
                    <label for="tingkat_keahlian">Tingkat Keahlian</label>
                    <input type="text" class="form-control" id="tingkat_keahlian" name="tingkat_keahlian" required>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Keahlian</th>
              <th>Tingkat Keahlian</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($karyawan->keahlian as $keahlian)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $keahlian->nama_keahlian }}</td>
                <td>{{ $keahlian->tingkat_keahlian }}</td>
                <td style="display: flex; align-items: center;">

                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_keahlian{{ $keahlian->id }}">
                    Edit
                  </button>
                  <div class="modal fade" id="edit_keahlian{{ $keahlian->id }}" tabindex="-1" role="dialog" aria-labelledby="edit_keahlianLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="edit_keahlianLabel">Edit Keahlian</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ route('karyawan.keahlianupdate',   [$karyawan->id, $keahlian->id]) }}" method="POST">
                          @csrf
                          @method('post')
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="nama_keahlian">Nama Keahlian</label>
                              <input type="text" class="form-control" id="nama_keahlian" name="nama_keahlian" value="{{ $keahlian->nama_keahlian }}" required>
                            </div>
                            <div class="form-group">
                              <label for="tingkat_keahlian">Tingkat Keahlian</label>
                              <input type="text" class="form-control" id="tingkat_keahlian" name="tingkat_keahlian" value="{{ $keahlian->tingkat_keahlian }}" required>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <form action="{{ route('karyawan.keahliandelete',  [$karyawan->id, $keahlian->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                  </form>

                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include  ('layouts.footer')