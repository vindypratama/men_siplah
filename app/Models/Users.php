<?php namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
	protected $DBGroup = 'default';
	protected $table      = T_PENGGUNA;
    protected $primaryKey = ID_PENGGUNA;
    
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = [
    	ID_PENGGUNA, 
        EMAIL,
        PASSWD,
    	OTP,
        VERIFY_CODE,
        RESET_CODE,
        NAMA,
        TELPON,
        FOTO_PROFIL,
        INSTANSI_PENGGUNA,
        ID_INSTANSI_PENGGUNA,
        NAMA_INSTANSI,
        JABATAN,
        NITK,
        NUPTK,
        NIP,
        AKTIF,
        DIBUAT_TANGGAL,
        DIBUAT_OLEH,
        DIUBAH_TANGGAL,
        DIUBAH_OLEH,
        DIHAPUS_TANGGAL,
        DIHAPUS_OLEH
    ];

    protected $useTimestamps = true;

    protected $createdField  = DIBUAT_TANGGAL;
    protected $updatedField  = DIUBAH_TANGGAL;
    protected $deletedField  = DIHAPUS_TANGGAL;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}