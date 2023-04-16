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
      $("#successModal").modal();
      // var title = prompt("Enter Event Title");
      // start = prompt("Introduza a data de começo da consulta:");
      // end = prompt("Introduza a data de fim da consulta:");
      // var nTelemovel = prompt("Introduza o numero de telemovel do paciente:");
      // var content = prompt("Adicione uma breve descrição sobre a consulta:");
      // var nomePaciente = prompt("Escreva o nome do paciente");
      // if (title) {
      //   var start = moment(start, "YYYY-MM-DD HH:mm:ss").format(
      //     "YYYY-MM-DD HH:mm:ss"
      //   );
      //   var end = moment(end, "YYYY-MM-DD HH:mm:ss").format(
      //     "YYYY-MM-DD HH:mm:ss"
      //   );
      // $.ajax({
      //   url: "insert.php",
      //   type: "POST",
      //   data: {
      //     title: title,
      //     start: start,
      //     end: end,
      //     nTelemovel: nTelemovel,
      //     content: content,
      //     nomePaciente: nomePaciente,
      //   },
      //   success: function () {
      //     calendar.fullCalendar("refetchEvents");
      //     alert("Added Successfully");
      //   },
      // });
      // }
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
      $("#nomePaciente").html(event.nomePaciente);
      $("#descricao").html(event.descricao);
      $("#nTelemovel").html(event.telemovel);
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

function deleteAppointment() {
  if (confirm("Are you sure you want to remove it?")) {
    var id = document.getElementById("eventID").value;
    $.ajax({
      url: "delete.php",
      type: "POST",
      data: { id: id },
      success: function () {
        alert("Event Removed");
        window.location.reload();
      },
    });
  }
}

function saveAppointment() {
  var title = document.getElementById("tipoConsulta").value;
  var start = document.getElementById("comecoConsulta").value;
  var end = document.getElementById("fimConsulta").value;
  var nTelemovel = document.getElementById("nTelemovel").value;
  var content = document.getElementById("descricao").value;
  var nomePaciente = document.getElementById("nomePaciente").value;

  $.ajax({
    url: "insert.php",
    type: "POST",
    data: {
      title: title,
      start: start,
      end: end,
      nTelemovel: nTelemovel,
      content: content,
      nomePaciente: nomePaciente,
    },
    success: function () {
      alert("Consulta marcada com sucesso");
      window.location.reload();
    },
  });
}
