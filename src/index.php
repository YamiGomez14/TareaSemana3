<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea Docker</title>
</head>
<body>
 
        
    <?php
        $host = "db";
        $user = "2-18-0529";
        $password = "2-18-0529";
        $dbname = "yamilkadb";

        $conn = pg_connect("host=$host dbname=$dbname user=$user password=$password") or die('Could not connect: ' . pg_last_error());
        
        // crear tabla si no existe
        $query = "CREATE TABLE IF NOT EXISTS personas(codigo serial PRIMARY KEY, names varchar(50) NOT NULL)";
        $result = pg_query($conn, $query);

        // insertar datos si no existen
        $query = "SELECT * FROM personas";
        $result = pg_query($conn, $query);
        if (pg_num_rows($result) == 0)
           
            

        $query = "INSERT INTO personas (names) VALUES ('Yamilka'), ('Lucia'), ('Jose'), ('Ivan')";
        pg_query($conn, $query);
        $query = "SELECT * FROM personas";
        
        $result = pg_query($conn, $query);
    ?>
    <table id="persons">
        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
        </tr>
        <?php
        while ($row = pg_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row["codigo"] . "</td>";
            echo "<td>" . $row["names"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    
</body>
</html>