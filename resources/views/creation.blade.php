<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/creation.css" />
    <title>Création</title>
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
    <div class="div_inscription">
        <form action="storeData" method="post" class="form_inscription">
            @csrf
          <div>
            <a href="/accueil" >Liste des employés</a>
          </div>
          <div>
            <h1 class="form_title">Ajouter un employé</h1>
          </div>
          <br />
          <div>
            <label>
              Nom : <br />
              <input type="text" name="nom" placeholder="Nom :"  class="input_inscription" value="{{ old('nom') }}" />
            </label>
          </div>
          @error('nom')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
         
          <br />
          <div>
            <label>
              Prénom : <br />
              <input type="text" name="prenom" placeholder="Prenom :"  class="input_inscription" value="{{ old('prenom') }}" />
            </label>
          </div>
          @error('prenom')
          <div class="erreur">*{{ $message }}</div>
          @enderror      
          <br />
  
          <div>
            <label>
              Tél : <br />
              <input type="text" name="tel" placeholder="Numéro :"  class="input_inscription"  value="{{ old('tel') }}"/>
            </label>
          </div>
          @error('tel')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
          <br />
  
          <div>
            <label>
              Adress : <br />
              <input
                type="text"
                name="adresse"
                placeholder="Adress :"
              class="input_inscription" value="{{ old('adresse') }}" />
            </label>
          </div>
          @error('adresse')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
          <br />
  
          <div>
            <label>
              Date de naissance : <br />
              <input
                type="date"
                name="date_naissance"
                placeholder="Date de naissance :"
              class="input_inscription"  value="{{ old('date_naissance') }}"/>
            </label>
          </div>
          @error('date_naissance')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
          
          <br />
          <div>
            <label>
              Poste : <br />
              <input
                type="text"
                name="poste"
                placeholder="Poste :"
              class="input_inscription"  value="{{ old('poste') }}"/>
            </label>
          </div>
          @error('poste')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
          <br />
          <div>
            <label>
              Salaire : <br />
              <input
                type="number"
                name="salaire"
                placeholder="Salaire :"
                min="0"
             class="input_inscription"  value="{{ old('salaire') }}" />
            </label>
          </div>
          @error('salaire')
          <div class="erreur">*{{ $message }}</div>
          @enderror    
          <br />
          <div>
            <input
              type="submit"
              name="ajouter"
              value="Ajouter un employé"
              class="ajouter"
            />
          </div>
          
          {{-- @if ($errors->any())
          <div class="alert alert-danger">
          </div>
@endif --}}
        </form>
</body>
</html>