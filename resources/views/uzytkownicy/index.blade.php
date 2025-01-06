<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
</head>
<body>
    <h1>Lista użytkowników</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Email</th>
                <th>Rola</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uzytkownicy as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->rola }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginacja (jeśli używasz paginacji) -->
    {{-- {{ $users->links() }} --}}
</body>
</html>
