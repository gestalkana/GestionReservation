<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
     <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/main.min.css" rel="stylesheet">
    <!-- Feuilles de styles personnalisées -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-light border-end d-none d-md-block">
            @include('layouts.sidebar')
        </nav>

        <!-- Page content -->
        <div class="flex-grow-1">
            <!-- Navbar top -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
                <div class="container-fluid">
                    <button class="btn btn-primary d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand ms-2" href="#">{{ config('app.name', 'Laravel') }}</a>
                </div>
            </nav>

            <!-- Mobile Sidebar Offcanvas -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="mobileSidebarLabel">{{ config('app.name', 'Laravel') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    @include('layouts.sidebar')
                </div>
            </div>

            <main class="container-fluid">
                @isset($header)
                    <header class="mb-4 border-bottom pb-2 py-2">
                        {{ $header }}
                    </header>
                @endisset

                {{ $slot }}
            </main>
        </div>
    </div>
     <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/main.min.js"></script>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');

            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Vue par défaut : mois
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay' // vues dispo
                },
                locale: 'fr', // langue française
                navLinks: true, // cliquer sur le jour -> vue détaillée
                selectable: true, // possibilité de sélectionner
                editable: true, // rendre déplaçable les events
                events: [
                    { title: 'Réunion équipe', start: '2025-09-20T10:00:00' },
                    { title: 'Démo Client', start: '2025-09-22', end: '2025-09-23' },
                    { title: 'Anniversaire Marie', start: '2025-09-25' },
                ],
                select: function(info) {
                    let eventName = prompt("Nom de l'événement ?");
                    if (eventName) {
                        calendar.addEvent({
                            title: eventName,
                            start: info.start,
                            end: info.end,
                            allDay: info.allDay
                        });
                    }
                    calendar.unselect();
                }
            });

            calendar.render();
        });
    </script>
</body>
</html>
