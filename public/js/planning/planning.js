// planning.js
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
