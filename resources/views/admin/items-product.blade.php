@extends('admin.layout')

@section('content')

<style>
/* Header + Buttons */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.page-header h2 { margin:0; color:#212c3f; }

.btn {
    padding: 10px 18px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    transition: all 0.3s ease;
}

.btn-save { background-color:#212c3f; color:#f1c27d; }
.btn-save:hover { background-color:#f1c27d; color:#212c3f; }
.btn-print { background-color:#f1c27d; color:#212c3f; margin-left:10px; }
.btn-print:hover { background-color:#212c3f; color:#f1c27d; }

/* Table */
.items-table { width:100%; border-collapse: collapse; margin-top:15px; }
.items-table th, .items-table td { padding:12px; border:1px solid #ddd; text-align:center; }
.items-table th { background-color:#212c3f; color:#f1c27d; }
.items-table tr:nth-child(even) { background-color:#f9f9f9; }
.items-table tr:hover { background-color:#f1c27d; color:#212c3f; transition:0.3s; }
.items-table select { padding:6px 10px; border-radius:5px; border:1px solid #ccc; }

.barcode-box img { margin-bottom:5px; }
</style>

<div class="page-header">
    <h2>Items Details - {{ $product->produit }}</h2>
    <div>
        <button type="submit" form="itemsForm" class="btn btn-save"> Enregistrer</button>
        <button type="button" class="btn btn-print"
        onclick="window.open('{{ route('items.print', $product->id) }}','_blank')">
       Imprimer tout
    </button>
    </div>
</div>

<form id="itemsForm" method="POST" action="/admin/items/update">
@csrf
<table class="items-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>État</th>
            <th>Emplacement</th>
            <th>Code-barres</th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->item_id }}</td>
            <td>
                <select name="items[{{ $item->id }}][etat]">
                    <option value="good" {{ $item->etat=='good'?'selected':'' }}>Bon</option>
                    <option value="broken" {{ $item->etat=='broken'?'selected':'' }}>Cassé</option>
                </select>
            </td>
            <td>
                <select name="items[{{ $item->id }}][location]">
                    <option {{ $item->location== 'Section 1'?'selected':'' }}>Section 1</option>
                    <option {{ $item->location=='Section 2'?'selected':'' }}>Section 2</option>
                    <option {{ $item->location=='Laboratoire 1'?'selected':'' }}>Laboratoire 1</option>
                    <option {{ $item->location=='Laboratoire 2'?'selected':'' }}>Laboratoire 2</option>
                    <option {{ $item->location=='Administration'?'selected':'' }}>Administration</option>
                    <option {{ $item->location == 'Stock' ? 'selected' : '' }}>Stock</option>
                </select>
            </td>
            <td class="barcode-box">
<img src="https://barcode.tec-it.com/barcode.ashx?data={{ $item->item_id }}" width="120">
                <!-- تم إزالة النص أسفل الباركود -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</form>

@endsection
