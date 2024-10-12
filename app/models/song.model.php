<?php 

class SongModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');
    }

    public function getAllSongs() {
        $query = $this->db->prepare("SELECT * FROM canciones ORDER BY cantidad_reproducciones DESC");
        $query->execute();
        // Obtenemos los datos para generar el HTML //
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongById($id) {
        $query = $this->db->prepare("SELECT * FROM canciones WHERE id_cancion = ?");
        $query->execute([$id]);
        $cancion = $query->fetch(PDO::FETCH_OBJ);

        return $cancion;
    }

    public function getSongsOptions(){
        $query = $this->db->prepare("SELECT id_cancion, titulo_cancion FROM canciones");
        $query->execute();


        $options = "";
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $options .= "<option value='" . $row['id_cancion'] . "'>" . $row['titulo_cancion'] . "</option>";
        }

        return $options;
    }

    public function insertSong($song_name, $date, $views, $artist_id,) { 
        $query = $this->db->prepare('INSERT INTO canciones(titulo_cancion, fecha_lanzamiento, cantidad_reproducciones, id_artista) VALUES (?, ?, ?, ?)');
        $query->execute([$song_name, $date, $views, $artist_id]);
    
        $id = $this->db->lastInsertId();
    
        return $id;
    }

    public function updateSong($song_id, $song_name, $date, $views) {        
        $query = $this->db->prepare('UPDATE canciones SET titulo_cancion = ?, fecha_lanzamiento = ?, cantidad_reproducciones = ? WHERE id_cancion = ?');
        $query->execute([$song_name, $date, $views, $song_id]);
    }

    public function eraseSong($id) {
        $query = $this->db->prepare('DELETE FROM canciones WHERE id_cancion = ?');
        $query->execute([$id]);
    }



}