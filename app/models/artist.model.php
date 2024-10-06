<?php

class ArtistModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');
    }

    public function getAllArtists() {
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArtistById($id_artista) {
        $query = $this->db->prepare('SELECT * FROM artistas WHERE id_artista = ?');
        $query->execute([$id_artista]);
        $artista = $query->fetch(PDO::FETCH_OBJ);
        return $artista;
    }
}