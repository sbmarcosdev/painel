<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <title>BTI Painel Integração</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-html5-1.6.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.10.22/b-1.6.5/b-html5-1.6.5/datatables.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

</head>
<body>

    <div class="container">

            <div class="card">
                <div class="card-header"><h4 class="tituloPrincipal">Controle de Integrações</h4></div>

                <div class="card-body">
                        <div class="alert alert-danger" >
                            <h5> Usuário Não Autorizado
                            <hr>
                            <p> Solicite a liberação do seu acesso </p>
                            <a href='mailto:chamado@btiestrategica.com.br'>chamado@btiestrategica.com.br</a>
                        </div>

                <button class="btn btn-outline-secondary" onclick="window.location='{{url('login')}}'">Voltar</button>

                </div>
            </div>
    </div>
</body>
</html>

