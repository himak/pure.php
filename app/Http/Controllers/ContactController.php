<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController
{
    public function index()
    {
        $contacts = Contact::query()
            ->orderBy('id', 'desc')
            ->get()->toArray();

        return view('contacts.index', ['contacts' => $contacts]);
    }
}
