<?php
class TopView {
    public function showTop($songs){
        require 'templates/showTop.phtml';
}
    public function showArtist($artist, $songs){
        require 'templates/showArtist.phtml';
    }

    public function showSong($song){
        require 'templates/showSong.phtml';
    }

    public function showAbout(){
        require 'templates/showAbout.phtml';
    }

    public function showArtists($artists){
        require 'templates/showAllArtists.phtml';
    }
    public function showSuggestion($options, $optionsArtists){
        require 'templates/suggestion.phtml';
    }
    public function showError($error){
        require 'templates/error.phtml';
    }
}