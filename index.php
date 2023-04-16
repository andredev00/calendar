<?php
//index.php

?>
<!DOCTYPE html>
<html>
 <head>
  <!-- <title>Jquery Fullcalandar Integration with PHP and Mysql</title> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://momentjs.com/downloads/moment.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js'></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.16.0/moment.min.js"></script>
  <script src='calendar.js'></script>
  <link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
 </head>
 <body>
  <br />
    <br />
    <div class="container">
    <div id="calendar"></div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header text-center">
              <h4 class="modal-title w-100 font-weight-bold">Marcação de consulta</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body mx-3">
              <div class="md-form mb-5">
                <i class="fas fa-user prefix grey-text"></i>
                <input type="text" id="nomePaciente" class="form-control validate">
                <label data-error="wrong" data-success="right" for="form34">Nome Paciente</label>
              </div>

              <div class="md-form mb-5">
                <i class="fas fa-envelope prefix grey-text"></i>
                <input type="email" id="nTelemovel" class="form-control validate">
                <label data-error="wrong" data-success="right" for="form29">Nº Telemóvel do Paciente</label>
              </div>

              <div class="md-form mb-5">
                <i class="fas fa-tag prefix grey-text"></i>
                <input class="form-control validate" type="datetime-local" id="dataConsulta">
                <label data-error="wrong" data-success="right" for="form32">Dia e hora da consulta</label>
              </div>

              <div class="md-form">
                <i class="fas fa-pencil prefix grey-text"></i>
                <textarea type="text" id="descricao" class="md-textarea form-control" rows="4"></textarea>
                <label data-error="wrong" data-success="right" for="form8">Breve descrição da consulta</label>
              </div>

            </div>
            <div class="modal-footer d-flex justify-content-center">
              <button onclick="saveAppointment()" class="btn btn-unique">Marcar<i class="fas fa-paper-plane-o ml-1"></i></button>
            </div>
          </div>
        </div>
      </div>


    <div id="calendarModal" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Detalhes da consulta</h4>
              </div>
              <div id="modalBody" class="modal-body">
              <h4 id="title" class="modal-title"></h4>
              <p>Breve descrição sobre a consulta e o paciente: </p>
              <p id="descricao"></p>
              <p>Nº Telemóvel: </p>
              <p id="nTelemovel"></p>
              <div id="modalWhen" style="margin-top:5px;"></div>
              </div>
              <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                  <button onclick="deleteAppointment()"type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
              </div>
              <p id="eventID"></p>
          </div>
        </div>
    </div>
  </body>
</html>