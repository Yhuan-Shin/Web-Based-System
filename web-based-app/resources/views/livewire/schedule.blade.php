<div>
    {{-- Stop trying to control. --}}
    <div class="modal fade" id="scheduleModal" wire:ignore.self tabindex="-1" aria-labelledby="scheduleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModalLabel">Schedule</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="calendar"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar;
            var isCalendarInitialized = false;

            // Initialize calendar when modal is shown
            $('#scheduleModal').on('shown.bs.modal', function () {
                if (!isCalendarInitialized) {
                    calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        height: 500,
                        events: [
                            { title: 'Event 1', start: '2024-11-05' },
                            { title: 'Event 2', start: '2024-11-06', end: '2024-11-07' }
                        ]
                    });
                    calendar.render();
                    isCalendarInitialized = true; // Prevent re-initializing
                } else {
                    calendar.render(); // Re-render calendar in case it needs to adjust layout
                }
            });
        });
    </script>

    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js'></script>
</div>
