<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- DATATABLE -->
<script src="js/data-table/datatables.min.js"></script>
<script src="js/data-table/dataTables.bootstrap.min.js"></script>
<script src="js/data-table/dataTables.buttons.min.js"></script>
<script src="js/data-table/buttons.bootstrap.min.js"></script>
<script src="js/data-table/jszip.min.js"></script>
<script src="js/data-table/vfs_fonts.js"></script>
<script src="js/data-table/buttons.html5.min.js"></script>
<script src="js/data-table/buttons.print.min.js"></script>
<script src="js/data-table/buttons.colVis.min.js"></script>
<script src="js/data-table/datatables-init.js"></script>
<script>
	$(document).ready( function () {
		$('#tabela_proprietarios').DataTable(
		{
			"language": {
				"lengthMenu": "Mostrando _MENU_ registros por página",
				"zeroRecords": "Nada encontrado",
				"info": "Mostrando página _PAGE_ de _PAGES_",
				"infoEmpty": "Nenhum registro disponível",
				"infoFiltered": "(filtrado de _MAX_ registros no total)"
			}
		}
		);
	} );

	function enviarIdProprietario(id){
		$('#id_proprietario').val(id);
		$('#form_enviar_id').submit();
	}

	function enviarIdImovel(id){
		$('#id_imovel').val(id);
		$('#form_enviar_id').submit();
	}

	function attInformacoes(){
		$('#btn_att_informacoes').prop('disabled', false);
	}

	function deleteProprietario(){
		if (confirm('Deletar proprietário?')) {
			$('#form_deletar').submit();
		}
	}

	function deleteImovel(){
		if (confirm('Deletar imóvel?')) {
			$('#form_deletar').submit();
		}
	}
</script>

<?php session_destroy(); ?>
</body>
</html>