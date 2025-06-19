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

    <form action="{{ route('contacts.update', $contact) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
            @error('name')
                <div style="color: red; font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="contact">Contato (9 dígitos):</label><br>
            <input type="text" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required>
            @error('contact')
                <div style="color: red; font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
            @error('email')
                <div style="color: red; font-size: 0.9em;">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <button type="submit">Atualizar Contato</button>
    </form>

</body>
</html>