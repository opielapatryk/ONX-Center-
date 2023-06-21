<!DOCTYPE html>
<html>
<head>
    <title>Wyświetlanie klienta</title>
</head>
<body>
    <h1>Wyświetlanie klienta</h1>

    <p>ID: {{ $customer->id }}</p>
    <p>Imię: {{ $customer->name }}</p>
    <p>Email: {{ $customer->email }}</p>
    <p>Telefon: {{ $customer->phone }}</p>
</body>
</html>
