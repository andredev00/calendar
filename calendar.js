$(document).ready(function () {
  var calendar = $("#calendar").fullCalendar({
    editable: true,
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay",
    },
    events: "load.php",
    selectable: true,
    selectHelper: true,
    select: function (start, end, allDay) {
      var title = prompt("Enter Event Title");
      start = prompt("Introduza a data de começo da consulta:");
      end = prompt("Introduza a data de fim da consulta:");
      var nTelemovel = prompt("Introduza o numero de telemovel do paciente:");
      var content = prompt("Adicione uma breve descrição sobre a consulta:");
      if (title) {
        var start = moment(start, "YYYY-MM-DD HH:mm:ss").format(
          "YYYY-MM-DD HH:mm:ss"
        );
        var end = moment(end, "YYYY-MM-DD HH:mm:ss").format(
          "YYYY-MM-DD HH:mm:ss"
        );
        $.ajax({
          url: "insert.php",
          type: "POST",
          data: {
            title: title,
            start: start,
            end: end,
            nTelemovel: nTelemovel,
            content: content,
          },
          success: function () {
            calendar.fullCalendar("refetchEvents");
            alert("Added Successfully");
          },
        });
      }
    },
    editable: true,
    eventResize: function (event) {
      var start = moment(start, "YYYY-MM-DD HH:mm:ss").format(
        "YYYY-MM-DD HH:mm:ss"
      );
      var end = moment(end, "YYYY-MM-DD HH:mm:ss").format(
        "YYYY-MM-DD HH:mm:ss"
      );
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar("refetchEvents");
          alert("Event Update");
        },
      });
    },

    eventDrop: function (event) {
      alert(event.start);
      var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
      var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
      var title = event.title;
      var id = event.id;
      $.ajax({
        url: "update.php",
        type: "POST",
        data: { title: title, start: start, end: end, id: id },
        success: function () {
          calendar.fullCalendar("refetchEvents");
          alert("Event Updated");
        },
      });
    },

    eventClick: function (event) {
      $("#title").html(event.title);
      $("#modalWhen").text(event.start_event);
      $("#eventID").val(event.id);
      $("#calendarModal").modal();
    },

    eventRender: function (eventObj, $el) {
      console.log(eventObj.start);
      $el.popover({
        title: eventObj.title,
        content:
          moment(eventObj.start).format("YYYY-MM-DD HH:mm") +
          "Nº telemovel: " +
          eventObj.telemovel,
        trigger: "hover",
        placement: "top",
        container: "body",
      });
    },
  });
});

function teste() {
  if (confirm("Are you sure you want to remove it?")) {
    var id = event.id;
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: { id: id },
      success: function () {
        calendar.fullCalendar("refetchEvents");
        alert("Event Removed");
      },
    });
  }
}
