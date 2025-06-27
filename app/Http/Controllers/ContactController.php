<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController
{
    public function index(): array
    {
        return Contact::query()
            ->orderBy('id', 'desc')
            ->get()->toArray();
    }

    public function store(array $data): array
    {
        $name = trim($data['name'] ?? '');
        $email = trim($data['email'] ?? '');

        $errors = [];

        if ($name === '') {
            $errors['name'] = 'Meno je povinné.';
        } elseif (mb_strlen($name) < 2) {
            $errors['name'] = 'Meno musí mať aspoň 2 znaky.';
        }

        if ($email === '') {
            $errors['email'] = 'Email je povinný.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Zadajte platný email.';
        }

        if ($errors) {
            return [
                'errors' => $errors
            ];
        }

        $contact = Contact::query()
            ->create(['name' => $name, 'email' => $email])
            ->toArray();

        $html = view_content('contacts/_partials/table-row', ['contact' => $contact]);

        return [
            'data' => $html
        ];
    }
}
