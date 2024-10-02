<?php 

function showTop(){
    require_once 'templates\layout\header.php';

    $db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');

    $query = $db->prepare( "select * from canciones ORDER BY `canciones`.`cantidad_reproducciones` DESC");
    $query->execute();
    // Obtenemos los datos para generar el HTML //
    $canciones = $query->fetchAll(PDO::FETCH_OBJ);

    echo '<table class="table table-md">';
    echo '<thead>';
    echo ' <td>TOP</td>
        <td>TITULO</td>
        <td>FECHA DE LANZAMIENTO</td>
        <td>REPRODUCCIONES</td>
        <td>ARTISTA</td>';
        $contador = 1;
        
    foreach($canciones as $cancion) {
        $query = $db->prepare('SELECT * FROM artistas WHERE id_artista = ?');
        $query->execute([$cancion->id_artista]);
        $artista = $query->fetch(PDO::FETCH_OBJ);
        echo '<tr>';
        echo '<td>' . $contador . '</td>' .
        '<td>' . '<a href="song/' .  $cancion->id_cancion . '">'. $cancion->titulo_cancion . '</a>' . '</td>'. 
        '<td>' . $cancion->fecha_lanzamiento . '</td>' . 
        '<td>' . $cancion->cantidad_reproducciones . '</td>' . 
        '<td>' . '<a href="artist' . "/" .  $artista->id_artista . '">'. $artista->nombre_artista . '</a>' . '</td>';
        echo '</tr>';
        $contador++;
    }
    echo "</table>";
  

    require_once 'templates\layout\footer.php';
}

function showArtistByID($id){
    require_once 'templates\layout\header.php';

    $db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');

    $query = $db->prepare( "select * FROM artistas");
    $query->execute();

    $artista = $query->fetchAll(PDO::FETCH_OBJ);

    echo '<li>' . $artista[$id - 1]->nombre_artista . " " . $artista[$id - 1]->nacionalidad_artista . " " .'</li>';
    
    require_once 'templates\layout\footer.php';
}

function showAbout(){
    require_once 'templates\layout\header.php';

    echo "<p>" . "hagshsh" . "</p>";
    require_once 'templates\layout\footer.php';
}

function showSong($id){
    require_once 'templates\layout\header.php';

    $db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');

    $query = $db->prepare( "select * FROM canciones");
    $query->execute();

    $cancion = $query->fetchAll(PDO::FETCH_OBJ);
    echo "<h2>" . $cancion[$id - 1]->titulo_cancion . "</h2>" ."<br>" . "<p>" . "LYRICS DE LA CANCION XD" . "</P>" ; 
     
    require_once 'templates\layout\footer.php';
}

function showArtists(){
    require_once 'templates\layout\header.php';
    $db = new PDO('mysql:host=localhost;dbname=ranking_canciones;charset=utf8', 'root', '');
    
    $query = $db->prepare( "select * FROM artistas");
    $query->execute();

    $artistas = $query->fetchAll(PDO::FETCH_OBJ);

    echo '<div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">';
    foreach($artistas as $artista){
        echo '<div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <h1 class="card-text">' . $artista->nombre_artista . '<h1> 
                        <div class="btn-group">
                            <a href="artist/' . $artista->id_artista .'" class="btn btn-sm btn-outline-secondary">view</a>
                        </div>
                    </div>
                </div>
                </div>';
    }
    echo ' </div>
        </div>
    </div>';
    require_once 'templates\layout\footer.php';
}


