<?php

	require_once("../../SMILEODONTO_PRIVATE/conexao.php");

	//Receber a requisão da pesquisa 
	$requestData= $_REQUEST;

	//Indice da coluna na tabela visualizar resultado => nome da coluna no banco de dados
	$columns = array(
	    0 => 'idPaciente',
	    1 => 'idDentista',
	    2 => 'idSituacao',
	    3 => 'data',
	    4 => 'horarioInicio',
	    5 => 'idAgendamento'
	);

	//Obtendo registros de número total sem qualquer pesquisa
	$result_agenda = "SELECT distinct a.idAgendamento, a.title, p.nome, a.data, a.horarioInicio, a.horarioFim, s.situacao FROM pessoa p, agendamento a, situacao s WHERE s.idSituacao = a.idSituacao AND a.idDentista = p.idPessoa ";
	$resultado_agenda =mysqli_query($conecta, $result_agenda);
	$qnt_linhas = mysqli_num_rows($resultado_agenda);


	//Obter os dados a serem apresentados
	$result_agendas = "SELECT distinct a.idAgendamento, a.title, p.nome, a.data, a.horarioInicio, a.horarioFim, s.situacao FROM pessoa p, agendamento a, situacao s WHERE s.idSituacao = a.idSituacao AND a.idDentista = p.idPessoa ";
	if( !empty($requestData['search']['value']) ) {   // se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
		$result_agendas.=" AND ( a.title LIKE '".$requestData['search']['value']."%' ";    
		$result_agendas.=" OR p.nome LIKE '".$requestData['search']['value']."%' ";
		$result_agendas.=" OR a.data LIKE '".$requestData['search']['value']."%' ";
		$result_agendas.=" OR s.situacao LIKE '".$requestData['search']['value']."%' ";
		$result_agendas.=" OR a.horarioFim LIKE '".$requestData['search']['value']."%' ";
		$result_agendas.=" OR a.horarioInicio LIKE '".$requestData['search']['value']."%' ) ";
	}
	
	$resultado_agendas=mysqli_query($conecta, $result_agendas);
	$totalFiltered = mysqli_num_rows($resultado_agendas);
		//Ordenar o resultado
	$result_agendas.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$resultado_agendas=mysqli_query($conecta, $result_agendas);


	// Ler e criar o array de dados
	$dados = array();
	while( $row_agenda =mysqli_fetch_array($resultado_agendas) ) {

		$dataAgenda = $row_agenda['data'];
		$data = implode("/",array_reverse(explode("-",$dataAgenda)));

		$dado = array(); 
		$dado[] = $row_agenda["title"];
		$dado[] = $row_agenda["nome"];
		$dado[] = $row_agenda["situacao"];
		$dado[] = $data;
		$dado[] = $row_agenda["horarioInicio"] . ' às ' . $row_agenda["horarioFim"] ;	
		$dado[] = '<button type="submit" name="editar" class="btn btn-editar text-white mr-2" value="'.$row_agenda["idAgendamento"].'">Editar</button>'.'<button type="button" name="excluir" id="excluir" class="btn btn-excluir text-white" value="'.$row_agenda["idAgendamento"].'" >Excluir</button>';
		$dados[] = $dado;
	}

	//Cria o array de informações a serem retornadas para o Javascript
	$json_data = array(
		"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
		"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
		"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
		"data" => $dados
	    //Array de dados completo dos dados retornados da tabela 
	);

	echo json_encode($json_data);  //enviar dados como formato json

?>