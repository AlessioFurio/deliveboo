<h1>totale pagamenti-ordini ristorante</h1>
@foreach ($payments as $payment)
    <ul>
        <li>Ordine: {{ $payment->id }}</li>
        <li>Data ordine: {{ $payment->created_at }}</li>
        <li>Stato pagamento: {{ $payment->status }}</li>
        <li>Prezzo totale: {{ $payment->price }}</li>
    </ul>
@endforeach

<label for="statistics">Date:</label>

<input type="date" id="statistics" name=""
       value="2021-02-18"
       min="2021-01-01" max="2021-12-31">
<button type="button" name="button">Filtra</button>
