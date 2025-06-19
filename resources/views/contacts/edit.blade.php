<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato: {{ $contact->name }}</title>
</head>
<body>
    <h1>Editar Contato</h1>

    <a href="{{ route('contacts.index') }}">Voltar para a Lista</a>
    <hr>

    <form action="{{ route('contacts.update', $contact->id) }}" method="PUT">
        @csrf

        <div>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
        </div>
        <br>
        <div>
            <label for="contact">Contato (9 dígitos):</label><br>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required>
        </div>
        <br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
        </div>
        <br>
        <button type="submit">Atualizar Contato</button>
    </form>

</body>
</html>