<h1>Informacje o uzytkowniku</h1>

<p>Nazwa: {{ $user->name }}</p>

<p>Email: {{ $user->email }}</p>

<h2>Samochody przypisane do uzytkownika</h2>

<ul style="list-style-type: none">
    @foreach ($user->cars as $car)
        @if ($car->is_active)
            <b>Samochód aktualnie uzywany przez uzytkownika:</b>
            <li style="color:green;">Marka samochodu: {{ $car->brand }}</li>
            <li style="color:green;">Model samochodu: {{ $car->model }}</li>
            <br>
        @else 
        <li>Marka samochodu: {{ $car->brand }}</li>
        <li>Model samochodu: {{ $car->model }}</li>
        <br>
        @endif
    @endforeach
</ul>

<h2>Wybierz innego uzytkownika:</h2>

<ul style="list-style-type: none">
    @foreach ($users as $user)
        <li><a href="{{ route('garage', $user->id) }}">{{ $user->name }}</a></li>
    @endforeach
</ul>