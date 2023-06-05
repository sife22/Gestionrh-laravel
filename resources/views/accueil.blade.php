<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/create">Ajouter un employé!</a></li>
            <li><a href="/logOut">Se deconnecter!</a></li>
        </ul>
    </nav>
    <div>
        {{-- @foreach(Session()->get('admin') as $admin)
                <h1> Bonjour {{ $admin }} </h1>
        @endforeach --}}
        <h1>Bonjour {{ $admin->name }}</h1>
        <h1>Liste des employes {{ App\Models\Employe::count() }}</h1>
        <ul>
            @foreach($employes as $employe)
                <li>{{ $employe->nom }} . {{ $employe->prenom }} . {{ $employe->numero_employe }} . / <a href="edit/{{ $employe->id }}">Modifier</a> <a href="delete/{{ $employe->id }}">Supprimer</a> <a href="details/{{ $employe->id }}">Afficher</a></li>
            @endforeach
        </ul>
    </div>
</body>
</html>