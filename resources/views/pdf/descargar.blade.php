<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ public_path('css/normalize.css') }}" rel="stylesheet" />
    <link href="{{ public_path('css/pdf.css') }}" rel="stylesheet" />
    <title>Certificado ACOM</title>
</head>

<body>
    <div>
        {{ QrCode::size(500)->generate('http://127.0.0.1:8000/estudiante/' . auth()->user()->numeroControl . '/edit') }}
    </div>

</body>

</html>
