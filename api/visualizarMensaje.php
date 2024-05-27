<?php
include("connexio.php");

$query = "SELECT * FROM Mensaje";
$result = mysqli_query($conn, $query);

echo "<table>";
echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Mensaje</th><th>Fecha de Envío</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nombre']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>".$row['telefono']."</td>";
    echo "<td>".$row['mensaje']."</td>";
    echo "<td>".$row['fecha_envio']."</td>";
    echo "</tr>";
}
echo "</table>";
?>
