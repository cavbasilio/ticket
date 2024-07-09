<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cronômetro com PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="primeiro-grupo">
                <select id="category1" class="form-control">
                    <option value="Suporte">Suporte</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Atendimento">Atendimento</option>
                </select>
                <button id="btnLigar1" class="btn btn-primary">Iniciar</button>
                <button id="btnParar1" class="btn btn-danger" disabled>Parar</button>
            </div>
            <div class="container mt-5">
                <label for="observations1">Observação</label>
                <div class="row">
                    <textarea id="observations" class="col d-flex justify-content-center align-items-center" name="observations" type="text"></textarea>
                </div>
                <p id="resultado1"></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="segundo-grupo">
                <select id="category2" class="form-control">
                    <option value="Suporte">Suporte</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Atendimento">Atendimento</option>
                </select>
                <button id="btnLigar2" class="btn btn-primary">Iniciar</button>
                <button id="btnParar2" class="btn btn-danger" disabled>Parar</button>
            </div>
            <div class="container mt-5">
                <label for="observations2">Observação</label>
                <div class="row">
                    <textarea id="observations2" class="col d-flex justify-content-center align-items-center" name="observations" type="text"></textarea>
                </div>
                <p id="resultado2"></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="terceiro-grupo">
                <select id="category3" class="form-control">
                    <option value="Suporte">Suporte</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Atendimento">Atendimento</option>
                </select>
                <button id="btnLigar3" class="btn btn-primary">Iniciar</button>
                <button id="btnParar3" class="btn btn-danger" disabled>Parar</button>
            </div>
            <div class="container mt-5">
                <label for="observations3">Observação</label>
                <div class="row">
                    <textarea id="observations3" class="col d-flex justify-content-center align-items-center" name="observations" type="text"></textarea>
                </div>
                <p id="resultado3"></p>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="main.js"></script>
</body>
</html>
