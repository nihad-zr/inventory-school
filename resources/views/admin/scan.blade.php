@extends('admin.layout')

@section('title', 'Scanner un article')

@section('content')

<h2>Scanner le code-barres</h2>

<input type="text"
       id="barcode"
       placeholder="Scannez ou saisissez le code-barres puis appuyez sur Entrée"
       autofocus
       style="width:300px; padding:10px; font-size:18px;">

<table border="1" cellpadding="10" style="margin-top:20px; width:100%; display:none;" id="resultTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Produit</th>
            <th>État</th>
            <th>Emplacement</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody id="resultBody"></tbody>
</table>

<p id="notFound" style="color:red; display:none;">Article non trouvé</p>

@endsection

@section('scripts')
<script>
document.getElementById('barcode').addEventListener('keydown', function (e) {

    if (e.key !== 'Enter') return;

    let code = this.value.trim();
    if (!code) return;

    fetch('/admin/scan-item/' + encodeURIComponent(code))
        .then(response => response.json())
        .then(data => {

            if (data.status === 'success') {

                document.getElementById('notFound').style.display = 'none';
                document.getElementById('resultTable').style.display = 'table';

                // Ajouter une nouvelle ligne sans effacer les précédentes
                let newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${data.item.id_custom}</td>
                    <td>${data.item.produit}</td>
                    <td>${data.item.etat}</td>
                    <td>${data.item.location}</td>
                    <td>${data.item.created_at}</td>
                `;
                document.getElementById('resultBody').appendChild(newRow);

            } else {
                document.getElementById('notFound').style.display = 'block';
            }
        })
        .catch(() => {
            document.getElementById('notFound').style.display = 'block';
        });

    this.value = '';
});
</script>
@endsection
