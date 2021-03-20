<?php
	if($btnholder == "register" || $btnholder == "try again")
	{
		    echo "<script>
            $('register-form').ready(function()
            {
              $('form').animate({height: 'toggle', opacity: 'toggle'}, 'slow');});
          </script>";
	}
?>