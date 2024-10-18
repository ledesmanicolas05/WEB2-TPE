<?php 

require_once 'config.php'; // Asegúrate de incluir el archivo de configuración

class SongModel {
    private $db;

    public function __construct() {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8", 
            MYSQL_USER, 
            MYSQL_PASS
        );
    }

    public function getAllSongs() {
        $query = $this->db->prepare("SELECT * FROM songs ORDER BY views DESC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongById($id) {
        $query = $this->db->prepare("SELECT * FROM songs WHERE id_song = ?");
        $query->execute([$id]);
        $song = $query->fetch(PDO::FETCH_OBJ);

        return $song;
    }

    public function getSongByArtist($id){
        $query = $this->db->prepare("SELECT * FROM songs WHERE id_artist = ?");
        $query->execute([$id]);
        $songartists = $query->fetchAll(PDO::FETCH_OBJ);

        return $songartists;
    }

    public function getSongsOptions(){
        $query = $this->db->prepare("SELECT id_song, song_name FROM songs");
        $query->execute();


        $options = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['id_song'] . "'>" . $row['song_name'] . "</option>";
        }

        return $options;
    }

    public function insertSong($song_name, $date, $views, $artist_id, $lyrics) { 
        $query = $this->db->prepare('INSERT INTO songs(song_name, release_date, views, id_artist, lyrics_song) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$song_name, $date, $views, $artist_id, $lyrics]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function updateSong($song_id, $song_name, $date, $views, $lyrics) {        
        $query = $this->db->prepare('UPDATE songs SET song_name = ?, release_date = ?, views = ?, lyrics_song = ? WHERE id_song = ?');
        $query->execute([$song_name, $date, $views, $song_id, $lyrics]);
    }

    public function eraseSong($id) {
        $query = $this->db->prepare('DELETE FROM songs WHERE id_song = ?');
        $query->execute([$id]);
    }



}