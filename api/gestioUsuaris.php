<?php

include("connexio.php");

$query = "SELECT * FROM Persona";
$result = mysqli_query($conn, $query);

$usuarios = [];

if ($result) {

    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }
} else {
    echo json_encode(["error" => "Error al obtener usuarios: " . mysqli_error($conn)]);
}

mysqli_close($conn);

echo json_encode(["usuarios" => $usuarios]);
?>
