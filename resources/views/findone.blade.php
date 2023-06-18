<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="style/accueil.css">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/accueil">Gestion RH</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/create">Ajouter un employe</a>
              </li>
            </ul>
            
            <a class="nav-link" href="/logOut" id="logout">Se deconnecter</a>
          </div>
        </div>
      </nav>




    <div>
        
        {{-- <h1>Bonjour {{ $admin->name }}</h1> --}}
        {{-- <h1>Liste des employes {{ App\Models\Employe::count() }}</h1> --}}

        <form class="d-flex" role="search" method="POST" action="findOne">
            @csrf
            <input name="numero_employe" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>



        <table class="table">
            <thead>
              <tr>
                <th scope="col">Numero Employe</th>
                <th scope="col">Prénom</th>
                <th scope="col">Nom</th>
                <th scope="col">Details</th>
                <th scope="col">Modification</th>
                <th scope="col">Suppression</th>
              </tr>
            </thead>
            <tbody>
            @foreach($employes as $employe)
              <tr>
                <th scope="row">{{ $employe->numero_employe }}</th>
                <td>{{ $employe->prenom }}</td>
                <td>{{ $employe->nom }}</td>
                <td><a href="details/{{ $employe->id }}">Details</a></td>
                <td><a href="edit/{{ $employe->id }}">Modifier</a></td>
                <td><a href="delete/{{ $employe->id }}">Supprimer</a></td>
              </tr>
            @endforeach

            </tbody>
          </table>




        
    </div>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>