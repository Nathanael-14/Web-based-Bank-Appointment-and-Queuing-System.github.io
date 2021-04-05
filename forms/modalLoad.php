<?php
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{		
		    echo "<script>
		    			$('#formb').trigger('click');

		    			$('#calendarForm').animate({height: 'toggle', opacity: 'toggle'}, 'slow');
		    	</script>";


	}
?>