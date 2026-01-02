<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin-dashboard.css') }}">
</head>
<body>

    <!-- Sidebar -->
<div class="sidebar">
    <div class="top">
        <img src="{{ asset('images/logo.png') }}" alt="Admin" style="object-fit: cover;">
        <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
        <hr class="top-hr">
    </div>

    <a href="/admin/dashboard">Tableau de bord</a>
    <a href="{{route ('products.index')}}">Produits</a>
    <a href="{{ route('items.index') }}">Articles</a>
    <a href="{{ route('admin.scan.page') }}">Scan Products</a>
    <a href="{{ route('employees.index') }}">Gestion du Personnel</a>

    <hr class="bottom-hr">

    <div class="bottom">
        <a href="/admin/logout" class="logout">Se Déconnecter</a>
    </div>
</div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Cards -->
        <div class="cards">
            <div class="card">
                <h3>Total des articles</h3>
                <p>{{ $totalItems }}</p>
            </div>
            <div class="card">
                <h3>Maintenance</h3>
                <p>{{ $maintenance }}</p>
            </div>
            <div class="card">
                <h3>Stock</h3>
                <p>{{ $storage }}</p>
            </div>
        </div>

        <!-- Bottom Section -->
        <div class="bottom-section">
            <!-- Table -->
            <table>
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Date</th>
                        <th>Heure</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loginHistory as $log)
                    <tr>
                        <td>{{ $log->admin->email }}</td>
                        <td>{{ $log->created_at->format('d/m/Y') }}</td>
                        <td>{{ $log->created_at->format('H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Calendar -->
            <div class="calendar">
                <header>
                    <h3 id="month-year" class="fulldata"></h3>
                    <div id="current-time" class="time" ></div>
                </header>
                <table id="calendar-table"></table>
            </div>
        </div>
    </div>

<script>
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('current-time').innerText = hours + ':' + minutes + ':' + seconds;
    }

    function generateCalendar() {
        const today = new Date();
        const month = today.getMonth();
        const year = today.getFullYear();
        const firstDay = new Date(year, month, 1).getDay(); // 0 = Sunday
        const lastDate = new Date(year, month + 1, 0).getDate();

        const monthNames = ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
                            "Août","Septembre","Octobre","Novembre","Décembre"];

        document.getElementById('month-year').innerText = monthNames[month] + ' ' + year;

        const calendarTable = document.getElementById('calendar-table');
        calendarTable.innerHTML = '';

        let row = document.createElement('tr');

        // Fill empty cells before first day
        for(let i=0; i<firstDay; i++){
            let cell = document.createElement('td');
            row.appendChild(cell);
        }

        for(let date=1; date<=lastDate; date++){
            if(row.children.length === 7){
                calendarTable.appendChild(row);
                row = document.createElement('tr');
            }
            let cell = document.createElement('td');
            cell.innerText = date;

            // Highlight today
            if(date === today.getDate()){
                cell.classList.add('today');
            }
            row.appendChild(cell);
        }

        // Fill last row if needed
        while(row.children.length < 7){
            let cell = document.createElement('td');
            row.appendChild(cell);
        }
        calendarTable.appendChild(row);
    }

    // Initial call
    updateClock();
    generateCalendar();

    // Update clock every second
    setInterval(updateClock, 1000);
</script>

</body>
</html>
