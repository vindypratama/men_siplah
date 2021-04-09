            
<form method="POST" action="<?php echo site_url('mitra/users/add_post'); ?>">
    <div class="card mt-3">
        <div class="card-header">
            <h4><?=$content_title?></h4>
        </div>
        <div class="card-body">
            <!-- cek validasi -->
            <!-- <?php
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
            ?> -->
            <div class="form-group">
                <label for="owner">Nama</label>
                <input type="text" class="form-control form-control-sm" name="nama" id="nama" placeholder="Silahkan isi nama" value="<?= !empty($inputs) ? $inputs['nama'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Jenis Kelamin</label>
                <input type="text" class="form-control form-control-sm" name="gender" id="gender" placeholder="Silahkan isi jenis kelamin" value="<?= !empty($inputs) ? $inputs['gender'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">No. Telepon</label>
                <input type="text" class="form-control form-control-sm" name="telpon" id="telpon" placeholder="Silahkan isi nomor telpon" value="<?= !empty($inputs) ? $inputs['telpon'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Email</label>
                <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Silahkan isi email" value="<?= !empty($inputs) ? $inputs['email'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Peran Pengguna</label>
                <input type="text" class="form-control form-control-sm" name="peran_pengguna" id="peran_pengguna" placeholder="Silahkan isi peran pengguna" value="<?= !empty($inputs) ? $inputs['peran_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Instansi</label>
                <input type="text" class="form-control form-control-sm" name="instansi_pengguna" id="instansi_pengguna" placeholder="Silahkan isi Instansi" value="<?= !empty($inputs) ? $inputs['instansi_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">ID Instansi</label>
                <input type="text" class="form-control form-control-sm" name="id_instansi_pengguna" id="id_instansi_pengguna" placeholder="Silahkan isi ID Instansi" value="<?= !empty($inputs) ? $inputs['id_instansi_pengguna'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Nama Instansi</label>
                <input type="text" class="form-control form-control-sm" name="nama_instansi" id="nama_instansi" placeholder="Silahkan isi Nama Instansi" value="<?= !empty($inputs) ? $inputs['nama_instansi'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Jabatan</label>
                <input type="text" class="form-control form-control-sm" name="jabatan" id="jabatan" placeholder="Silahkan isi Jabatan" value="<?= !empty($inputs) ? $inputs['jabatan'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NITK</label>
                <input type="text" class="form-control form-control-sm" name="nitk" id="nitk" placeholder="Silahkan isi NITK" value="<?= !empty($inputs) ? $inputs['nitk'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NUPTK</label>
                <input type="text" class="form-control form-control-sm" name="nuptk" id="nuptk" placeholder="Silahkan isi NUPTK" value="<?= !empty($inputs) ? $inputs['nuptk'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">NIP</label>
                <input type="text" class="form-control form-control-sm" name="nip" id="nip" placeholder="Silahkan isi NIP" value="<?= !empty($inputs) ? $inputs['nip'] : ""; ?>">
            </div>
            <div class="form-group">
                <label for="owner">Password</label>
                <input type="password" class="form-control form-control-sm" name="passwd" id="passwd" placeholder="Silahkan isi password" value="<?= !empty($inputs) ? $inputs['passwd'] : ""; ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="save btn btn-success">Simpan</button>
            <button type="button" class="back btn btn-warning float-right">Kembali</button>
        </div>
    </div>
</form>