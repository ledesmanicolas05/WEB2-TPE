<?php

require_once 'app/models/song.model.php';

class ArtistModel {
    private $db;
    private $songModel;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=top_songs;charset=utf8', 'root', '');
        $this->songModel = new SongModel();
    }

    public function getAllArtists() {
        $query = $this->db->prepare('SELECT * FROM artists');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArtistById($id_artist) {
        $query = $this->db->prepare('SELECT * FROM artists WHERE id_artist = ?');
        $query->execute([$id_artist]);
        $artist = $query->fetch(PDO::FETCH_OBJ);
        return $artist;
    }

    public function getArtistOptions(){
        $query = $this->db->prepare("SELECT id_artist, artist_name FROM artists");
        $query->execute();


        $options = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['id_artist'] . "'>" . $row['artist_name'] . "</option>";
        }

        return $options;
    }

    public function insertArtist($artist_name, $nationality) { 
        $query = $this->db->prepare('SELECT * FROM artists WHERE artist_name = ?');
        $query->execute([$artist_name]);
        $existing_artist = $query->fetch(PDO::FETCH_OBJ);
        
        if ($existing_artist) {
            return  $id = "duplicate";
        } else {
            $query = $this->db->prepare('INSERT INTO artists(artist_name, artist_nationality) VALUES (?, ?)');
            $query->execute([$artist_name, $nationality]);
    
            $id = $this->db->lastInsertId();
        
            return $id;
        }
    }

    public function updateArtist($artist_id, $artist_name, $nationality) {        
        $query = $this->db->prepare('UPDATE artists SET artist_name = ?, artist_nationality = ? WHERE id_artist = ?');
        $query->execute([$artist_name, $nationality, $artist_id]);
    }

    public function eraseArtist($id) {
        $id_songs = $this->songModel->getSongByArtist($id);

        foreach ($id_songs as $song) {
            $this->songModel->eraseSong($song->id_song);
        }

        $query = $this->db->prepare('DELETE FROM artists WHERE id_artist = ?');
        $query->execute([$id]);
    }
}