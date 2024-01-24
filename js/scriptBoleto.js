$(document).ready(function(e) {
	$('.classModal').click(function(){
	    var id      = 	$(this).attr('id');
	    var acao    = 	$(this).attr('acao');
	    var origem 	=	$(this).attr('origem');
	    $.ajax({
	        type: 'POST',
	        url: $(this).attr('url'),
	        data: {'id' : id, 'acao': acao, 'origem' : origem},
	        success: function(response) {
	            $('#modal-corpo').html(response);
	        }
	    });
	});

	$('#myModal').on('shown.bs.modal', function () {
		$(this).find('.modal-dialog').css({
			width	:	'auto',
			height	:	'auto',
			'max-width':'90%'
		});
	});

	$('#pbEnviar').click(function(){
		var formData = $('#frmBoleto').serialize(); 	
		$.ajax({
			type		:	'POST',
			url			: 	'./php/pesquisarBoleto.php',
			data		:	formData,
			dataType	: 	'html',
			success		:	function(json){
				
				$('#msg').html(json);

			}

		});
	});

	$('#dfnCpf').mask('000.000.000-00', {
		onKeyPress : function(dfnCpf, e, field, options) {
		  const masks = ['000.000.000-000', '00.000.000/0000-00'];
		  const mask = (dfnCpf.length > 14) ? masks[1] : masks[0];
		  $('#dfnCpf').mask(mask, options);
		}
	});
});