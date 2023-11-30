<?php
session_start();
require 'dbcon.php';

// Verifica se o formulário foi enviado
if (isset($_POST['edit_reserva'])) {
    $reserva_id = mysqli_real_escape_string($con, $_POST['reserva_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $reserva = mysqli_real_escape_string($con, $_POST['reserva']);

    // Atualiza os dados da reserva no banco de dados
    $query = "UPDATE reservas SET name='$name', email='$email', phone='$phone', reserva='$reserva' WHERE id='$reserva_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = 'Dados da reserva atualizados com sucesso!';
        header('Location: editt.php');
        exit();
    } else {
        $_SESSION['error'] = 'Erro ao atualizar os dados da reserva.';
        header('Location: editt.php');
        exit();
    }
} else {
    // Verifica se o parâmetro de ID foi passado na URL
    if (isset($_GET['id'])) {
        $reserva_id = mysqli_real_escape_string($con, $_GET['id']);

        // Recupera os detalhes da reserva do banco de dados
        $query = "SELECT * FROM reservas WHERE id='$reserva_id'";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $reserva = mysqli_fetch_assoc($query_run);
?>
            <!doctype html>
            <html lang="pt-BR">

            <head>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
                <title>Editar Reserva</title>
            </head>

            <body>

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bem Vindo!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/Projeto/default.html">Quartos <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/Projeto/index.php">Reservas</a>
            </li>
          </ul>

        </div>
      </nav>

                <div class="container mt-4">
                    <?php include('message.php'); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Editar Reserva
                                        <a href="index.php" class="btn btn-primary float-end">Voltar</a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form action="editt.php" method="POST">
                                        <input type="hidden" name="reserva_id" value="<?= $reserva['id']; ?>">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nome</label>
                                            <input type="text" name="name" class="form-control" value="<?= $reserva['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $reserva['email']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Telefone</label>
                                                <input type="text" name="phone" class="form-control" value="<?= $reserva['phone']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="reserva" class="form-label">Reserva</label>
                                            <label>Quarto</label>
                                                <select name="reserva">
                                                    <option value="Quarto Casal" <?php if ($reserva['reserva'] == 'Quarto Casal') echo 'selected'; ?>>Quarto Casal</option>
                                                    <option value="Quarto Solteiro" <?php if ($reserva['reserva'] == 'Quarto Solteiro') echo 'selected'; ?>>Quarto Solteiro</option>
                                                    <option value="Quarto Família" <?php if ($reserva['reserva'] == 'Quarto Família') echo 'selected'; ?>>Quarto Família</option>
                                                </select>
                                        </div>

                                        <button type="submit" name="edit_reserva" class="btn btn-primary">Atualizar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
            </body>

            </html>
<?php
        } else {
            $_SESSION['error'] = 'Nenhum ID de reserva encontrado.';
            header('Location: xuxu.php');
            exit();
        }
    } else {
        $_SESSION['error'] = 'ID de reserva não especificado.';
        header('Location: index.php');
        exit();
    }
}
?>
