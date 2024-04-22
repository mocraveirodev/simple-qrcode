<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simple QrCode</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, minimum-scale=0.1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"
    >
    <style>
        body {
            margin: 0 auto;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(14, 14, 14);
        }
    </style>
</head>
<body>
    @if ($errors->any())
        <div class="card border-danger" style="max-width: 18rem;">
            <div class="card-header text-danger">
                <h2>Errors</h2>
            </div>
            <div class="card-body">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <img src="data:image/png;base64, {!! 
            base64_encode(
                QrCode::format('png')
                    ->margin(1)
                    ->size($size)
                    ->generate($data)
            )
        !!}" alt="QR Code">
    @endif
</body>
</html>
