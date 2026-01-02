<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Print Barcodes - {{ $product->produit }}</title>
<style>
body {
    font-family: Arial, sans-serif;
    padding: 20px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #212c3f;
}

.barcode-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.barcode-item {
    width: 28%; 
    margin: 1%;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.barcode-item img {
    width: 180px;   
    height: 80px;  
    margin-bottom: 5px;
}

@media print {
    body {
        padding: 0;
    }
    .barcode-item {
        page-break-inside: avoid;
    }
}
</style>
</head>
<body>

<h2>Barcodes pour {{ $product->produit }}</h2>

<div class="barcode-container">
    @foreach($items as $item)
        <div class="barcode-item">
            <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $item->item_id }}" alt="Barcode">
        </div>
    @endforeach
</div>

<script>
// فتح نافذة الطباعة تلقائيًا عند تحميل الصفحة
window.onload = function() {
    window.print();
};
</script>

</body>
</html>
