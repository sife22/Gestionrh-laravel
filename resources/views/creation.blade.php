<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style/creation.css" />
    <title>Création</title>
</head>
<body>
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