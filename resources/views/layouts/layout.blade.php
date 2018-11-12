<!DOCTYPE html>
<html>
<head>

   <meta charset="utf-8" />
   <title>Page Title</title>
	<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">-->
	<!--<script src="main.js"></script>-->
	<!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" media="screen" href="{{asset('css/main.css')}}" />


	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

</head>


<body>
   <!--Header Start-->
   <header>
		<nav class="navbar_top">
		<!--NavBar Start--->
		<ul class="nav_left_list">
			<li class="nav_item">
				<a href="/#home">Home</a>
			</li>
			<li class="nav_item"> 
				<a href="/#features">Features</a>
			</li>
			<li class="nav_item">
				<a href="#">About</a>
			</li>
			<li class="nav_item">
				<a href="#">Work</a>
			</li>
		</ul>
		<div class="logo">
		<a href="/">
			<img src="https://image.spreadshirtmedia.com/image-server/v1/mp/designs/1009137217,width=178,height=178/majestic-deer-logo.png" class="logo_img">
		</a>
		</div>
		<ul class="nav_right_list">
			<li class="nav_item"> 
				<a href="/todo">To-Do List</a>
			</li>
			<li class="nav_item">
				<a href="#">Project2</a>
			</li>
			<li class="nav_item">
				<a href="#">Project3</a>
			</li>
			<li class="nav_item">
				<a href="#">Project4</a>
			</li>
		</ul>
		</nav>
	</header>
	
	@yield('body')
	<!--Header Ending-->
	
	
   <!--Main Ending-->


   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
   <!-- Include all compiled plugins (below), or include individual files as needed -->
   <!--<script src="js/bootstrap.min.js"></script>-->
</body>
</html>