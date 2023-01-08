<?php

include('vendor/autoload.php');

if (isset($_GET["go"])) {
	Classes::paginacao($_GET["go"]);
} else {

?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Teste Care</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Construction Html5 Template">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
		<link rel="stylesheet" href="view/plugins/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="view/plugins/fontawesome/css/all.min.css">
		<link rel="stylesheet" href="view/css/template.css">
		<script src="view/js/script.js"></script>

	</head>

	<body>

		<div class="body-inner">
			<header id="header" class="header-one">
				<div class="site-navigation ">
					<div class="container">
						<div class="row ">
							<div class="col-lg-12">
								<nav class="navbar navbar-expand-lg navbar-dark p-0">
									<div id="navbar-collapse" class="collapse navbar-collapse">
										<ul class="nav navbar-nav mr-auto">
											<li class="nav-item">
												<a href="#" class="nav-link" onclick="loading('?go=registros', 'conteudo_mostrar');">Registros Nota Fiscal</a>
											</li>

											<li class="nav-item">
												<a href="#" class="nav-link" onclick="loading('?go=enviar', 'conteudo_mostrar');">Enviar Nota Fiscal</a>
											</li>
										</ul>
									</div>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</header>


			<div class="conteudo_mostrar" id="conteudo_mostrar">
				<script>
					loading('?go=registros', 'conteudo_mostrar')
				</script>
			</div>

			
			<footer id="footer" class="footer bg-overlay" >
				<div class="copyright">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-md-6">
								<div class="copyright-info text-center text-md-left">
									<span>Copyright &copy;
										<script>
											document.write(new Date().getFullYear())
										</script>, Adaptação by GrMoura
									</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-menu text-center text-md-right">
								</div>
							</div>
						</div>

						<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
							<button class="btn btn-primaryNew" title="Back to Top">
								<i class="fa fa-angle-double-up"></i>
							</button>
						</div>

					</div>
				</div>
			</footer>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"> </script>
	

	</body>

	</html>
<?php } ?>