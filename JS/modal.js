

function enviarEmail(){
	let modalContainer = document.getElementById("modalContainer");
	let modalTitle = document.getElementById("exampleModalLabel");
	let modalTextBody = document.getElementById("modalTextBody");
	let btnClose = document.getElementById("btnClose");
	let para = document.getElementById("para");
	let assunto = document.getElementById("assunto");
	let mensagem = document.getElementById("mensagem");

	function modal(){
		modalTitle.innerHTML = "Sucesso, ao enviar o e-mail";
		modalContainer.className = "modal-header text-primary";
		modalTextBody.innerHTML = "E-mail enviado com sucesso para o destinatário";
		btnClose.className = "btn btn-primary";
		btnClose.innerHTML = "Enviar mais um e-mail";
	}

	modal();
	$("#modalDespesa").modal("show");

}