@extends('admin.layout')
@section('title', 'Products')

@section('content')
<h2 style="margin-bottom:20px;">Products</h2>

@if(session('success'))
    <div style="color:green; margin-bottom:15px;">{{ session('success') }}</div>
@endif

<!-- Form لإضافة منتجات -->
<form action="{{ route('products.store') }}" method="POST" class="product-form">
    @csrf
    <input type="text" name="produit" placeholder="Nom du produit" required>
    <input type="number" name="quantity" placeholder="Quantité" required>
    <input type="datetime-local" name="time" required>
    <button type="submit">Ajouter</button>
</form>

<!-- عنوان الجدول -->
<h3 style="margin-top:30px; margin-bottom:10px;">Liste des produits</h3>

<!-- Table لعرض المنتجات -->
<table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Quantité</th>
            <th>Date</th>
            <th>Action</th> <!-- عمود جديد -->
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->id_custom }}</td>
            <td>{{ $p->produit }}</td>
            <td>{{ $p->quantity }}</td>
            <td>{{ \Carbon\Carbon::parse($p->created_at)->format('d/m/Y H:i') }}</td>
    <td>
    <!-- زر تعديل -->
    <a href="{{ route('products.edit', $p->id) }}" title="Modifier" class="action-btn edit-btn">
        <i class="fas fa-pen"></i>
    </a>

    <!-- زر حذف -->
    <button type="button" class="action-btn delete-btn" data-id="{{ $p->id }}" title="Supprimer">
        <i class="fas fa-trash"></i>
    </button>
</td>



        </tr>
        @endforeach
    </tbody>
</table>


<!-- CSS داخل الصفحة -->
<style>
/* ===== Form ===== */
.product-form {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}

.product-form input {
    padding: 12px 15px;
    font-size: 16px;
    border-radius: 6px;
    border: 1px solid #ccc;
    flex: 1 1 200px;
}

.product-form button {
    padding: 12px 25px;
    font-size: 16px;
    border-radius: 6px;
    border: none;
    background-color: #f1c27d;
    color: #212c3f;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
}

.product-form button:hover {
    background-color: #212c3f;
    color: #f1c27d;
    transform: scale(1.05);
}

/* ===== Table ===== */
.product-table {
    width: 70%;
    border-collapse: collapse;
    font-size: 14px;
    text-align: center;
}

.product-table th,
.product-table td {
    border: 1px solid #ccc;
    padding: 8px 10px;
}

.product-table th {
    background-color: #212c3f;
    color: #f1c27d;
}

.product-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.product-table tr:hover {
    background-color: #f1c27d;
    color: #212c3f;
    transition: all 0.3s ease;
}
.action-btn {
    font-size: 18px;
    color: #212c3f;
    background: none;
    border: none;
    cursor: pointer;
    transition: transform 0.2s, color 0.2s;

}

.action-btn:hover {
    transform: scale(1.2);
}

.edit-btn:hover i {
    color: #2a5298;
}

.delete-btn:hover i {
    color: #d9534f; 
}


</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    $('.delete-btn').click(function() {
    let productId = $(this).data('id');
    let row = $(this).closest('tr');

    // هذا هو الـ confirm الوحيد
    if(confirm('Voulez-vous vraiment supprimer ce produit ?')) {
        $.ajax({
            url: '/admin/products/' + productId,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                row.fadeOut(300, function() {
                    $(this).remove();
                });
                alert('Produit supprimé avec succès.');
            },
            error: function(xhr) {
                alert('Erreur lors de la suppression.');
            }
        });
    }
});

});
</script>

@endsection



                                            