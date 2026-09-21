<?php

class Dosen
{
    private $id;
    private $nidn;
    private $nama;
    private $bidang_keahlian;

    // =========================
    // GETTER
    // =========================

    public function getId()
    {
        return $this->id;
    }

    public function getNidn()
    {
        return $this->nidn;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getBidangKeahlian()
    {
        return $this->bidang_keahlian;
    }

    // =========================
    // SETTER
    // =========================

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNidn($nidn)
    {
        if (!is_numeric($nidn)) {
            throw new InvalidArgumentException(
                'NIDN harus berupa angka.'
            );
        }

        $this->nidn = $nidn;
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

    public function setBidangKeahlian($bidang_keahlian)
    {
        if (trim($bidang_keahlian) === '') {
            throw new InvalidArgumentException(
                'Bidang keahlian tidak boleh kosong.'
            );
        }

        $this->bidang_keahlian = $bidang_keahlian;
    }
}