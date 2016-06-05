$(document).ready(function() {
	$('.Mostra').click(function() {
		var id = $(this).attr('id');

		$.ajax({
			type : 'POST',
			url : '/Libreria/functions/getDataLibro.php',
			data : {
				ISBN : id
			},
			dataType : 'json',
			success : function(data) {
				for (var tracklist in data) {
				 
				var $textAndPic = $(' <div class="col-md-4"><img src="/Libreria/copertine/'+data[tracklist].Foto+'" '
				+'alt="foto" height="256" width="168"></div><div class="col-md-8"><h4>Titolo: '+data[tracklist].Titolo +'</h4>'
				+'<h4>Prezzo: '+data[tracklist].Prezzo +'</h4><h4>Sconto: '+data[tracklist].Sconto +'%</h4>'
				+'<h4>Info: Prezzo scontato: '+(data[tracklist].Prezzo - data[tracklist].Prezzo / 100 * data[tracklist].Sconto ).toFixed(2)  +'</h4><h4>Anno: '+data[tracklist].Anno +'</h4>'
				+'<h4>Pagine: '+data[tracklist].Pagine +'</h4><h4>Editore: '+data[tracklist].Editore +'</h4>'
				+'<h4>Collana: '+data[tracklist].Collana +'</h4><h4>ISBN: '+data[tracklist].ISBN +'</h4></div> ');
				 }
				BootstrapDialog.show({
					title : 'Info Libro',
					message : $textAndPic,
					buttons : [{
						label : 'Close',
						action : function(dialogRef) {
							dialogRef.close();
						}
					}],
				});

			}
		});

	});
}); 