<?php

function conectar()
{
	global $con;
	$con = mysqli_connect($_SESSION['DB_HOST'], $_SESSION['DB_USER'], $_SESSION['DB_PASS'], $_SESSION['DB_NAME']);
	/* comprobar la conexión */
	if (mysqli_connect_errno()) 
	{
	    printf("Falló la conexión: %s\n", mysqli_connect_error());
	    exit();
	}
		else
		{
			$con -> set_charset("utf8");
			$ret=true;
		}
	return $ret;
}

function desconectar()
{
	global $con;
	mysqli_close($con);
}