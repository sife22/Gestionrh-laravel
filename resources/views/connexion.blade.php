<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/connexion.css" />
    <title>Connexion</title>
</head>
<body>
    <div class="div_connexion">
       
        <form action="logIn" method="post" class="form_connexion">
            @csrf

            <div>
              <h1 class="form_title">Connexion</h1>
            </div>
            {{-- <br /> --}}
            <h3 class="form_bonjour">Bonjour sur votre platform!</h3>
            <div>
              <label>
                Nom : <br />
                <input type="text" name="name" placeholder="Nom :" value="{{ old('name') }}"  class="input_connexion" />
              </label>
            </div>
            <br />
            <div>
              <label>
                Mot de passe : <br />
                <input type="password" name="password" placeholder="password :" value="{{ old('password') }}"  class="input_connexion"/>
              </label>
            </div>
            <br />
            <div>
              <input
                type="submit"
                name="login"
                value="Se connecter"
                class="seconnecter"
              />
            </div>
            <div>
            @if(session()->has('failed'))
                <h3 id='failed' class="erreur">{{ Session()->get('failed') }}</h3>
            @endif
            </div>
          </form>
    </div>
</body>
</html>