<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-calendar-week text-primary fs-4"></i>
            <h1 class="h5 fw-bold mb-0 text-dark">Planning des Réservations & Événements</h1>
        </div>
    </x-slot>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-3">
            <div id="calendar" class="small-calendar"></div>
        </div>

        <div class="card-footer bg-light border-0 text-center py-3">
            <div class="text-center">
                <button class="btn btn-sm btn-outline-secondary mb-2" data-bs-toggle="collapse" data-bs-target="#legendCollapse">
                    <i class="bi bi-eye"></i> Légende
                </button>
            </div>
            <div id="legendCollapse" class="collapse show">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <span class="badge rounded-pill bg-success">
                        <i class="bi bi-check-circle me-1"></i> Réservation confirmée
                    </span>
                    <span class="badge rounded-pill bg-warning text-dark">
                        <i class="bi bi-hourglass-split me-1"></i> Réservation en attente
                    </span>
                    <span class="badge rounded-pill bg-secondary">
                        <i class="bi bi-archive me-1"></i> Historique
                    </span>
                    <span class="badge rounded-pill bg-info text-dark">
                        <i class="bi bi-clipboard-check me-1"></i> Tâche interne
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Bouton flottant moderne -->
    <!-- Bouton flottant moderne avec couleur violet personnalisée -->
    <button class="btn btn-violet btn-floating shadow" onclick="addQuickEvent()">
        <i class="bi bi-plus-lg"></i>
    </button>


    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

    <!-- Styles personnalisés -->
    <style>
        /* Calendrier */
        #calendar {
            height: 450px;
            font-size: 0.8rem;
        }

        /* Toolbar */
        .fc .fc-button {
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            border-radius: 0.4rem;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #212529;
            transition: all 0.2s ease-in-out;
        }

        .fc .fc-button:hover {
            background: #0d6efd;
            color: #fff;
        }

        .fc-toolbar-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .fc-event {
            border-radius: 0.4rem;
            padding: 1px 4px;
            font-size: 0.7rem;
            border: none;
        }
        /* Hover violet sur les cases du calendrier */
        .fc .fc-daygrid-day:hover {
            background-color: #f3e8ff; /* Violet très clair */
            cursor: pointer;
            transition: background 0.2s ease-in-out;
        }

        /* Badge compact */
        .badge {
            font-size: 0.7rem;
            padding: 0.25rem 0.6rem;
        }

        /* Bouton flottant */
        .btn-floating {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.3rem;
            transition: background 0.3s ease;
            z-index: 1050;
        }

        .btn-floating:hover {
            background-color: #0b5ed7 !important;
        }

        /* Responsive */
        @media (max-width: 576px) {
            #calendar {
                height: 400px;
                font-size: 0.75rem;
            }

            .fc .fc-button {
                font-size: 0.65rem;
                padding: 0.2rem 0.4rem;
            }

            .fc-toolbar-title {
                font-size: 0.9rem;
            }

            .badge {
                font-size: 0.65rem;
                padding: 0.2rem 0.5rem;
            }
        }
    </style>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>

    <!-- Initialisation FullCalendar -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let calendarEl = document.getElementById('calendar');

            if (calendarEl) {
                let calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth',
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    locale: 'fr',
                    navLinks: true,
                    selectable: true,
                    editable: true,
                    events: [
                        { title: 'Réservation #1201 - Confirmée', start: '2025-09-20T14:00:00', color: '#198754' },
                        { title: 'Réservation #1202 - En attente', start: '2025-09-21', color: '#ffc107' },
                        { title: 'Réservation #1190 - Terminé', start: '2025-09-15', color: '#6c757d' },
                        { title: 'Nettoyage salle A', start: '2025-09-22', color: '#0dcaf0' },
                    ],
                    select: function (info) {
                        let eventName = prompt("Nom de l'événement ou réservation ?");
                        if (eventName) {
                            calendar.addEvent({
                                title: eventName,
                                start: info.start,
                                end: info.end,
                                allDay: info.allDay,
                                color: '#0dcaf0'
                            });
                        }
                        calendar.unselect();
                    }
                });

                calendar.render();
            }
        });

        function addQuickEvent() {
            let date = new Date().toISOString().split('T')[0];
            let title = prompt("Nom de l'événement ?");
            if (title) {
                let calendar = FullCalendar.getCalendar(document.getElementById('calendar'));
                calendar.addEvent({
                    title: title,
                    start: date,
                    color: '#0dcaf0'
                });
            }
        }
    </script>
</x-app-layout>
