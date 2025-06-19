<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
</head>
<body>

    <h1>Lista de Contatos</h1>

    @if (session('success'))
        <div style="padding: 10px; margin-bottom: 10px; border: 1px solid green; color: green;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('contacts.create') }}">Adicionar Novo Contato</a>

    <hr>

    <table border="1" style="width:100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>
                        <a href="{{ route('contacts.show', $contact) }}">{{ $contact->name }}</a>
                    </td>
                    <td>{{ $contact->contact }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>
                        <a href="{{ route('contacts.edit', $contact) }}">Editar</a>
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este contato?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum contato encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>