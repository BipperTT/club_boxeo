<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Baja de Usuario</title>
    <link rel="icon" href="img/ico_nbg.png" type="image">
</head>
<header>
        <div class="logo">
            <a href="index.php"><img src="img/title.png" alt="Club Box Sogache Logo"></a>
        </div>
        <?php
    include("includes/nav.php");
?>
    </header>
<body>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const userId = urlParams.get('ID');
        fetch(`../api/gestioUsuaris.php?ID=${userId}`,{
            method: 'DELETE'                
        })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'success') {
                    alert('Usuario eliminado exitosamente');
                    self.location.href='gestionUsuaris.php';
                } else {
                    alert('Se ha producido un error al eliminar el usuario');
                }
            })
            .catch(error => {
                alert('Se ha producido un error al eliminar el usuario');
                console.error('Error al eliminar el usuario:', error);
            });
    </script>
      <?php
    include("includes/footer.php");
?>
</body>
</html>
