<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<!-- CSS bootstrap -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	</head>

	<body>
		
		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="send_email.php" method="post">
							<div class="form-group mt-3">
								<label for="para">Para</label>
								<input name="para" type="text" class="form-control" id="para" placeholder="ex: dougoliveira564@gmail.com">
							</div>

							<div class="form-group mt-3">
								<label for="assunto">Assunto</label>
								<input name="assunto" type="text" class="form-control" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group mt-3">
								<label for="mensagem">Mensagem</label>
								<textarea name="mensagem" class="form-control" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg mt-3" onclick="enviarEmail()">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>


      	<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#modalDespesa" style="display:none"></button>

    	<div class="modal fade" id="modalDespesa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      		<div class="modal-dialog">
        		<div class="modal-content">
          			<div id="modalContainer">
            			<h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
            			<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          			</div>
          			<div class="modal-body">
            			<p id="modalTextBody"></p>
          			</div>
          			<div class="modal-footer">
            			<button type="button" class="btn btn-primary" id="btnClose" data-bs-dismiss="modal"></button>  
          			</div>
        		</div>
      		</div>
    	</div>

     <!-- JavaScript Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<script src="JS/modal.js"></script>
	<script src="JS/jquery.min.js"></script>
	</body>
</html>