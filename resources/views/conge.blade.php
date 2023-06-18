<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Congé</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/style/conge.css">
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
        <h3>{{ $employe->prenom }}</h3>
        <form action="/setConge/{{ $employe->id }}" method="POST">
            @csrf
            <div>
                <label for="">Durée du congé :
                    <input type="number" name="duree" /> jours
                </label>
            </div>
            <br>
            <div>
                
                <label for="">
                    Justification : 
                    <div>
                        <label for="">Non <input type="checkbox" name="non"></label>
                    </div>
                    <div>
                        <label for="">Oui <input type="checkbox" name="oui"></label>
                        <select name="justification">
                            <option value="" selected disabled>Choisi la justification</option>
                            <option value="demande" name='demande'>Demande</option>
                            <option value="justifie" name='justifie'>Justifié</option>
                        </select>
                    </div>
                </label>
            <br>
            <br>
        </div>
            <input type="submit" value="Valider">
            @if(session()->has('succes'))
            <h3 id='succes' class="succes">{{ Session()->get('succes') }}</h3>
            @endif

            @if(session()->has('failled'))
            <h3 id='failled' class="failled">{{ Session()->get('failled') }}</h3>
            @endif

            @if(session()->has('justification'))
            <h3 id='justification' class="justification">{{ Session()->get('justification') }}</h3>
            @endif

            @if(session()->has('required'))
            <h3 id='required' class="required">{{ Session()->get('required') }}</h3>
            @endif

            @if(session()->has('lesdeux'))
            <h3 id='lesdeux' class="lesdeux">{{ Session()->get('lesdeux') }}</h3>
            @endif
        </form>
      </div>
</body>
</html>