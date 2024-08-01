
<!DOCTYPE html>
<html>
<head>
    <title>Facture</title>
</head>
<body>
<h1>Facture pour la commande #{{ $order->id }}</h1>
<p>Client: {{ $order->user->name }}</p>
<p>Prix Total: {{ $order->total_price }} €</p>
<h2>Perruques</h2>
<ul>
    @foreach($order->haircuts as $haircut)
        <li>{{ $haircut->name }} - {{ $haircut->price }} €</li>
    @endforeach
</ul>
</body>
</html>
