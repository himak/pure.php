<?php
declare(strict_types=1);

require_once __DIR__ . '/../../app/bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

if (!Capsule::schema()->hasTable('kontakty')) {
    Capsule::schema()->create('kontakty', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
    });

    echo "Table 'kontakty' was created.\n";
} else {
    echo "Table 'kontakty' already exist.\n";
}
