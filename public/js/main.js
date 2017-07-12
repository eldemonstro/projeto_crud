$(document).ready(function(){
	


	$('.phone_with_ddd').mask('(00) 00000-0000');
	$('.money2').mask("#########.##", {reverse: true});



	$('#form-modal-cliente').submit(function(e){
		e.preventDefault();
		$.post('clientes', $(this).serialize());
		$('#form-modal-cliente').addClass('hidden');
		$('.mensagem').removeClass('hidden');	
		$('.btn-dismiss').click(function(){
			$('#form-modal-cliente').trigger("reset");
			$('#form-modal-cliente').removeClass('hidden');
			$('.mensagem').addClass('hidden');

		});

	});



	$('#form-modal-produto').submit(function(e){
		e.preventDefault();
		$.post('produtos', $(this).serialize());
		$('#form-modal-produto').addClass('hidden');
		$('.mensagem').removeClass('hidden');	

		$('.btn-dismiss').click(function(){
			$('#form-modal-produto').trigger("reset");
			$('#form-modal-produto').removeClass('hidden');
			$('.mensagem').addClass('hidden');	
		});

	});

	$('#form-modal-pedido').submit(function(e){
		e.preventDefault();
		$.post('pedidos', $(this).serialize());
		$('#form-modal-pedido').addClass('hidden');
		$('.mensagem').removeClass('hidden');	

		$('.btn-dismiss').click(function(){

			$('#form-modal-pedido').trigger("reset");
			$('#form-modal-pedido').removeClass('hidden');
			$('.mensagem').addClass('hidden');	

		});

	});




});