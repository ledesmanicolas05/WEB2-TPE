<?php

require_once 'app/models/song.model.php';
require_once 'app/models/model.php';

class ArtistModel extends Model{
    private $songModel;

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

    public function insertArtist($artist_name, $nationality, $img_artist) { 
        $query = $this->db->prepare('SELECT * FROM artists WHERE artist_name = ?');
        $query->execute([$artist_name]);
        $existing_artist = $query->fetch(PDO::FETCH_OBJ);
        
        if ($existing_artist) {
            return  $id = "duplicate";
        } else {
            $query = $this->db->prepare('INSERT INTO artists(artist_name, artist_nationality, img_artist) VALUES (?, ?, ?)');
            $query->execute([$artist_name, $nationality, $img_artist]);
    
            $id = $this->db->lastInsertId();
        
            return $id;
        }
    }

    public function updateArtist($artist_id, $artist_name, $nationality, $img_artist) {        
        $query = $this->db->prepare('UPDATE artists SET artist_name = ?, artist_nationality = ?, img_artist = ? WHERE id_artist = ?');
        $query->execute([$artist_name, $nationality, $img_artist, $artist_id]);
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