<?php
$servername = "localhost";
$database = "id16942744_citas";
$username = "id16942744_carlos";
$password = "#Dut@Wsw>C_6rGbq";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 

$checkFecha = "SELECT * FROM pacientes WHERE Fecha = '$_POST[cita]' ";
$checkHora = "SELECT * FROM pacientes WHERE Hora = '$_POST[hora]' ";
$resultF = $conn-> query($checkFecha);
$resultH = $conn-> query($checkHora);
$count1 = mysqli_num_rows($resultF);
$count2 = mysqli_num_rows($resultH);
$hoy = date("Y-m-d");
$cons = $_POST['cita'];
if($cons <= $hoy){
      echo '<script language="javascript">alert("Se ha seleccionado una fecha expirada, intente de nuevo :(");window.location.href="index.html"</script>';
}else{
      if ($count1 == 1 && $count2 == 1) {
            echo '<script language="javascript">alert("Cita ocupada, seleccione otra fecha :(");window.location.href="index.html"</script>';
      } else {
            $nombre = $_POST['nombre'];
            $apellidoP = $_POST['apellidoP'];
            $apellidoM = $_POST['apellidoM'];
            $correo = $_POST['correo'];
            $hora = $_POST['hora'];
            $cita = $_POST['cita'];
       
            $sql = "INSERT INTO pacientes (Nombre, ApellidoP, ApellidoM, Correo, Hora, Fecha) VALUES ('$nombre', '$apellidoP', '$apellidoM', '$correo', '$hora', '$cita')";
            if (mysqli_query($conn, $sql)) {
                  echo '<script language="javascript">alert("Cita registrada con éxito :)");window.location.href="index.html"</script>';

                  } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                  }	
            }
}


mysqli_close($conn);

?>