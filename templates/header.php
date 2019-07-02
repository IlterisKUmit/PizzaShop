<?php 

   session_start();

   if($_SERVER['QUERY_STRING'] == 'noname'){
      unset($_SESSION['name']);
      unset($_COOKIE['gender']);
   }


   $name = $_SESSION['name'] ?? 'Guest'; //çift soru işareti eger $_SESSION['name'] set edilmemişse $name i Guest e eşitler
   $gender = $_COOKIE['gender'] ?? 'Unknown';
?>

<head>
	<title>İlto Pizza</title>
	<!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   
   <style type="text/css">
   	.iltobold{
   	font-weight: bold;
   	}
   	.h6{
   		color: #382208 !important;
   		
   	}
   	.brand{
   		background: #ff3300 !important;
   	}	
   	.brand-text{
   		color: #ff3300 !important;
   	}
      .pizza{
      	width: 100px;
      	margin: 40px auto -30px;
      	display: block;
      	position: relative;
      	top: -30px;
      }
   	form{
   		max-width: 460px;
   		margin: 20px auto;
   		padding: 20px;
   	}
   </style>

</head>
	<body class="grey lighten-4">
		<nav class="white z-depth-0">
			<div class="container">
				<a href="index.php" class="brand-logo brand-text iltobold">İlto Pizza</a>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li class="grey-text">Hello! <?php echo htmlspecialchars($name); ?> </li>
               <li class="grey-text"> (<?php echo htmlspecialchars($gender); ?>)</li>
               <li><a href="add.php" class="btn brand z-depth-0">Add Pizza</a></li>
				</ul>
			</div>
		</nav>
