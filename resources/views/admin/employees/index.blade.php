@extends('admin.layout')
@section('title', 'Gestion des Employés')

@section('content')
<h2>Liste des employés</h2>

<a href="{{ route('employees.create') }}" class="btn-add">Ajouter un employé</a>

<table class="employee-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Poste</th>
            <th>Spécialité</th>
            <th>CV</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{ $employee->id }}</td>
            <td>
                @if($employee->photo)
                    <img src="{{ asset('uploads/photos/'.$employee->photo) }}" alt="Photo" class="employee-photo">
                @else
                    <span>-</span>
                @endif
            </td>
            <td>{{ $employee->last_name }}</td>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone ?? '-' }}</td>
            <td>{{ $employee->position }}</td>
            <td>{{ $employee->specialty ?? '-' }}</td>
            <td>
                @if($employee->cv)
                    <a href="{{ asset('uploads/cv/'.$employee->cv) }}" target="_blank" class="btn-cv">Voir CV</a>
                @else
                    <span>-</span>
                @endif
            </td>
            <td class="actions">
                <a href="{{ route('employees.edit', $employee->id) }}" class="btn-edit">Modifier</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete" onclick="return confirm('Voulez-vous vraiment supprimer cet employé ?');">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<style>
h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #212c3f;
}

.btn-add {
    display: inline-block;
    margin-bottom: 15px;
    padding: 10px 20px;
    background-color: #212c3f;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}
.btn-add:hover {
    background-color: #f1c27d;
    color: #212c3f;
}

.employee-table {
    width: 100%;
    border-collapse: collapse;
}
.employee-table th, .employee-table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}
.employee-table th {
    background-color: #f4f4f4;
    color: #212c3f;
}

.employee-photo {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 50%;
}

.btn-cv {
    padding: 5px 10px;
    background-color: #28a745;
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 12px;
}
.btn-cv:hover {
    background-color: #218838;
}

.actions a, .actions button {
    margin: 2px;
    padding: 5px 10px;
    border-radius: 4px;
    font-size: 13px;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.btn-edit {
    background-color: #007bff;
    color: #fff;
}
.btn-edit:hover {
    background-color: #0069d9;
}

.btn-delete {
    background-color: #dc3545;
    color: #fff;
}
.btn-delete:hover {
    background-color: #c82333;
}
</style>
@endsection
