<?php

class Mahasiswa
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM mahasiswa ORDER BY id DESC";

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function checkNpm($npm)
    {
        $query = "SELECT * FROM mahasiswa WHERE npm = ?";

        $stmt = $this->db->prepare($query);
        $stmt->execute([$npm]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO mahasiswa
        (npm, nama, fakultas, jurusan, tempat_lahir, tanggal_lahir, jenis_kelamin, status_id)
        VALUES
        (:npm, :nama, :fakultas, :jurusan, :tempat_lahir, :tanggal_lahir, :jenis_kelamin, :status_id)";

        $stmt = $this->db->prepare($query);

        return $stmt->execute([
            ':npm' => $data['npm'],
            ':nama' => $data['nama'],
            ':fakultas' => $data['fakultas'],
            ':jurusan' => $data['jurusan'],
            ':tempat_lahir' => $data['tempat_lahir'],
            ':tanggal_lahir' => $data['tanggal_lahir'],
            ':jenis_kelamin' => $data['jenis_kelamin'],
            ':status_id' => 1
        ]);
    }
}
