<?php 

class SongModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');
    }

    public function getAllSongs() {
        $query = $this->db->prepare("SELECT * FROM canciones ORDER BY cantidad_reproducciones DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongById($id) {
        $query = $this->db->prepare("SELECT * FROM canciones WHERE id_cancion = ?");
        $query->execute([$id]);
        $cancion = $query->fetch(PDO::FETCH_OBJ);

        return $cancion;
    }
}