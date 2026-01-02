@extends('admin.layout')
@section('title', 'Modifier Produit')

@section('content')
<h2>Modifier Produit</h2>

<form action="{{ route('products.update', $product->id) }}" method="POST" class="product-form">
    @csrf
    @method('PUT')
    <input type="text" name="produit" value="{{ $product->produit }}" required>
    <input type="number" name="quantity" value="{{ $product->quantity }}" required>
    <input type="datetime-local" name="time" value="{{ \Carbon\Carbon::parse($product->created_at)->format('Y-m-d\TH:i') }}" required>
    <button type="submit">Enregistrer</button>
</form>
@endsection
