$(document).ready(function() {
	$('#list').DataTable({
		
		 "columns": [
          
            { "data": "Autore" },
            { "data": "Eta" },
            { "data": "Nickname" },
            { "data": "ID" },
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
        ],
        "order": [[1, 'asc']]
	});
    // Setup - add a text input to each footer cell
   
    // DataTable
    var table = $('#list').DataTable();
    $('#list_filter').hide();
    // Apply the search
    table.columns(0).every( function () {
        var that = this;
 
        $( '#cercaAutoriAlto', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

 $('#list tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
        var cella =  table.cell( this ).index().row ;
        var valore =table.cell(cella,3).data().replace("#","");
        if ( row.child.isShown() ) {
        	
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
       $.ajax({
			type : 'POST', 
			url : '/Libreria/functions/getAllBooks.php', 
		    data: {idAutore: valore},
		    dataType : 'json',
			success : function(data) {
				if(data!=""){
					var dataTableAutore = popolaDati(data);
				 
				
				 row.child(dataTableAutore).show();
                 tr.addClass('shown');
				}else{
			     row.child('<div align="center"><h3>Nessun libro</h3></div>').show();
                 tr.addClass('shown');
				}
				
			 }
		});
            
        }
    } );
    
    
	}); 
	 

 $.fn.dataTableExt.afnFiltering.push(
    function( oSettings, aData, iDataIndex ) {
    	
    	 if ( oSettings.nTable != document.getElementById( 'list' )){
    	 	return true;
    	 }else{
    	 var iColumn = 1;
        var iMin = rangeSlider.slider("values", 0);
        var iMax = rangeSlider.slider("values", 1);
         
        var iVersion = aData[iColumn] == "-" ? 0 : aData[iColumn]*1;
        if ( iMin == "" && iMax == "" )
        {
            return true;
        }
        else if ( iMin == "" && iVersion < iMax )
        {
            return true;
        }
        else if ( iMin < iVersion && "" == iMax )
        {
            return true;
        }
        else if ( iMin < iVersion && iVersion < iMax )
        {
            return true;
        }
        return false;
    	 }
      
    }
); 

var oTable = $('#list').dataTable();

var rangeSlider = $( "#slider-range" );

var initRangeSlider =  function(){
    rangeSlider.slider({
       range: true,
       min: 1,
       max: 100,
       step: 1,
       values: [ 25, 65 ],
       slide: function( event, ui ) {
           $('#range-bottom').text(ui.values[ 0 ]);
           $('#range-top').text(ui.values[ 1 ]);
       },
       stop: function(event, ui) {
           oTable.fnDraw();
       }
    });
    
    var rangeBottom = rangeSlider.slider("values", 0);
    var rangeTop = rangeSlider.slider("values", 1);
    
    $('#range-bottom').text(rangeBottom);
    $('#range-top').text(rangeTop);

};
 
$(document).ready( function() {
        initRangeSlider();


    
});

function popolaDati(dati){
	var html = 	'<table id="libri'+dati[0].IdAutore+'" class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">'
    			 +'<thead class="personale">'
      					+'<tr>'
      				    +' <th>Titolo</th>'
      					+ '<th>Anno</th>'
      					+'  <th>Pagine</th>'
      					+ ' <th>Prezzo</th>'
      					+  '<th>Sconto</th>'
     					+  '<th> </th>'
     					+ '</tr>'
    					+'</thead>'
  		  				+'<tbody>';
      		 
	
 for (var tracklist in dati) {
   html = html+' <tr> ';
   html = html+ ' <td class="col-md-2">'+dati[tracklist].Titolo+' </td> ' ;
   html = html+ ' <td class="col-md-2">'+dati[tracklist].Anno+' </td> ' ;
   html = html+ ' <td class="col-md-2">'+dati[tracklist].Pagine+' </td> ' ;
   html = html+ ' <td class="col-md-2">'+dati[tracklist].Prezzo+' </td> ' ;
   html = html+ ' <td class="col-md-2">'+dati[tracklist].Sconto+' %</td> ' ;
   html = html+ ' <td class="col-md-2"><button type="button" data-toggle="modal" class="Mostra" data-target="#myModal" id="'+dati[tracklist].ISBN+'">Info</button></td> ' ;
   html = html+ ' </tr> ';  
}
html=html+' </tbody> </table> ';
html=html+'<script>  $(document).ready(function() {var table = $("#libri'+dati[0].IdAutore+'").DataTable({"bPaginate": false });'
+' table.search( \'\' ).draw();'
  +' '
+' '
+' })</script>'
+'<script>$.getScript("/Libreria/js/showInfoLibri.js", function(){});</script>';
	return html;
};

$('#bottoneReset').click(function(event) {
	 $(".main-content").load("pages/autorslist.php"); 
	
});
