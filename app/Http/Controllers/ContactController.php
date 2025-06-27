<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController
{
    public function index(): array
    {
        return Contact::query()
            ->orderBy('id', 'desc')
            ->get()->toArray();
    }

    public function store(Request $request)
    {
        // Spravíme si data s automatickým trimom
        $data = array_map('trim', $request->only(['name', 'email']));

        // Voliteľné vlastné správy a atribúty (názvy polí)
        $messages = [
            'required' => 'Pole :attribute je povinné.',
            'min' => 'Pole :attribute musí mať aspoň :min znakov.',
            'email' => 'Pole :attribute musí byť platná e-mailová adresa.',
        ];

        $customAttributes = [
            'email' => 'emailová adresa',
            'name' => 'meno',
        ];

        // Vytvorenie validátora
        $validator = Validator::make($data, [
            'name' => 'required|string|min:10',
            'email' => 'required|email',
        ], $messages, $customAttributes);

        // Ak validácia zlyhá, vrátime chyby
        if ($validator->fails()) {

            return [
                'errors' => $validator->errors()->toArray()
            ];
        }

        // Validované a otrimované dáta
        $validData = $validator->validated();

        // Vytvor nový Contact v DB
        $contact = Contact::query()->create([
            'name' => $validData['name'],
            'email' => $validData['email'],
        ]);

        $html = view_content('contacts/_partials/table-row', ['contact' => $contact]);

        return [
            'data' => $html
        ];
    }
}
