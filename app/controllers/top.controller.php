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

    public function showSuggestion(){
        $options = $this->songModel->getSongsOptions();

        $optionsArtists = $this->artistModel->getArtistOptions();

        return $this->view->showSuggestion($options, $optionsArtists);
    }

    public function addSong(){
        if (!isset($_POST['artist_id']) || empty($_POST['artist_id'])) {
            return $this->view->showError('Falta completar el ID de la canción');
        }
    
        if (!isset($_POST['song_name']) || empty($_POST['song_name'])) {
            return $this->view->showError('Falta completar el nombre de la canción');
        }
        if (!isset($_POST['date']) || empty($_POST['date'])) {
            return $this->view->showError('Falta completar la fecha de lanzamiento');
        }
    
        if (!isset($_POST['views']) || empty($_POST['views'])) {
            return $this->view->showError('Falta completar la cantidad de reproducciones');
        }

        $song_name = $_POST['song_name'];
        $date = $_POST['date'];
        $views = $_POST['views'];
        $artist_id = $_POST['artist_id'];

        $id = $this->songModel->insertSong($song_name, $date, $views, $artist_id);

        header('Location: ' . BASE_URL);
    }

    public function modifySong() {

        if (!isset($_POST['song_id']) || empty($_POST['song_id'])) {
            return $this->view->showError('Falta completar el ID de la canción');
        }
        if (!isset($_POST['song_name']) || empty($_POST['song_name'])) {
            return $this->view->showError('Falta completar el nombre de la canción');
        }
        if (!isset($_POST['date']) || empty($_POST['date'])) {
            return $this->view->showError('Falta completar la fecha de lanzamiento');
        }
        if (!isset($_POST['views']) || empty($_POST['views'])) {
            return $this->view->showError('Falta completar la cantidad de reproducciones');
        }
    
        $song_id = $_POST['song_id'];
        $song_name = $_POST['song_name'];
        $date = $_POST['date'];
        $views = $_POST['views'];
    
        $id = $this->songModel->updateSong($song_id, $song_name, $date, $views);
    
        header('Location: ' . BASE_URL);
    }
    public function deleteSong() {
        if (!isset($_POST['song_id']) || empty($_POST['song_id'])) {
            return $this->view->showError('Falta completar el ID de la canción');
        }

        $song_id = $_POST['song_id'];

        $id = $this->songModel->eraseSong($song_id);

        header('Location: ' . BASE_URL);
    }

    public function addArtist(){
        
        
        if (!isset($_POST['artist_name']) || empty($_POST['artist_name'])) {
            return $this->view->showError('Falta completar el nombre del artista');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta completar la nacionalidad del artista');
        }

        $artist_name = $_POST['artist_name'];
        $nationality = $_POST['nationality'];

        $id = $this->artistModel->insertArtist($artist_name, $nationality);

        header('Location: ' . BASE_URL);
    }

    public function modifyArtist() {

        if (!isset($_POST['artist_id']) || empty($_POST['artist_id'])) {
            return $this->view->showError('Falta seleccionar el ID del artista');
        }
        if (!isset($_POST['artist_name']) || empty($_POST['artist_name'])) {
            return $this->view->showError('Falta completar el nombre del artista');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta completar la nacionalidad del artista');
        }

        $artist_id = $_POST['artist_id'];
        $artist_name = $_POST['artist_name'];
        $nationality = $_POST['nationality'];
    
        $id = $this->artistModel->updateArtist($artist_id, $artist_name, $nationality);
    
        header('Location: ' . BASE_URL);
    }

    public function deleteArtist() {
        if (!isset($_POST['artist_id']) || empty($_POST['artist_id'])) {
            return $this->view->showError('Falta seleccionar el ID del artista');
        }

        $artist_id = $_POST['artist_id'];

        $id = $this->artistModel->eraseArtist($artist_id);

        header('Location: ' . BASE_URL);
    }
}