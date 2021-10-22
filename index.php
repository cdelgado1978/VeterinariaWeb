<?php 
    // echo $_SERVER['SERVER_NAME'];
    // echo $_SERVER['PHP_SELF'];
    // $dir = dirname(__FILE__);

    $root = '/Users/uuser/Documents/GitHub/VeterinariaWeb';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria Web</title>
    <link href="/style/bootstrap.min.css" rel="stylesheet" />
    <link href="/style/main.css" rel="stylesheet" />
</head>
<body>

    <nav>
        <?php include $root.'/includes/navbar.php'; ?>
    </nav>
    <main>
Pagina Principal
    </main>
    <footer>
        <?php include $root.'/includes/footer.php'; ?>
    </footer>

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>