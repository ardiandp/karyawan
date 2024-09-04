<form method="POST" action="{{ route('bpjs.store') }}">
    @csrf
<div class="form-group">
    <label for="nik">NIK</label>
    <input type="text" class="form-control" id="nik" name="nik" required>
</div>

<div class="form-group">
    <label for="no_akun">No. Akun</label>
    <input type="text" class="form-control" id="no_akun" name="no_akun">
</div>

<div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" id="nama" name="nama">
</div>

<div class="form-group">
    <label for="no_va">No. VA</label>
    <input type="text" class="form-control" id="no_va" name="no_va">
</div>

<div class="form-group">
    <label for="hub_keluarga">Hubungan Keluarga</label>
    <input type="text" class="form-control" id="hub_keluarga" name="hub_keluarga">
</div>

<div class="form-group">
    <label for="terdaftar">Terdaftar</label>
    <input type="text" class="form-control" id="terdaftar" name="terdaftar">
</div>

<div class="form-group">
    <label for="aktif">Aktif</label>
    <select class="form-control" id="aktif" name="aktif">
        <option value="1">Aktif</option>
        <option value="0">Tidak Aktif</option>
    </select>
</div>

<div class="form-group">
    <label for="parent">Parent</label>
    <input type="text" class="form-control" id="parent" name="parent">
</div>

<div class="form-group">
    <label for="karyawan">Karyawan</label>
    <input type="text" class="form-control" id="karyawan" name="karyawan">
</div>

<div class="form-group">
    <label for="kelas">Kelas</label>
    <input type="text" class="form-control" id="kelas" name="kelas">
</div>

<div class="form-group">
    <label for="biaya">Biaya</label>
    <input type="text" class="form-control" id="biaya" name="biaya">
</div>

<div class="form-group">
    <label for="type">Type</label>
    <input type="text" class="form-control" id="type" name="type">
</div>
<input type="submit" class="btn btn-primary" value="Submit">

</form>
