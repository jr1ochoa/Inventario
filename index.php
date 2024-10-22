<?php include("config/net.php");?>

<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE HTML>

<html>
    <head>
		<?php include("template/meta.php");?>        
	</head>
    <style>
        h1, h2, h3, h4, h5, h6{
            font-family: "Barlow", sans-serif;
            color: #1F376F;
        }
        body{
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            color: #20376F;
        }
        .btn-siif{
            padding: 5px 20px;
            border: 2px solid #3871F9;
            border-radius: 30px; 
        }

        .btn-transparent{
            background-color: #ffffff;
            color: #3871F9;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .btn-transparent:hover{
            background-color: #3871F9;
            border: 2px solid #ffffff;
            color: #ffffff;
        }

        .btn-solid{
            background-color: #3871F9;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .btn-solid:hover{
            background-color: #ffffff;
            color: #3871F9;
        }

        .btn-solid-2{
            background-color: #1F376F;
            color: #ffffff;
            border: 2px solid #1F376F;
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
        }
        .btn-solid-2:hover{
            background-color: #182A54;
            color: #ffffff;
            border: 2px solid #182A54;
        }

        .footer-siif{
            background-color: #F1F1F1;
            color: #AEAEAE;
            padding-top: 3%;
            padding-bottom: 3%;
        }

        .table th {
            background-color: #1F376F !important;
            color: white !important;
        }
        
        .modal-header {
            background-color: #1F376F; 
            color: white;
        }

    </style>
	<body class="is-preload">		
		<?php 
            include("template/header.php");  
            include("engine.php");
            include("template/footer.php");             
            include("template/libs.php");     
        ?>
	</body>
</html>