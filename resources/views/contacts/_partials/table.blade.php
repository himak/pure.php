<?php declare(strict_types=1); ?>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>ID</th>
        <th>Meno</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            @include('contacts._partials.table-row', ['contact' => $contact])
        @endforeach
    </tbody>
</table>
