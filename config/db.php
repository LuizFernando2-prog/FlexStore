<?php
$config = require 'config.php';

$mysqli = new mysqli(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['dbname']
);

if ($mysqli->connect_error) {
    $message = 'Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
} else {
    $message = 'Connection successful';
    return $mysqli;
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <script>
        // Variável PHP para JavaScript
        var connectionMessage = '<?php echo $message; ?>';
        
        // Função para mostrar o alerta
        function showAlert() {
            alert(connectionMessage);
        }
        
        // Mostrar alerta ao carregar a página
        window.onload = showAlert;
    </script>
</head>
<body>
</body>
</html>
