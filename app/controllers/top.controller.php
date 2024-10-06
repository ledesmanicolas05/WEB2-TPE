<?php
require_once 'app/models/song.model.php';
require_once 'app/models/artist.model.php';
require_once 'app/views/top.view.php';

class TopController {
    private $songModel;
    private $artistModel;
    private $view;

    public function __construct()
    {
        $this->songModel = new SongModel();
        $this->artistModel = new ArtistModel();
        $this->view = new TopView();
    }

    public function showTop() {
        $canciones = $this->songModel->getAllSongs();

        foreach ($canciones as $cancion) {
            $cancion->artista = $this->artistModel->getArtistById($cancion->id_artista);
        }

        return $this->view->showTop($canciones);
    }

    public function showArtist($id){
        $artista = $this->artistModel->getArtistById($id);

        return $this->view->showArtist($artista);
    }

    public function showSong($id){
        $cancion = $this->songModel->getSongById($id);

        return $this->view->showSong($cancion);
    }

    public function showAbout(){
        return $this->view->showAbout();
    }

    public function showArtists(){
        $artistas = $this->artistModel->getAllArtists();

        return $this->view->showArtists($artistas);
    }
}