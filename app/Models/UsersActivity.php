<?php namespace App\Models;

use CodeIgniter\Model;

class UsersActivity extends Model
{
	protected $DBGroup = 'default';
	protected $table      = T_PENGGUNA_AKTIVITAS;
    protected $primaryKey = ID_AKTIVITAS;
    
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
    	ID_AKTIVITAS, 
        ID_PENGGUNA,
        ALAMAT_IP,
    	PERANGKAT_PENGGUNA,
        BROWSER,
        USER_AGENT_STRING,
        PREVIOUS_URL,
        CURRENT_URL,
        AKTIVITAS,
        DIBUAT_TANGGAL
    ];

    // protected $useTimestamps = true;
    
    protected $createdField  = DIBUAT_TANGGAL;
    protected $updatedField  = DIUBAH_TANGGAL;
    protected $deletedField  = DIHAPUS_TANGGAL;

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}