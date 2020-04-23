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
        $result = $pdo->prepare('SELECT * FROM series WHERE id=:id');
        $result->bindParam(':id', $id);
        $result->execute(); 
        
        while ($show = $result->fetch()) {
            echo"<form action='index.php' method='get'>
                    <a href='index.php?id=".  $show['id']. "' type='submit' name='link'>Terug</a>
                 </form>";
            echo "<h1>" . $show['naam'] . " "  .    $show['rating'] . "</h1>";
            echo"<div style='display= flex flex-direction= row'>";
            echo" Seasons:" . " ". $show['seasons'];
            echo"</div>";
            echo"<div>";
            echo" Country: " . " " . $show['country'];
            echo"</div>";   
            echo" Language:" . " " . $show['language'];
            echo"<div>";
            echo"<p>" . $show['description'];
            echo"</div>";

        } 
     
    }
     catch (\PDOException $e) {
        throw new \PDOException($e->getMessage("Not connected"));
}
?>