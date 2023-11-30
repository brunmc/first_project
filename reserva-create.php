<?php
session_start();
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

    <title>Criar reserva</title>
</head>
<body>
  
<nav class="navbar">
    <div class="content">   
        <header class="header">
        <h1 class="title">Hotel Paradise</h1>
        </header>
    </div> 
    <nav class="menu">
        <a href="default.html">Inicio</a>
        <a href="editt.php">Reservas</a>
    </nav>
</nav>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <h4>Criar reserva</h4>
                <div class="card">
                    <div class="card-header">
                            <a href="default.html" class="btn btn-danger float-end">VOLTAR</a>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
    <label>Quarto</label>
    <select name="reserva" class="form-control">
        <option value="Quarto Casal">Quarto Casal</option>
        <option value="Quarto Solteiro">Quarto Solteiro</option>
        <option value="Quarto Família">Quarto Família</option>
    </select>
</div>
                            <div class="mb-3">
                                <button type="submit" name="save_reserva" class="btn btn-primary">Salvar Reserva</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
