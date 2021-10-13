<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    * {
      box-sizing: border-box;
    }

    body {
      background-color: green;
    }

    #regForm {
      background-color: rgb(21, 133, 54);
      margin: 18px auto;
      font-family: Raleway;
      padding: 30px;
      width: 70%;
      min-width: 300px;
      color: #fff;
    }

    h1 {
      text-align: center;  
    }

    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
      box-sizing: border-box;
      /* background:  green;
      color: #fff; */
    }

    #form input:focus, #form textarea:focus{
        box-shadow: none;
        border: 1px solid #00ffe0;
        transition: 1.5s ease-in;
        font-size: 16px;
        color: #fff;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: hsl(0, 82%, 58%);
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }

    button:hover {
      opacity: 0.8;
    }

    #prevBtn {
      background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    .step.active {
      opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }

    a{
      color: #fff;
    }

    div a{
      padding-right: 15px;
      text-decoration: none;
      text-transform: none;
    }

    div a:hover{
      color: green;
      text-decoration: none;
      text-transform: none;
    }

    .nav-bar{
      background-color: rgb(21, 133, 54);
      margin-top: -8000;
      padding: 8px;
      color: #fff;
      text-align: right;
      padding-right: 40px;
      font-weight: bold;
      height: 40px;
    }
    .logout{
    text-align:left;
    /* margin-left: 30px; */
    /* margin-top: 14px; */
    background:hsl(155, 79%, 49%); 
    height: 20px;

}

</style>
<body>
  
<div class="container-fluid nav-bar">

    <div class="row ">
        <div class="nav-bar"><a href="{{route('marcar_consulta')}}">Marcar</a> | <a href="#">Cancelar</a> | <a href="">Remarcar </a>| <a href="#">Historico</a></div>
    </div>
</div>

<class class="container-fluid">
    <div class="row">    
        <div class="logout">{{session('usuario')['usuario']}} | <a href="{{route('logout')}}" class="logout">Logout</a></div>
    </div>

</class>
   
 <form id="regForm"  action="{{route('consulta_submit')}}" method="post">
 @csrf
  <h3 style="text-align:center">Marcação de Consultas Online</h3>
  <!-- One "tab" for each step in the form: -->
  <div class="tab">Informacao do Paciente:
    <p><input type="text" placeholder="Nome do Paciente..." oninput="this.className = ''" name="nome"></p>
    <p><input type="text" placeholder="Apelido do Paciente..." oninput="this.className = ''" name="apelido"></p>
    <p><input type="number" placeholder="Idade do Paciente..." oninput="this.className = ''" name="idade"></p>
   
  </div>
  <div class="tab">Informacao do Paciente:
    <p><input type="text" placeholder="Morada do Paciente..." oninput="this.className = ''" name="morada"></p>
    <!-- <p>Pronvincia: <select  oninput="this.className = ''" name="unidade">
        <option value="">Selecione a Unidade</option>
        <option value="Maputo">Maputo</option>
        <option value="Maputo Pronvincia">Maputo Pronvincia</option>
        <option value="Gaza">Gaza</option> 
       <option value="Inhambane">Inhambane</option>
        <option value="Sofala">Sofala</option>
        <option value="Manica">Manica</option>
        <option value="Zambezia">Zambezia</option> 
        <option value="Tete">Tete</option> 
        <option value="Nampula">Nampula</option>
        <option value="Cabo Delegado">Cabo Delegado</option> 
        <option value="Niassa">Cabo Delegado</option> </select> -->
    <p><input type="number" placeholder="Contacto do Paciente..." oninput="this.className = ''" name="contacto"></p>
    <p><textarea  placeholder="Sintomas do Paciente..." name="sintomas" id="" cols="60" rows="3"></textarea></p>
  </div>
  <div class="tab">Informacao da data e hora
  <h4>Data da consulta</h4>
    <p><input type="date" oninput="this.className = ''" name="data"></p>
    <h5>Horario</h5>
    Manha(07h-12h)<input type="radio"  value="" placeholder="Phone..." oninput="this.className = ''" name="hora">
    Tarde(12h-18h)<input type="radio"  value="" placeholder="Phone..." oninput="this.className = ''" name="hora">
    Noite(18h-22h)<input type="radio"  value="" placeholder="Phone..." oninput="this.className = ''" name="hora">
    <!-- <p>22h-06h<input type="checkbox"  value="" placeholder="Phone..." oninput="this.className = ''" name="sexo"></p> -->
  </div>
  <div class="tab">Informacao da Unidade:
  <p>Unidade: <select placeholder="Unidade" oninput="this.className = ''" name="unidade" class="unidade" id="unidade">
                  <option value="0" disabled="true" selected="true">Selecione a Unidade</option>
                @foreach($dados as $dado)
                  <option value="{{$dado['id']}}">{{ucfirst($dado['unidade'])}}</option>
                @endforeach 
            </select>

           <!-- !! F::select('unidade',$dados1,null) !!-->

        </p>
    <p>Especialidade: <select placeholder="Especialidade" oninput="this.className = ''" name="especialidade" id="especialidade">
                 <option value="" disabled select>Selecione a Especialidade</option>
               @foreach($especialidades as $dado)
                  <option value="{{$dado['id']}}">{{$dado['especialidade']}}</option>
                @endforeach 

            </select>
        </p>
    <p>Medicos Diponiveis: <select placeholder="Medico" oninput="this.className = ''" name="nn">
              <option value="">Selecione o Medico</option>
              @foreach($medicos as $dado)
                  <option value="{{$dado['nome']}}">{{$dado['nome']}}</option>
                @endforeach 

            </select>
        </p>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js">
    src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js">
</script>

<script>

// $(document).ready(function(){
//   console.log('hum its change')
//       // $(document).on('change', '.unidade', function(){
//       //     console.log('hum its change');
//       // });
//    });

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab



function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      // valid = false;
      valid = true;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
<!-- <script>
  $(document).redy(function(){
  $('#unidade').on(`change`, function(){
    let id =$($this).val();
    $('#especialidade').empty();
    $('#especialidade').append(`<option value="0" disabled select>Selecione a Unidade</option>`);
    $.ajax({
        type: 'GET',
        url: '/marcar_consulta'+ id,
        success: function(response){
          var response = JSON.parse(response);
          $('#especialidade').empty();
          $('#especialidade').append(`<option value="0" disabled select>Selecione a Especialidade</option>`);
          response.foreach(element => {
            $('#especialidade').append(`<option value="${element['id']}">${element['unidade']}</option>`);
          });
        }
    });
  });
}); -->
<!-- </script> -->


</body>
</html>
