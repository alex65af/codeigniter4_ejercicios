<!DOCTYPE html>
<html lang="en">

<head>
   <title>CodeIgniter Project Manager</title>
   <meta charset="utf-8">
   <meta name="app-url" content="<?php echo base_url('/'); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
   <div class="container">
      <h2 class="text-center mt-5 mb-3">CodeIgniter Project Manager</h2>
      <div class="card">
         <div class="card-header">
            <button class="btn btn-outline-primary" onclick="createPersona()">
               Create New Project
            </button>
         </div>
         <div class="card-body">
            <div id="alert-div">

            </div>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Name</th>
                     <th>Image</th>
                     <th>Correo</th>
                     <th>Telefono</th>
                     <th>Estado Civil</th>
                     <th>Hijos</th>
                     <th>Intereses</th>
                     <th width="240px">Action</th>
                  </tr>
               </thead>
               <tbody id="projects-table-body">
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <!-- modal for creating and editing function -->
   <div class="modal" tabindex="-1" id="form-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Project Form</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div id="error-div"></div>
               <form>
                  <input type="hidden" name="update_id" id="update_id">
                  <div class="form-group">
                     <label for="nombre">Name</label>
                     <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>
                  <div class="form-group">
                     <label for="image">FotoPerfil</label>
                     <input type="file" class="form-control" id="image" name="image">
                  </div>
                  <div class="form-group">
                     <label for="correo">Correo</label>
                     <input type="text" class="form-control" id="correo" name="correo">
                  </div>
                  <div class="form-group">
                     <label for="telefono">Telefono</label>
                     <input type="text" class="form-control" id="telefono" name="telefono">
                  </div>
                  <div class="form-group">
                     <label for="estado_civil">Estado Civil</label>
                     <select class="form-control" name="estado_civil" id="estado_civil">
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADO">CASADO</option>
                        <option value="OTRO">OTRO</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="hijos">¿Tiene hijos?</label>
                     <div class="col-sm-10">
                        <input type="radio" id="hijos" name="hijos" value="1" checked>SI
                        <input type="radio" id="hijos" name="hijos" value="0">NO
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="intereses">Intereses</label>
                     <div class="col-sm-10">
                        <input type="checkbox" id="intereses" name="intereses" value="Libros"> Libros
                        <input type="checkbox" id="intereses" name="intereses" value="Musica"> Música
                        <input type="checkbox" id="intereses" name="intereses" value="Deportes"> Deportes
                        <input type="checkbox" id="intereses" name="intereses" value="Otros"> Otros
                     </div>
                  </div>
                  <button type="submit" class="btn btn-outline-primary mt-3" id="save-project-btn">Save Project</button>
               </form>
            </div>
         </div>
      </div>
   </div>


   <!-- view record modal -->
   <div class="modal" tabindex="-1" id="view-modal">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title">Persona Information</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div id="image-info"></div>
               <b>Nombre:</b>
               <p id="nombre-info"></p>
               <b>Correo:</b>
               <p id="correo-info"></p>
               <b>Telefono:</b>
               <p id="telefono-info"></p>
               <b>Estado Civil:</b>
               <p id="estado_civil-info"></p>
               <b>Hijos:</b>
               <p id="hijos-info"></p>
               <b>Intereses:</b>
               <p id="intereses-info"></p>
            </div>
         </div>
      </div>
   </div>

   <script type="text/javascript">
      showAllProjects();
      /*
          This function will get all the project records
      */
      function showAllProjects() {
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/";
         $.ajax({
            url: url,
            method: "GET",
            success: function(response) {
               $("#projects-table-body").html("");
               let projects = response;
               for (var i = 0; i < projects.length; i++) {
                  let showBtn = '<button ' +
                     ' class="btn btn-outline-info" ' +
                     ' onclick="showPersona(' + projects[i].id + ')">Show' +
                     '</button> ';
                  let editBtn = '<button ' +
                     ' class="btn btn-outline-success" ' +
                     ' onclick="editPersona(' + projects[i].id + ')">Edit' +
                     '</button> ';
                  let deleteBtn = '<button ' +
                     ' class="btn btn-outline-danger" ' +
                     ' onclick="destroyPersona(' + projects[i].id + ')">Delete' +
                     '</button>';
                  let projectRow = '<tr>' +
                     '<td>' + projects[i].nombre + '</td>' +
                     '<td><img src="writable/uploads/1682449013_2c9e3545b4b09b76da34.jpg" /></td>' +
                     '<td>' + projects[i].correo + '</td>' +
                     '<td>' + projects[i].telefono + '</td>' +
                     '<td>' + projects[i].estado_civil + '</td>' +
                     '<td>' + projects[i].hijos + '</td>' +
                     '<td>' + projects[i].intereses + '</td>' +
                     '<td>' + showBtn + editBtn + deleteBtn + '</td>' +
                     '</tr>';
                  $("#projects-table-body").append(projectRow);
               }
            },
            error: function(response) {
               console.log(response.responseJSON)
            }
         });
      }
      /*
          check if form submitted is for creating or updating
      */
      $("#save-project-btn").click(function(event) {
         event.preventDefault();
         if ($("#update_id").val() == null || $("#update_id").val() == "") {
            storePersona();
         } else {
            updatePersona();
         }
      })
      /*
          Mostrar el modal para crear con un 
          formulario con los campos vacios     
      */
      function createPersona() {
         $("#alert-div").html("");
         $("#error-div").html("");
         $("#update_id").val("");
         $("#nombre").val("");
         $("#correo").val("");
         $("#telefono").val("");
         $("#estado_civil").val("");
         $("input:radio[value='1']").prop('checked', true);
         $(":checkbox:checked").each(function() {
            this.click();
         });
         $("#form-modal").modal('show');
      }
      /*
          submit the form and will be stored to the database
      */
      function storePersona() {
         $("#save-project-btn").prop('disabled', true);
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/create";
         var intereses = '';
         $("#intereses:checked").each(function() {
            intereses += this.value + ' ';
         });
         var data = new FormData();
         data.append('nombre', $('#nombre').val());
         data.append('image', $('#image')[0].files[0]);
         data.append('correo', $('#correo').val());
         data.append('telefono', $('#telefono').val());
         data.append('estado_civil', $('#estado_civil').val());
         data.append('hijos', $('#hijos:checked').val());
         data.append('intereses', intereses);
         $.ajax({
            url: url,
            method: "POST",
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
               $("#save-project-btn").prop('disabled', false);
               let successHtml = '<div class="alert alert-success" role="alert"><b>Project Created Successfully</b></div>';
               $("#alert-div").html(successHtml);
               $("#nombre").val("");
               $("#correo").val("");
               $("#telefono").val("");
               $("#estado_civil").val("");
               $("input:radio[value='1']").prop('checked', true);
               $(":checkbox:checked").each(function() {
                  this.click();
               });
               console.log(data);
               showAllProjects();
               $("#form-modal").modal('hide');
            },
            error: function(response) {
               /*
               show validation error
               */
               console.log(response)
               $("#save-project-btn").prop('disabled', false);
               if (typeof response.responseJSON.messages.errors !== 'undefined') {
                  let errors = response.responseJSON.messages.errors;
                  let descriptionValidation = "";
                  if (typeof errors.description !== 'undefined') {
                     descriptionValidation = '<li>' + errors.description + '</li>';
                  }
                  let nameValidation = "";
                  if (typeof errors.name !== 'undefined') {
                     nameValidation = '<li>' + errors.name + '</li>';
                  }

                  let errorHtml = '<div class="alert alert-danger" role="alert">' +
                     '<b>Validation Error!</b>' +
                     '<ul>' + nameValidation + descriptionValidation + '</ul>' +
                     '</div>';
                  $("#error-div").html(errorHtml);
               }
            }
         });
      }

      function editPersona(id) {
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/show/" + id;
         $.ajax({
            url: url,
            method: "GET",
            success: function(response) {
               let persona = response
               $("#alert-div").html("");
               $("#error-div").html("");
               $("#update_id").val(persona.id);
               $("#nombre").val(persona.nombre);
               $("#correo").val(persona.correo);
               $("#telefono").val(persona.telefono);
               $("#estado_civil").val(persona.estado_civil);
               $(':radio').each(function() {
                  if(persona.hijos===this.value){
                     $(this).prop('checked', true)
                  }
               })
               $("input:radio[value='0']").prop('checked', persona.hijos == 0 ? true : false);
               $(":checkbox").each(function() {
                  if (persona.intereses.includes(this.value)) {
                     $(this).prop('checked', true)
                  } else {
                     $(this).prop('checked', false)
                  }
               });
               $("#form-modal").modal('show');
            },
            error: function(response) {
               console.log(response.responseJSON)
            }
         });
      }

      function updatePersona() {
         $("#save-project-btn").prop('disabled', true);
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/update/" + $("#update_id").val();

         var intereses = '';
         $("#intereses:checked").each(function() {
            intereses += this.value + ' ';
         });
         // var data = new FormData();
         // data.append('id', $('#update_id').val());
         // data.append('nombre', $('#nombre').val());
         // // data.append('image', $('#image')[0].files[0]);
         // data.append('correo', $('#correo').val());
         // data.append('telefono', $('#telefono').val());
         // data.append('estado_civil', $('#estado_civil').val());
         // data.append('hijos', $('#hijos:checked').val());
         // data.append('intereses', intereses);
          let data = {
             id: $("#update_id").val(),
             nombre: $("#nombre").val(),
             correo: $("#correo").val(),
             telefono: $("#telefono").val(),
             estado_civil: $("#estado_civil").val(),
             hijos: $("#hijos:checked").val(),
             intereses: intereses
          };

         $.ajax({
            url: url,
            method: "PUT",
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function(response) {
               $("#save-project-btn").prop('disabled', false);
               let successHtml = '<div class="alert alert-success" role="alert"><b>Project Updated Successfully</b></div>';
               $("#alert-div").html(successHtml);
               $("#nombre").val("");
               $("#correo").val("");
               $("#telefono").val("");
               $("#estado_civil").val("");
               $("input:radio[value='1']").prop('checked', true);
               $(":checkbox:checked").each(function() {
                  this.click();
               });
               console.log(data);
               console.log(response);
               showAllProjects();
               $("#form-modal").modal('hide');
            },
            error: function(response) {
               console.log(response);
               $("#save-project-btn").prop('disabled', false);
               if (typeof response.responseJSON.messages.errors !== 'undefined') {
                  let errors = response.responseJSON.messages.errors;
                  let descriptionValidation = "";
                  if (typeof errors.description !== 'undefined') {
                     descriptionValidation = '<li>' + errors.description + '</li>';
                  }
                  let nameValidation = "";
                  if (typeof errors.name !== 'undefined') {
                     nameValidation = '<li>' + errors.name + '</li>';
                  }

                  let errorHtml = '<div class="alert alert-danger" role="alert">' +
                     '<b>Validation Error!</b>' +
                     '<ul>' + nameValidation + descriptionValidation + '</ul>' +
                     '</div>';
                  $("#error-div").html(errorHtml);
               }
            }
         });
      }

      function showPersona(id) {
         $("#nombre-info").html("");
         $("#image-info").html("");
         $("#correo-info").html("");
         $("#telefono-info").html("");
         $("#hijos-info").html("");
         $("#estado_civil-info").html("");
         $("#intereses-info").html("");
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/show/" + id + "";
         $.ajax({
            url: url,
            method: "GET",
            success: function(response) {
               let personas = response
               $("#nombre-info").html(personas.nombre);
               $("#image-info").html('<div id="image-example" ><img src="' + personas.image + '" alt=""></div>');
               $("#correo-info").html(personas.correo);
               $("#telefono-info").html(personas.telefono);
               $("#hijos-info").html(personas.hijos);
               $("#estado_civil-info").html(personas.estado_civil);
               $("#intereses-info").html(personas.intereses);
               $("#view-modal").modal('show');
            },
            error: function(response) {
               console.log(response.responseJSON)
            }
         });
      }

      function destroyPersona(id) {
         let url = $('meta[name=app-url]').attr("content") + "personascontroller/delete/" + id;
         $.ajax({
            url: url,
            method: "DELETE",
            success: function(response) {
               let successHtml = '<div class="alert alert-success" role="alert"><b>Project Deleted Successfully</b></div>';
               $("#alert-div").html(successHtml);
               showAllProjects();
            },
            error: function(response) {
               console.log(response.responseJSON)
            }
         });
      }
   </script>
</body>

</html>