<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Активация регистрации нового ползователя</title>
</head>
<body>
    <h1>Спасибо за регистрацию, {{$user->name}}!</h1>
    <p>
        Здравствуйте {{$user->name}}! Мы рады приветствовать Вас в AMZ CORPORATE PTY LTD и выражаем благодарность за выбор нашей компании.
        Перейдите <a href='{{ url("register/confirm/{$user->token}") }}'>по ссылке </a>чтобы завершить регистрацию!
    </p>
</body>
</html>