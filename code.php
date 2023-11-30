<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_reservas']))
{
    $reserva_id = mysqli_real_escape_string($con, $_POST['delete_reservas']);

    $query = "DELETE FROM reservas WHERE id='$reserva_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Reserva excluída com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Não foi possível excluir a reserva";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_reserva']))
{
    $reserva_id = mysqli_real_escape_string($con, $_POST['reserva_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $reserva = mysqli_real_escape_string($con, $_POST['reserva']);

    $query = "UPDATE reservas SET name='$name', email='$email', phone='$phone', reserva='$reserva' WHERE id='$reserva_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Reserva atualizada com sucesso";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Reserva não atualizada";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['save_reserva']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $reserva = mysqli_real_escape_string($con, $_POST['reserva']);

    $query = "INSERT INTO reservas (name, email, phone, reserva) VALUES ('$name', '$email', '$phone', '$reserva')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Reserva cadastrada com sucesso!";
        header("Location: reserva-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Reserva não cadastrada";
        header("Location: reserva-create.php");
        exit(0);
    }
}
?>

<!-- Adicione este código para exibir erros PHP -->
<?php
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
?>

