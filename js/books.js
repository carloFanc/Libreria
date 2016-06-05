$('#bottone').click(function(event) {
	
	var anno=0;
	if($('input[name=Anno]').val()!="")
		anno=$('input[name=Anno]').val();
	
	var postForm = {

		'Tit' : $('input[name=Titolo]').val(),
		'An' : anno,
		'Edit' : $('input[name=Editore]').val(),
		'Col' : $('input[name=Collana]').val()
	};

	$.ajax({

		type : 'POST',
		url : '/Libreria/functions/books.php',
		data : postForm,
		dataType : 'json',
		success : function(data) {
			var html = '<table id="list" class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' + '<thead class="personale">' + '<tr>' + ' <th>Autore</th>' + '<th>Eta</th>' + '  <th>Nickname</th>' + ' <th>ID</th>' + ' <th> </th> ' + '</tr>' + '</thead>' + '<tbody>';

			for (var tracklist in data) {
				html = html + ' <tr> ';
				html = html + ' <td class="col-md-2">' + data[tracklist].Nome + ' '+ data[tracklist].Cognome +' </td> ';
				html = html + ' <td class="col-md-2">' + data[tracklist].Eta + ' </td> ';
				html = html + ' <td class="col-md-2">' + data[tracklist].Nickname + ' </td> ';
				html = html + ' <td class="col-md-2">' + '#'+data[tracklist].ID + ' </td> ';
				html = html + ' <td align="left" style="border: 0;" class="col-md-3"> <div class="visualizza" id="'+data[tracklist].ID+'"></div></td> ';
				html = html + ' </tr> ';
			}
			html = html + ' </tbody>  </table> <div align="center"><button id="bottoneReset" class="btn btn-primary" type="button">Azzera ricerca</button></div>  ';
			html = html + '<script>$.getScript("/Libreria/js/autori.js", function(){});</script>';
			
			
			
			$('#tabella').html(html);

		}
	});
});

