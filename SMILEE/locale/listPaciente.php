<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Meta tags Obrigatórias -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	    <!-- Font Awesome -->
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	    <!-- Estilo customizado -->
	    <link rel="stylesheet" type="text/css" href="_css/estilo.css">

	    <title>Smile Odonto</title>
	</head>
	<body>
		<div class="geral">
			<!--Início do Navbar-->
		  <?php include_once("_incluir/navbar.php")  ?>
		<!--Fim do Navbar-->

		<!--Início do Conteúdo-->
		<section>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3">
						<?php
							if (isset($_GET['codigo'])) {
								include_once("_incluir/menu.php");
							}else{
						?>
						<div class="menu-lateral">
							<div class="cabecalho">
								<h3>Cadastrar Pacientes</h3>
							</div>
							<div class="corpo-menu">
								<img src="img/foto.png">
								<p>Nenhum paciente selecionado.</p>
								<hr class="hr-menu">
								<div class="botoes">
									<a href="cadPaciente.php" name="cadastrar" class="btn btn-azul text-white">Novo Paciente</a><br>
									<a href="listPaciente.php" name="localizar" class="btn btn-verde text-white">Localizar Paciente</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>

					<div class="col-lg-9">
						<div class="conteudo">
							<div class="cabecalho-conteudo">
								<img src="img/pac.png">
								<h3>Pacientes</h3>
							</div>

							<div class="form-group col-md-6 busca">
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Buscar..." name="buscaPaciente">
										<div class="input-group-append">
										    <button class="btn btn-verde" type="button">
										    	<i class="fas fa-search text-white"></i>
											</button>
										</div>
									</div>
							</div>
							<form action="listPaciente.php" method="GET">
								<div class="table-responsive">
											<table class="table">
												<thead>
													<tr>
														<td></td>
														<td>Nome</td>
														<td>CPF</td>
														<td>Telefone</td>
														<td>Ações</td>
													</tr>
												</thead>
												<tbody>
													<tr class="conteudo-listagem">
														<td>
															<a href="listPaciente.php?codigo=1" class="btn btn-outline-light btn-custom">
																<span>
																	<i class="fas fa-check"></i>
																</span>
															</a>
														</td>
														<td>Maria Eduarda Leal Silva</td>
														<td>147.543.123-60</td>
														<td>(37) 9 9958-1386</td>
														<td>
															<a name="editar" href="editPaciente.php" class="btn btn-editar text-white">Editar</a>
															<a href="apagarPaciente.php" name="excluir" class="btn btn-excluir text-white">Excluir</a>
														</td>
													</tr>
												</tbody>
												<tbody>
													<tr class="conteudo-listagem2">
														<td>
															<a href="listPaciente.php?codigo=2" class="btn btn-outline-light btn-custom">
																<span>
																	<i class="fas fa-check"></i>
																</span>
															</a>
														</td>
														<td>Danielle Leal Silva</td>
														<td>147.543.123-60</td>
														<td>(37) 9 9958-1386</td>
														<td>
															<a name="editar" href="editPaciente.php" class="btn btn-editar text-white">Editar</a>
															<a href="apagarPaciente.php" name="excluir" class="btn btn-excluir text-white">Excluir</a>
														</td>
													</tr>
												</tbody>
												<tbody>
													<tr class="conteudo-listagem">
														<td>
															<a href="listPaciente.php?codigo=3" class="btn btn-outline-light btn-custom">
																<span>
																	<i class="fas fa-check"></i>
																</span>
															</a>
														</td>
														<td>Ana Silva</td>
														<td>147.543.123-60</td>
														<td>(37) 9 9958-1386</td>
														<td>
															<a name="editar" href="editPaciente.php" class="btn btn-editar text-white">Editar</a>
															<a href="apagarPaciente.php" name="excluir" class="btn btn-excluir text-white">Excluir</a>
														</td>
													</tr>
												</tbody>
											</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--Fim do Conteúdo-->

		<!--Início do Rodapé-->
		<?php include_once("_incluir/footer.php") ?>
		<!--Fim do Rodapé-->
		</div>
		

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
</html>