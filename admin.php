<?php
$servername = "localhost";
$database = "id16942744_citas";
$username = "id16942744_carlos";
$password = "#Dut@Wsw>C_6rGbq";
$conn = mysqli_connect($servername, $username, $password, $database);
?>




<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Panel de administración</title>
</head>
<body id="admon">
    <h1>Panel de Citas</h1>
    <table id="pacientes">
        <tr>
            <td>ID</td>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Correo</td>
            <td>Hora</td>
            <td>Fecha</td>
        </tr>
        <?php
        $sql="SELECT * from pacientes ORDER BY Fecha ASC, Hora ASC";
        $result=mysqli_query($conn,$sql);
        while($mostrar=mysqli_fetch_array($result)){
            ?>
        <tr>
            <td><?php echo $mostrar['ID'] ?></td>
            <td><?php echo $mostrar['Nombre'] ?></td>
            <td><?php echo $mostrar['ApellidoP'] ?></td>
            <td><?php echo $mostrar['ApellidoM'] ?></td>
            <td><?php echo $mostrar['Correo'] ?></td>
            <td><?php echo $mostrar['Hora'] ?></td>
            <td><?php echo $mostrar['Fecha'] ?></td>
        </tr>
        <?php
    }
    $hoy = date("Y-m-d");
        print_r("La fecha de hoy:  ");
        print_r($hoy);
    ?>
    </table>
</body>
</html>