<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Recuperação</title>
</head>
<body class="text-center container bg-secondary"> 
    <div class="row mt-5 mb-5">
        <div class="col-2">
        </div>
        <div class="col-8 card mt-5 bg-light">
            <div class="card-body">
                <form method="post">
                    <h3>Recuperação de senha</h3>
                    <div class="row mt-5">
                        <div class="col-sm-6 mt-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="token">Token</label>
                            <input type="text" class="form-control"id="token" name="token">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mt-3">
                            <label for="password">Escolha uma nova senha</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="col-sm-6 mt-3">
                            <label for="password-confirm">Confirme sua conta</label>
                            <input type="password" class="form-control"id="password-confirm" name="password-confirm">
                        </div>
                    </div>
                    <button class="btn btn-primary mt-5">Alterar senha</button>
                </form>
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
</body>
</html>