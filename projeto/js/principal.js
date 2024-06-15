document.addEventListener('DOMContentLoaded', () => {
    const calendar = document.getElementById('calendar');
    const eventForm = document.getElementById('event-form');
    const eventDate = document.getElementById('event-date');
    const eventText = document.getElementById('event-text');
    const formTitle = document.getElementById('form-title');
    const saveEventButton = document.getElementById('save-event');
    const deleteEventButton = document.getElementById('delete-event');
    const monthSelect = document.getElementById('month-select');
    const yearSelect = document.getElementById('year-select');
    
    let events = {};
    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

    function populateMonthSelect() {
        monthNames.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index;
            option.textContent = month;
            if (index === currentMonth) {
                option.selected = true;
            }
            monthSelect.appendChild(option);
        });
    }

    function populateYearSelect() {
        const currentYear = new Date().getFullYear();
        for (let i = currentYear - 10; i <= currentYear + 10; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i;
            if (i === currentYear) {
                option.selected = true;
            }
            yearSelect.appendChild(option);
        }
    }

    function renderCalendar(month, year) {
        calendar.innerHTML = '';
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        const startDay = new Date(year, month, 1).getDay();

        const dayNames = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];

        for (let dayName of dayNames) {
            const dayDiv = document.createElement('div');
            dayDiv.classList.add('header');
            dayDiv.textContent = dayName;
            calendar.appendChild(dayDiv);
        }

        for (let i = 0; i < startDay; i++) {
            const emptyDiv = document.createElement('div');
            calendar.appendChild(emptyDiv);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayDiv = document.createElement('div');
            dayDiv.textContent = day;
            dayDiv.addEventListener('click', () => showEventForm(day, month, year));
            if (events[`${day}-${month}-${year}`]) {
                dayDiv.style.backgroundColor = '#a0e0a0';
            }
            calendar.appendChild(dayDiv);
        }
    }

    function showEventForm(day, month, year) {
        eventDate.value = `${day}-${month}-${year}`;
        eventText.value = events[eventDate.value] || '';
        formTitle.textContent = events[eventDate.value] ? 'Editar Compromisso' : 'Adicionar Compromisso';
        eventForm.classList.remove('hidden');
    }

    saveEventButton.addEventListener('click', () => {
        events[eventDate.value] = eventText.value;
        eventForm.classList.add('hidden');
        renderCalendar(currentMonth, currentYear);
    });

    deleteEventButton.addEventListener('click', () => {
        delete events[eventDate.value];
        eventForm.classList.add('hidden');
        renderCalendar(currentMonth, currentYear);
    });

    monthSelect.addEventListener('change', () => {
        currentMonth = parseInt(monthSelect.value);
        renderCalendar(currentMonth, currentYear);
    });

    yearSelect.addEventListener('change', () => {
        currentYear = parseInt(yearSelect.value);
        renderCalendar(currentMonth, currentYear);
    });

    populateMonthSelect();
    populateYearSelect();
    renderCalendar(currentMonth, currentYear);
});