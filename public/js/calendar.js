document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      locale: 'ja',
      height: 'auto',
      firstDay: 1,
      headerToolbar: {
          left: "dayGridMonth,listMonth",
          center: "title",
          right: "today prev,next"
      },
      buttonText: {
          today: '今月',
          month: '月',
          list: 'リスト'
      },
      noEventsContent: 'スケジュールはありません',
      events: [
          {
              title: 'サンプルイベント',
              start: '2025-01-14T10:00:00',
              end: '2025-01-14T12:00:00',
              description: 'このイベントはサンプルです。',
              location: 'サンプル会場'
          },
          {
              title: '別のイベント',
              start: '2025-01-15T14:00:00',
              end: '2025-01-15T16:00:00'
          }
      ]
  });
  calendar.render();
});
