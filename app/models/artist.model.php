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

    public function getArtistOptions(){
        $query = $this->db->prepare("SELECT id_artista, nombre_artista FROM artistas");
        $query->execute();


        $options = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['id_artista'] . "'>" . $row['nombre_artista'] . "</option>";
        }

        return $options;
    }

    public function insertArtist($artist_name, $nationality) { 
        $query = $this->db->prepare('INSERT INTO artistas(nombre_artista, nacionalidad_artista) VALUES (?, ?)');
        $query->execute([$artist_name, $nationality]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function updateArtist($artist_id, $artist_name, $nationality) {        
        $query = $this->db->prepare('UPDATE artistas SET nombre_artista = ?, nacionalidad_artista = ? WHERE id_artista = ?');
        $query->execute([$artist_name, $nationality, $artist_id]);
    }

    public function eraseArtist($id) {
        $query = $this->db->prepare('DELETE FROM artistas WHERE id_artista = ?');
        $query->execute([$id]);
    }
}