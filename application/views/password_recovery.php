<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Jquery CND -->
    <script	src="https://code.jquery.com/jquery-3.2.0.js"></script>
    <!-- Firebase
    <script src="https://www.gstatic.com/firebasejs/4.5.1/firebase.js"></script>  -->
    <!-- Internal file resources -->
    <link rel="stylesheet" type="text/css" href="/application/assets/css/items.css">
    <script type="text/javascript" src="/application/assets/js/firebase.js"></script>
    <title>Recuperação de senha</title>
</head>
<body>
    <h1>Recupere sua senha</h1>
    <form id="update-password-form" method="post">
        <label>Digite uma nova senha</label>
        <input type="password" name="password" id="pwd" placeholder="password" required><br>
        <label>Repita a nova senha</label>
        <input type="password" name="password" id="pwd-repeat" placeholder="password" required><br>
        <input type="submit" value="atualizar" >
    </form>
</body>
</html>