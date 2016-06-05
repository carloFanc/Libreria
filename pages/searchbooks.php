<head>
	 
	<style>
		.cerca {
			padding-top: 2px;
			padding-left: 8px;
			padding-right: 8px;
			background: #FDE3A7;
		}
		label,h3 {
                color: #19008c;  
              }
	</style>

	 
</head>
<body>
	<form role="form">
		<div class="cerca">
			<h3>Cerca libro:</h3>
		
		<div class="form-group ">
			<label for="Titolo">Titolo:</label>
			<input type="text" name="Titolo" class="form-control" id="Titolo" placeholder="Titolo...">
		</div>
		<div class="form-group ">
			<label for="Anno">Anno:</label>
			<input type="number" name="Anno" class="form-control" id="Anno" placeholder="Anno...">
		</div>
		<div class="form-group ">
			<label for="Editore">Editore:</label>
			<input type="text" name="Editore" class="form-control" id="Editore" placeholder="Editore...">
		</div>
		<div class="form-group ">
			<label for="Collana">Collana:</label>
			<input type="text" name="Collana" class="form-control" id="Collana" placeholder="Collana...">
		</div> 
        <input type="button" id="bottone" class="btn btn-primary" value="Cerca!">
		 
		</div>
	</form>

	<script src="/Libreria/js/books.js"></script> 
</body>
