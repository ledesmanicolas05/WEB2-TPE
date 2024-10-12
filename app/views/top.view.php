<?php
class TopView {
    public function showTop($canciones){
        require 'templates/showTop.phtml';
}
    public function showArtist($artista){
        require 'templates/showArtist.phtml';
    }

    public function showSong($cancion){
        require 'templates/showSong.phtml';
    }

    public function showAbout(){
        require 'templates/showAbout.phtml';
    }

    public function showArtists($artistas){
        require 'templates/showAllArtists.phtml';
    }
    public function showSuggestion($options, $optionsArtists){
        require 'templates/suggestion.phtml';
    }
    public function showError($error){
        require 'templates/error.phtml';
    }
}