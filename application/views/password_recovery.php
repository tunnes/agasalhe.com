<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Jquery CND -->
    <script	src="https://code.jquery.com/jquery-3.2.0.js"></script>
    
    <!-- Materialize CND -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    
    <!-- Another control and meta-tags -->
    <link rel="shortcut icon" href="/application/assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="/application/assets/imgx-icon">
    
     <!-- Register components -->
    <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
    <link rel="stylesheet" type="text/css" href="/application/assets/css/components/_register.css">        
        
    <link rel="stylesheet" type="text/css" href="/application/assets/css/home.css">
    <script type="text/javascript" src="/application/assets/js/firebase.js"></script>
    <script type="text/javascript" src="/application/assets/js/components/_login.js"></script>
    
    <title>Recuperação de Senha</title>
    <style type="text/css">
        body { 
            background: linear-gradient(to left top, rgb(210, 29, 111), rgba(255, 106, 0, 0.8));
            display: flex;
            align-items: center;
        }
        .recovery {
            background: #fafafa;
            width: 60%;
            padding: 30px;
            border-radius: 5px;
        }
        .recovery h4 {
            font-family: 'Roboto' sans-serif;
            text-align: center;
            font-weight: 300;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="container recovery">
         <h4 class="">Recupere sua senha</h4>
         <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" class="validate" required>
                <label class="active" for="password" data-error="wrong" data-success="right">Senha</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password-repeat" type="password" class="validate" required>
                <label class="active" for="password-repeat" data-error="wrong" data-success="right">Repita a senha</label>
            </div>
        </div>
        <div class="row">
            <a href="#" id="update-password" class="waves-effect waves-green btn-flat login-button-access">Atualizar senha</a>
            <a href="/" class="waves-effect waves-green btn-flat login-button-access">Voltar para o início</a>
        </div>
   </div>
</body>
</html>