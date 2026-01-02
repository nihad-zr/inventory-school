@extends('admin.layout')
@section('title', 'Items')

@section('content')

<h2 style="margin-bottom:20px;">Items</h2>

<!-- عرض المنتجات على شكل مربعات قابلة للنقر -->
<div class="items-grid">
    @foreach($products as $p)
        <a href="#" class="item-card" data-id="{{ $p->id }}">
            <h3>{{ $p->produit }}</h3>
            <p>Quantité: {{ $p->quantity }}</p>
        </a>
    @endforeach
</div>

<!-- CSS داخل الصفحة -->
<style>
/* ===== Grid ===== */
.items-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

/* ===== Card ===== */
.item-card {
    display: block;
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    color: #212c3f;
    text-decoration: none;
}

.item-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    background-color: #f1c27d;
    color: #212c3f;
}

.item-card h3 {
    margin-bottom: 10px;
    font-size: 18px;
}

.item-card p {
    font-size: 14px;
    color: #555;
}
</style>

<!-- JS: توجيه عند الضغط -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.item-card').forEach(card => {
        card.addEventListener('click', () => {
            let productId = card.dataset.id;
            // هنا ستضع الرابط الذي تريد التوجيه إليه لاحقًا
            // مثال مؤقت:
            window.location.href = '/admin/items/' + productId;
        });
    });
});
</script>

@endsection
