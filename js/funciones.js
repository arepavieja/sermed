function alerta(capa,tipo,msj) {
	$(capa).fadeIn().html('<div class="alert alert-'+tipo+'"><button class="close" data-dismiss="alert" type="button"><i class="icon-remove"></i></button>'+msj+'</div>');
}

function load(url,datos,capa) {
	$.post(url,datos,function(data){
		$(capa).fadeIn().html(data);
	})
}

function modal(url,datos) {
	$.post(url,datos,function(data){
		$('.modal').modal('show');
		$('.modal .modal-dialog .modal-content').html(data);
	})
}

function alerta(capa,tipo,data) {
	$(capa).html('<div class="alert alert-'+tipo+'"><button class="close" data-dismiss="alert" type="button"><i class="icon-remove"></i></button> '+data+'</div>')
}