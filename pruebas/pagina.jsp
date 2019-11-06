<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
$(function(){
	var fillSecondary = function(){
		var selected = $('#primary').val();
		$('#secondary').empty();
		$.getJSON("pagina.jsp?selected="+selected,null,function(data){
	 	   data.forEach(function(element,index){
		      $('#secondary').append('<option value="'+element+'">'+element+'</option>');
		   });
		});
	}
	$('#primary').change(fillSecondary);
	fillSecondary();
	

});