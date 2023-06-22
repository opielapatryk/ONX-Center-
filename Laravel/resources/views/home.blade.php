<h1>Informacje o kliencie</h1>

<p>Klient: {{ $customer->name }}</p>
<p>Email: {{ $customer->email }}</p>
<p>Telefon: {{ $customer->phone }}</p>

<h2>Pracownik przypisany do klienta</h2>

<p>Pracownik: {{ $customer->employee->name }}</p>

<h2>Zamówienia klienta</h2>

<ul>
    @foreach ($customer->orders as $order)
        <li>Numer zamówienia: {{ $order->number }}</li>
        <li>Wartość zamówienia: {{ $order->value }}</li>
        <br>
    @endforeach
</ul>

<h2>Wybierz innego klienta:</h2>

<ul>
    @foreach ($customers as $customer)
        <li><a href="{{ route('home', $customer->id) }}">{{ $customer->name }}</a></li>
    @endforeach
</ul>
