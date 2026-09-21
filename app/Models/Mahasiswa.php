<?php

class Mahasiswa
{
    private $id;
    private $nim;
    private $nama;
    private $prodi;
    private $dosen_id;

    // =========================
    // GETTER
    // =========================

    public function getId()
    {
        return $this->id;
    }

    public function getNim()
    {
        return $this->nim;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getProdi()
    {
        return $this->prodi;
    }

    public function getDosenId()
    {
        return $this->dosen_id;
    }

    // =========================
    // SETTER
    // =========================

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNim($nim)
    {
        if (!is_numeric($nim)) {
            throw new InvalidArgumentException(
                'NIM harus berupa angka.'
            );
        }

        $this->nim = $nim;
    }

    public function setNama($nama)
    {
        if (trim($nama) === '') {
            throw new InvalidArgumentException(
                'Nama tidak boleh kosong.'
            );
        }

        $this->nama = $nama;
    }

    public function setProdi($prodi)
    {
        if (trim($prodi) === '') {
            throw new InvalidArgumentException(
                'Program Studi tidak boleh kosong.'
            );
        }

        $this->prodi = $prodi;
    }

    public function setDosenId($dosen_id)
    {
        $this->dosen_id = $dosen_id;
    }
}