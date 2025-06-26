<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="p-4">

    <h1>Website</h1>

    <div id="app"></div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(function () {
            let homeLoaded = false;

            if (!homeLoaded) {
                $.get('routes/web/home.php', function (html) {
                    $('#app').html(html);
                    homeLoaded = true;
                }).fail(function () {
                    $('#app').html('<div class="text-danger">Chyba pri načítaní homepage.</div>');
                });
            }
        });
    </script>

</body>
</html>
