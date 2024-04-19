<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Simple QrCode</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, minimum-scale=0.1">
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgb(14, 14, 14);
        }
    </style>
</head>
<body>
    {!! QrCode::margin(1)->size($size)->generate($data); !!}
</body>
</html>