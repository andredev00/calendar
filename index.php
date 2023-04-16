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

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-group">
                      <label>Nome do Paciente</label>
                      <input type="text" id="nomePaciente" placeholder="Nome paciente">
                    </div>
                    <div class="form-group">
                      <label>Número de telemóvel</label>
                      <input type="text" class="form-control" id="nTelemovel" placeholder="Nº Telemovel">
                    </div>
                    <div class="form-group">
                      <label>Data da Consulta</label>
                      <input type="data" class="form-control" id="comecoConsulta" placeholder="Data da Consulta">
                    </div>
                    <div class="form-group">
                      <label>Descrição</label>
                      <input type="data" class="form-control" id="descricao" placeholder="Descrição">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button onclick="submit()"type="submit" class="btn btn-primary" id="deleteButton">Submit</button>
                </div>
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