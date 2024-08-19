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
                          @method('put')
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
                <h5 class="modal-title" id="addPendidikan">Add Pengalaman Kerja</h5>
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
        {{ $karyawan->berkas }} Berkas disini 
      </div>
      <div class="tab-pane fade" id="pelatihan" role="tabpanel" aria-labelledby="pelatihan-tab">
        {{ $karyawan->pelatihan }} pelatihan disini
      </div>
      <div class="tab-pane fade" id="penghargaan" role="tabpanel" aria-labelledby="penghargaan-tab">
        {{ $karyawan->penghargaan }} Penghargaa
      </div>
      <div class="tab-pane fade" id="keahlian" role="tabpanel" aria-labelledby="keahlian-tab">
        {{ $karyawan->keahlian }} Keahlian 
      </div>
    </div>
  </div>
</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include  ('layouts.footer')