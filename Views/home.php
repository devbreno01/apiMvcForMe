<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Usuários</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['nome']; ?></li>
        <?php endforeach; ?>
    </ul>
   
</body>
</html>
