<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalhes de {{ $contact->name }}</title>
</head>
<body>

    <h1>Detalhes do Contato: {{ $contact->name }}</h1>

    <a href="{{ route('contacts.index') }}">Voltar para a Lista</a>
    <hr>

    <p><strong>ID:</strong> {{ $contact->id }}</p>
    <p><strong>Nome:</strong> {{ $contact->name }}</p>
    <p><strong>Contato:</strong> {{ $contact->contact }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>

    <hr>
    <p>
        <a href="{{ route('contacts.edit', $contact->id) }}">Editar este Contato</a>

        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline; margin-left: 10px;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este contato?')">Deletar</button>
        </form>
    </p>

</body>
</html>