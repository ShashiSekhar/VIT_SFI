<?php 	    if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    }
	    else
	    {
	        session_destroy();
	        session_start(); 
	    }
?>