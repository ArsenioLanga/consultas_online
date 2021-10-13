<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Mail;

use App\Mail\EmailTeste;


// Route::get('/', 'main@teste')->name('teste');

Route::get('', 'Main@index')->name('index');  

Route::get('findUnidadeName', 'Main@findUnidadeName')->name('findUnidadeName');

Route::post('findmedicoName', 'Main@findmedicoName')->name('findmedicoName'); 

Route::get('/login', 'Main@login')->name('login'); 

Route::get('/historico/{email}', 'Main@historico')->name('historico'); 

Route::get('/confirmacao_consulta', 'Main@confirmacao_consulta')->name('confirmacao_consulta'); 

Route::get('/confirmacao_remarcar_consulta', 'Main@confirmacao_remarcar_consulta')->name('confirmacao_remarcar_consulta'); 

// //  tratar a submissao do formular iocriar_conta_submit
Route::post('/login_submit', 'Main@login_submit')->name('login_submit');

Route::post('/criar_conta_submit', 'Main@criar_conta_submit')->name('criar_conta_submit');

// //  tratar a submissao do formulario  
Route::post('/consulta_submit', 'Main@consulta_submit')->name('consulta_submit');

Route::post('/remarcar_submit', 'Main@remarcar_submit')->name('remarcar_submit');  

Route::get('/marcar_consulta', 'Main@marcar_consulta')->name('marcar_consulta');

Route::get('/crud_consultas', 'Main@crud_consultas')->name('crud_consultas');

Route::get('/crud_unidades', 'Main@crud_unidades')->name('crud_unidades');

Route::get('/crud_especialidades', 'Main@crud_especialidades')->name('crud_especialidades');

Route::get('/crud_medicos', 'Main@crud_medicos')->name('crud_medicos');

Route::get('/crud_usuarios', 'Main@crud_usuarios')->name('crud_usuarios');

Route::get('/useradd', 'Main@useradd')->name('useradd'); 

Route::get('/medico/{email}', 'Main@medico')->name('medico');  

Route::get('/gestor', 'Main@gestor')->name('gestor'); 

Route::get('/cancelar_edit/{id}', 'Main@cancelar_edit')->name('cancelar_edit');

Route::get('/marcar_atendidas/{id}', 'Main@marcar_atendidas')->name('marcar_atendidas');

Route::get('/consulta_edit/{id}', 'Main@consulta_edit')->name('consulta_edit');

Route::get('/medico-canceladas/{email}', 'Main@medico_canceladas')->name('medico-canceladas'); 

Route::get('/medico-atendidas/{email}', 'Main@medico_atendidas')->name('medico-atendidas'); 

Route::get('/logout', 'Main@logout')->name('logout');



// Route::get('/addconsulta', 'Main@addconsulta')->name('addconsulta');

// //  Route::get('/a', function(){
// //     echo config('constantes.VERSAO');
// //     echo '<br>';
// //     echo config('constantes.NOME');
// //  });

// Route::get('/email', function(){

//    $nome = 'Larson Langa';

//    // Mail::to('arsenio.s.langa@uem.ac.mz')->send(new EmailTeste($nome));
//    Mail::to('arsenio.s.langa@uem.ac.mz')->send(new EmailTeste());
//    echo "Email enviado";
// });

