<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Attestation</title>
    <link rel="stylesheet" href="../../style/attestation.css">
</head>
<body>
    <div class="div_attestation">
        <div>
            <h1 class="div_title"><a href="/details/{{ $employe->id }}">ATTESTATION DE TRAVAIL</a></h1>
        </div>
        <br>
        <div>
            <p class="p">Je soussigné(e) 
                {{ Str::upper($admin->nom) }} {{ Str::upper($admin->prenom) }}
                agissant en qualité de Responsable RH dans l'entreprise MC, <br> certifie par la présente que M,Mme <i><strong>{{ $employe->nom }} {{ $employe->prenom }}</strong></i> est employé(e) par notre entreprise en qualité de {{ $employe->poste }} depuis le {{ $employe->date_embauche }}.
            </p>
        </div>
        <div>
            <h4>{{ $employe->nom }} {{ $employe->prenom }} <br> {{ $employe->poste }}</h4>
        </div>
        <p class="signature">Fait à Rabat, le {{ date('Y-m-d H:i') }}. </p>
    </div>
    <br>
    <div class="div_download">
        <br>
        <a id="download" class="a" onclick="document.getElementById('download').style.display='none';window.print();document.getElementById('download').style.display='unset';">Télécharger</a>
    </div>
</body>
</html>