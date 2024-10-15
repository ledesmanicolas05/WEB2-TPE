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
        $songs = $this->songModel->getAllSongs();

        foreach ($songs as $song) {
            $song->artist = $this->artistModel->getArtistById($song->id_artist);
        }

        return $this->view->showTop($songs);
    }

    public function showArtist($id){
        $artist = $this->artistModel->getArtistById($id);

        $songs = $this->songModel->getSongByArtist($id);

        return $this->view->showArtist($artist, $songs);
    }

    public function showSong($id){
        $song = $this->songModel->getSongById($id);

        return $this->view->showSong($song);
    }

    public function showAbout(){
        return $this->view->showAbout();
    }

    public function showArtists(){
        $artists = $this->artistModel->getAllArtists();

        return $this->view->showArtists($artists);
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

        if (!isset($_POST['lyrics']) || empty($_POST['lyrics'])) {
            return $this->view->showError('Falta completar las lyrics de la canción');
        }

        $song_name = $_POST['song_name'];
        $date = $_POST['date'];
        $views = $_POST['views'];
        $artist_id = $_POST['artist_id'];
        $lyrics = $_POST['lyrics'];
        $id = $this->songModel->insertSong($song_name, $date, $views, $artist_id, $lyrics);

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
        if (!isset($_POST['lyrics']) || empty($_POST['lyrics'])) {
            return $this->view->showError('Falta completar las lyrics de la canción');
        }
    
        $song_id = $_POST['song_id'];
        $song_name = $_POST['song_name'];
        $date = $_POST['date'];
        $views = $_POST['views'];
        $lyrics = $_POST['lyrics'];
    
        $id = $this->songModel->updateSong($song_id, $song_name, $date, $views, $lyrics);
    
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
            return $this->view->showError('Falta completar el nombre del artist');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta completar la nacionalidad del artist');
        }
        if (!isset($_POST['img_artist']) || empty($_POST['img_artist'])) {
            return $this->view->showError('Falta completar la imagen de su artista');
        }

        $artist_name = $_POST['artist_name'];
        $nationality = $_POST['nationality'];
        $img_artist = $_POST['img_artist'];

        $id = $this->artistModel->insertArtist($artist_name, $nationality, $img_artist);

        if ($id = "duplicate") {
            return $this->view->showError('Su artist ya esta en el top');
        }

        header('Location: ' . BASE_URL);
    }

    public function modifyArtist() {

        if (!isset($_POST['artist_id']) || empty($_POST['artist_id'])) {
            return $this->view->showError('Falta seleccionar el ID del artist');
        }
        if (!isset($_POST['artist_name']) || empty($_POST['artist_name'])) {
            return $this->view->showError('Falta completar el nombre del artist');
        }
        if (!isset($_POST['nationality']) || empty($_POST['nationality'])) {
            return $this->view->showError('Falta completar la nacionalidad del artist');
        }
        if (!isset($_POST['img_artist']) || empty($_POST['img_artist'])) {
            return $this->view->showError('Falta completar la imagen de su artista');
        }

        $artist_id = $_POST['artist_id'];
        $artist_name = $_POST['artist_name'];
        $nationality = $_POST['nationality'];
        $img_artist = $_POST['img_artist'];
    
        $id = $this->artistModel->updateArtist($artist_id, $artist_name, $nationality, $img_artist);
    
        header('Location: ' . BASE_URL);
    }

    public function deleteArtist() {
        if (!isset($_POST['artist_id']) || empty($_POST['artist_id'])) {
            return $this->view->showError('Falta seleccionar el ID del artist');
        }

        $artist_id = $_POST['artist_id'];

        $id = $this->artistModel->eraseArtist($artist_id);
        

        header('Location: ' . BASE_URL);
    }
}