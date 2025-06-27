<?php declare(strict_types=1); ?>

<ul class="nav nav-tabs" id="mainTabs" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab">Domov</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contacts-tab" data-toggle="tab" href="#contacts" role="tab">Kontakty</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab">Objednávky</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/shop.php">Shop</a>
    </li>
</ul>

<div class="tab-content mt-3" id="mainTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel">
        <p>Vitajte na hlavnej stránke!</p>
    </div>

    <div class="tab-pane fade" id="contacts" role="tabpanel">
        <!-- obsah kontaktov sa načíta sem -->
        <div id="contacts-loader" class="text-muted">Načítavam kontakty...</div>
    </div>

    <div class="tab-pane fade" id="orders" role="tabpanel">
        <!-- obsah objednávok sa načíta sem -->
        <div id="orders-loader" class="text-muted">Comming soon ...</div>
    </div>
</div>

<script>
    $(function () {
        let contactsLoaded = false;

        $('#contacts-tab').on('shown.bs.tab', function () {
            if (!contactsLoaded) {
                $.get('routes/web/contacts.php', function (html) {
                    // setTimeout(function () {
                        $('#contacts').html(html);
                        contactsLoaded = true;
                    // }, 2000);
                }).fail(function () {
                    $('#contacts').html('<div class="text-danger">Chyba pri načítaní kontaktov.</div>');
                });
            }
        });
    });
</script>
