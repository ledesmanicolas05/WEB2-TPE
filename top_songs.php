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


function showSuggestion(){
    require_once 'templates/layout/header.php';

    echo '<h1 class="text-center">Sugerencias</h1>';
    echo '<hr class="border border-danger border-2 opacity-50">';
    echo '<p class="text-center fs-3">Aquí puedes dejar tus sugerencias sobre el top: añadir una nueva canción o un nuevo artista, eliminar una canción o modificar una existente.</p>';

    echo '<div class="container">';
    
    echo renderAddSongForm();

    echo '<hr class="border border-danger border-2 opacity-50">';

    echo renderModifySongForm();

    echo '</div>';

    require_once 'templates/layout/footer.php';
}

function renderAddSongForm(){
    return '
        <h2 class="text-center">Agregar Canción y Artista</h2>
        <form method="post" action="agregar_cancion.php">
            <div class="mb-3">
                <label for="artist_name" class="form-label">Nombre del Artista</label>
                <input type="text" class="form-control" id="artist_name" name="artist_name" aria-describedby="artistHelp">
                <div id="artistHelp" class="form-text">Asegúrate que el artista no esté ya en el top.</div>
            </div>
            <div class="mb-3">
                <label for="song_name" class="form-label">Canción</label>
                <input type="text" class="form-control" id="song_name" name="song_name">
            </div>
            <div class="mb-3">
                <label for="mod_views" class="form-label">Cantidad de reproducciones</label>
                <input type="number" class="form-control" id="mod_views" name="views" readonly>
            </div>
            <div class="mb-3">
                <label for="mod_date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="mod_date" name="date" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    ';
}

function renderModifySongForm(){
    $options = getSongOptions();
    return '
        <h2 class="text-center">Modificar Canción Existente</h2>
        <form id="modificar-cancion" method="post" action="modificar_cancion.php">
            <div class="mb-3">
                <label for="songSelect" class="form-label">Canción a modificar</label>
                <select class="form-control" id="songSelect" name="song_id">
                    <option value="" disabled selected>Selecciona una canción</option>
                    ' . $options . '
                </select>
            </div>
            <div class="mb-3">
                <label for="mod_name_song" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="mod_name_song" name="song_name">
            </div>
            <div class="mb-3">
                <label for="mod_views" class="form-label">Cantidad de reproducciones</label>
                <input type="number" class="form-control" id="mod_views" name="views">
            </div>
            <div class="mb-3">
                <label for="mod_date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="mod_date" name="date">
            </div>
            <button type="submit" class="btn btn-primary">Modificar</button>
        </form>
    ';
}

function getSongOptions(){
    $conn = new mysqli('localhost', 'root', '', 'ranking_canciones');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT id_cancion, titulo_cancion FROM canciones";
    $result = $conn->query($sql);
    
    $options = "";
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['id_cancion'] . "'>" . $row['titulo_cancion'] . "</option>";
    }
    
    $conn->close();
    return $options;
}
?> 
