<form method="POST" action="<?php echo site_url('mitra/users/update_post'); ?>">
    <div class="card mt-3">
        <div class="card-header">
            <h4><?=$content_title?></h4>
        </div>
        <div class="card-body">
            <!-- cek validasi -->
            <?php
                $inputs  = session()->getFlashdata('inputs');
                $errors  = session()->getFlashdata('errors');
                $success = session()->getFlashdata('success');

                if(!empty($errors))
                { 
            ?>
                <div class="alert alert-danger" role="alert">
                    Terjadi kesalahan pada input data :
                    <ul>
                        <?php foreach ($errors->messages as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php
                }
            ?>

            <input type="hidden" class="form-control form-control-sm" name="id_pengguna" id="id_pengguna" value="<?= !empty($data) ? $data['id_pengguna'] : ""; ?>">
            <div class="form-group">
                <label for="owner">Nama</label>
                <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Silah isi nama" value="<?= !empty($data) ? $data['nama'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Jenis Kelamin</label>
                <input type="text" class="form-control form-control-sm" name="gender" id="gender" placeholder="Silahkan isi jenis kelamin" value="<?= !empty($data) ? $data['gender'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">No. Telepon</label>
                <input type="text" class="form-control form-control-sm" name="telpon" id="telpon" placeholder="Silahkan isi nomor telpon" value="<?= !empty($data) ? $data['telpon'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Email</label>
                <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Silahkan isi email" value="<?= !empty($data) ? $data['email'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Peran Pengguna</label>
                <input type="text" class="form-control form-control-sm" name="peran_pengguna" id="peran_pengguna" placeholder="Silahkan isi peran pengguna" value="<?= !empty($data) ? $data['peran_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Instansi</label>
                <input type="text" class="form-control form-control-sm" name="instansi_pengguna" id="instansi_pengguna" placeholder="Silahkan isi Instansi" value="<?= !empty($data) ? $data['instansi_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">ID Instansi</label>
                <input type="text" class="form-control form-control-sm" name="id_instansi_pengguna" id="id_instansi_pengguna" placeholder="Silahkan isi ID Instansi" value="<?= !empty($data) ? $data['id_instansi_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Nama Instansi</label>
                <input type="text" class="form-control form-control-sm" name="nama_instansi" id="nama_instansi" placeholder="Silahkan isi Nama Instansi" value="<?= !empty($data) ? $data['nama_instansi'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Jabatan</label>
                <input type="text" class="form-control form-control-sm" name="jabatan" id="jabatan" placeholder="Silahkan isi Jabatan" value="<?= !empty($data) ? $data['jabatan'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NITK</label>
                <input type="text" class="form-control form-control-sm" name="nitk" id="nitk" placeholder="Silahkan isi NITK" value="<?= !empty($data) ? $data['nitk'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NUPTK</label>
                <input type="text" class="form-control form-control-sm" name="nuptk" id="nuptk" placeholder="Silahkan isi NUPTK" value="<?= !empty($data) ? $data['nuptk'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NIP</label>
                <input type="text" class="form-control form-control-sm" name="nip" id="nip" placeholder="Silahkan isi NIP" value="<?= !empty($data) ? $data['nip'] : ""; ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="save btn btn-success">Simpan</button>
            <button type="button" class="back btn btn-warning float-right">Kembali</button>
        </div>
    </div>
</form>