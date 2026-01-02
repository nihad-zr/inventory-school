@extends('admin.layout')
@section('title', 'Ajouter Employé')

@section('content')
<div class="employee-form-container">
    <h2>Ajouter un Employé</h2>

    @if($errors->any())
        <div class="error-box">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nom et Prénom -->
        <div class="form-row">
            <div class="form-group">
                <label>Nom <span>*</span></label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" required>
            </div>
            <div class="form-group">
                <label>Prénom <span>*</span></label>
                <input type="text" name="first_name" value="{{ old('first_name') }}" required>
            </div>
        </div>

        <!-- Email et Téléphone -->
        <div class="form-row">
            <div class="form-group">
                <label>Email <span>*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="text" name="phone" value="{{ old('phone') }}">
            </div>
        </div>

        <!-- Date et Lieu de naissance -->
        <div class="form-row">
            <div class="form-group">
                <label>Date de naissance</label>
                <input type="date" name="birth_date" value="{{ old('birth_date') }}">
            </div>
            <div class="form-group">
                <label>Lieu de naissance</label>
                <input type="text" name="birth_place" value="{{ old('birth_place') }}">
            </div>
        </div>

        <!-- Poste et Spécialité -->
        <div class="form-row">
            <div class="form-group">
                <label>Poste <span>*</span></label>
                <select name="position" id="position" required>
                    <option value="">-- Sélectionner un poste --</option>
                    @php
                        $positions = ['Directeur','Administration','Secrétariat','Pédagogique','Accueil','Sécurité','Enseignant'];
                    @endphp
                    @foreach($positions as $pos)
                        <option value="{{ $pos }}" {{ old('position') == $pos ? 'selected' : '' }}>{{ $pos }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" id="specialty-group" style="display: {{ old('position') == 'Enseignant' ? 'block' : 'none' }};">
                <label>Spécialité</label>
                <input type="text" name="specialty" value="{{ old('specialty') }}">
            </div>
        </div>

        <!-- Photo et CV -->
        <div class="form-row">
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="photo" accept="image/*">
            </div>
            <div class="form-group">
                <label>CV</label>
                <input type="file" name="cv" accept=".pdf,.doc,.docx">
            </div>
        </div>

        <button type="submit" class="btn-submit">Ajouter</button>
    </form>
</div>

<style>
.employee-form-container { 
    max-width: 800px; 
    margin: 20px auto; 
    padding: 25px; 
    background: #fff; 
    border-radius: 8px; 
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
h2 { text-align:center; margin-bottom:25px; color:#212c3f; }
.error-box { background:#f8d7da; padding:10px; margin-bottom:15px; border-radius:5px; color:#721c24; }
.form-row { display:flex; gap:20px; margin-bottom:15px; flex-wrap:wrap; }
.form-group { flex:1; display:flex; flex-direction:column; }
label span { color:red; }
input[type="text"], input[type="email"], input[type="date"], input[type="file"], select { 
    padding:8px; border:1px solid #ccc; border-radius:5px; margin-top:5px; width:100%; 
}
.btn-submit { display:block; width:100%; padding:12px; background-color:#212c3f; color:#fff; font-weight:bold; border:none; border-radius:6px; cursor:pointer; margin-top:15px; }
.btn-submit:hover { background-color:#f1c27d; color:#212c3f; }
</style>

<script>
document.getElementById('position').addEventListener('change', function() {
    var specialtyGroup = document.getElementById('specialty-group');
    specialtyGroup.style.display = (this.value === 'Enseignant') ? 'block' : 'none';
});
</script>
@endsection
