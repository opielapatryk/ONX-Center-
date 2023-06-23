<h1>Informacje o uzytkowniku</h1>

<p>Nazwa: {{ $user->name }}</p>

<p>Email: {{ $user->email }}</p>

<h2>Samochody przypisane do użytkownika</h2>

<form method="POST" action="{{ route('setActiveCar', $user->id) }}">
    @csrf

    <ul style="list-style-type: none">
        @foreach ($user->cars as $car)
            <li>
                <input type="radio" name="active_car" value="{{ $car->id }}" {{ $car->is_active ? 'checked' : '' }}>
                Marka samochodu: {{ $car->brand }}
                <br>
                Model samochodu: {{ $car->model }}
                <br>
            </li>
        @endforeach
    </ul>

    <button type="submit">Zapisz</button>
</form>


<h2>Wybierz innego uzytkownika:</h2>

<ul style="list-style-type: none">
    @foreach ($users as $user)
        <li><a href="{{ route('garage', $user->id) }}">{{ $user->name }}</a></li>
    @endforeach
</ul>