<?php
$this->session = \Config\Services::session();
if($this->session->get(TIPE_PENGGUNA) == 1)
{
    echo view('menu/mitra');
}
else if($this->session->get(TIPE_PENGGUNA) == 2)
{
    echo view('menu/seller');
}
else if($this->session->get(TIPE_PENGGUNA) == 3)
{
    echo view('menu/customer');
}
else if($this->session->get(TIPE_PENGGUNA) == 4)
{
    echo view('menu/pengawas');
}
?>