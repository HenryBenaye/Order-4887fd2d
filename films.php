<?php
    $host = "127.0.0.1";
    $db = 'netland';
    $user = 'root';
    $pass = '';

    $dsn = "mysql:host=$host;dbname=$db;port=3306";
    try {
        $pdo = new PDO($dsn, $user, $pass);
        // echo"connected to db 'Netland'!!";
        $id = $_GET['id'];   
        $result = $pdo->prepare('SELECT * FROM movies WHERE id=:id');
        $result->bindParam(':id', $id);
        $result->execute(); 

        while ($show = $result->fetch()) {
            echo"<form action='index.php' method='get'>
            <a href='index.php?id=".  $show['id']. "' type='submit' name='link'>Terug</a>
            </form>";
            echo "<h1>" . $show['titel'] . " "  .    $show['duur'] . "</h1>";
            echo"<div>";
            echo" Datum van uitkomst:" . " ". $show['datum_van_uitkomst'];
            echo"</div>";
            echo"<div>";
            echo" Land van uitkomst: " . " " . $show['land_van_uitkomst'];
            echo"</div>";
            echo"<div>";
            echo"<p>" . $show['omschrijving'];
            echo"</div>";
            echo'<iframe width="1280" height="544" src="https://www.youtube.com/embed/'. $show['trailer']. '"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        } 
     
    }
     catch (\PDOException $e) {
        throw new \PDOException($e->getMessage("Not connected"));
}
?>