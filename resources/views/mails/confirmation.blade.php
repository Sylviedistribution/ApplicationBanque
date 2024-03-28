<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de création de compte</title>
</head>
<body>
<div>
    <h2>Bonjour {{ $titulaireCompte }},</h2>
    <p>Votre compte bancaire a été créé avec succès. Voici les détails :</p>
    <ul>
        <li>Code banque: {{ $codeBanque }}</li>
        <li>Code guichet: {{ $codeGuichet }}</li>
        <li>Numéro de compte: {{ $numeroCompte }}</li>
        <li>Clé RIB: {{ $cleRib }}</li>
        <li>IBAN: {{ $iban }}</li>
        <li>Solde initial: {{ $solde }} FCFA</li>
    </ul>
    <p>Merci de votre confiance!</p>
</div>
</body>
</html>
