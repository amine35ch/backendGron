<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichier non trouvé</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body style="alert alert-secondary">
    <div class="container mt-5 pt-5 ">
        <div class="alert alert-secondary text-center">
            <h2 class="display-3">Whops ! :'(</h2>
            <p class="display-4">{{ $data }}</p>
        </div>
    </div>
</body>

</html>
