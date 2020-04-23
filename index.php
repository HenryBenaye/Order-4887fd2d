<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
        <h1>Welkom  op het Netland beheerderspaneel</h1>
        <h2>Series</h2>
        <table>
                <th>Titel</th>
                <th>Rating</th>
                <?php
                $host = "127.0.0.1";
                $db = 'netland';
                $user = 'root';
                $pass = '';

                $dsn = "mysql:host=$host;dbname=$db;port=3306";

                try {
                        $pdo = new PDO($dsn, $user, $pass);
                        // echo"connected to db 'Netland'!!";
                $result = $pdo->query('SELECT * FROM series');
                        while ($show = $result->fetch()) {
                                echo"<table style='width:20%'><tr><td style='width:100px; display:flex; flex-direction:row; '>";
                                // $url = '<a href="series.php?subject="'. $show['id'].'">Bekijk details</a>';
                                echo $show['naam']."</td><td style='width:400px; '>".$show['rating'];
                                echo"<form action='series.php' method='get'>
                                        <a href='series.php?id=".  $show['id']. "' type='submit' name='link'> Bekijk details</a>
                                </form>";
                                echo"</td></tr></table>";
                        }
                } catch (\PDOException $e) {
                        throw new \PDOException($e->getMessage("Not connected"));
                }
                ?>
        </table>
        <h2>Films</h2>
        <table>
                <?php
                        $host = "127.0.0.1";
                        $db = 'netland';
                        $user = 'root';
                        $pass = '';

                        $dsn = "mysql:host=$host;dbname=$db;port=3306";

                        try {
                                $pdo = new PDO($dsn, $user, $pass);
                                // echo"connected to db 'Netland'!!";
                        $result = $pdo->query('SELECT * FROM movies');
                        echo"<th>Titel</th>";
                        echo"<th>Duur</th>";

                        while ($show = $result->fetch()) {
                               echo"<div>"; 
                                echo"<table style='width:22%', height:500px><tr><td>"; 
                                echo $show['titel'].'</td><td>'.$show['duur'];
                                echo"<form action='films.php' method='get'>
                                        <td><a href='films.php?id=". $show['id']. "' type='submit' name='link' > Bekijk details</a></td>
                                </form>";
                                echo"</td></tr></table>";
                                echo"</div>";
                        }
                        } catch (\PDOException $e) {
                                throw new \PDOException($e->getMessage("Not connected"));
                        }
                        ?>
                        
        </table>
        
</body>
</html>



