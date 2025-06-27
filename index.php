<?php
declare(strict_types=1);

require_once __DIR__ . '/app/bootstrap.php';

require_once __DIR__ . '/resources/views/layouts/header.php';

?>
<body class="p-4">

    <h1>Website</h1>

    <div id="app"></div>

    <?php
        require_once __DIR__ . '/resources/views/layouts/footer.php';
    ?>

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

