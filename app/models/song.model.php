<?php 

class SongModel {
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');
    }

    public function getSongs() {
        $query = $this->db->prepare( "select * from canciones");
        $query->execute();
        // Obtenemos los datos para generar el HTML //
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getArtistsByID(){
        $query = $this->db->prepare('SELECT * FROM artistas WHERE id_artista = ?');
        $query->execute([$cancion->id_artista]);
        return $artista = $query->fetch(PDO::FETCH_OBJ);
    }
}