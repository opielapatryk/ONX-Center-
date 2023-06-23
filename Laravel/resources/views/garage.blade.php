<h1>Informacje o użytkowniku</h1>

<p>Nazwa: {{ $user->name }}</p>

<p>Email: {{ $user->email }}</p>

<h2>Samochody przypisane do użytkownika</h2>

<form method="POST" action="{{ route('setActiveCar', $user->id) }}">
    @csrf

    <ul style="list-style-type: none">
        @php
        $activeCarId = session('activeCarId');
        @endphp
@foreach ($user->cars as $car)
    <li>
        <input type="radio" name="active_car" value="{{ $car->id }}" {{ $car->id == $activeCarId ? 'checked' : '' }}>
        Marka samochodu: {{ $car->brand }}
        <br>
        Model samochodu: {{ $car->model }}
        <br>
    </li>
@endforeach



        <li>
            <input type="radio" name="active_car" value="" {{ !$activeCarId ? 'checked' : '' }}>


            Brak przypisanego samochodu
            <br>
        </li>
    </ul>

    <button type="submit">Zapisz</button>
</form>

<h2>Wybierz innego użytkownika:</h2>

<ul style="list-style-type: none">
    @foreach ($users as $otherUser)
        <li><a href="{{ route('garage', $otherUser->id) }}">{{ $otherUser->name }}</a></li>
    @endforeach
</ul>
