<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{{ asset('bower_components/dropzone/dist/dropzone.css') }}">
		<script type="text/javascript" src="{{ asset('bower_components/dropzone/dist/dropzone.js') }}"></script>
		
		<script type="text/javascript">
			// Dropzone.autoDiscover = false;
			// or disable for specific dropzone:
			// Dropzone.options.myDropzone = false;
		</script>
		<title>Meus Cursos</title>
	</head>
	<body>
        <div id="wrap">
        	        <nav id="menu" class="navbar navbar-dark">
        	          <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
        	            &#9776;
        	          </button>
        	          <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
        	            <a class="navbar-brand" href="{{ route('course.admin.courses.index') }}">Cursos</a>
        	            <ul class="nav navbar-nav">
        	              <li class="nav-item">
        	                <a class="nav-link" href="{{ route('course.admin.categories.index') }}">Categorias <span class="sr-only">(current)</span></a>
        	              </li>
        	              <li class="nav-item">
        	                <a class="nav-link" href="{{ route('course.admin.businesses.index') }}">Escolas</a>
        	              </li>
        	              <li class="nav-item">
        	                <a class="nav-link" href="{{ route('course.admin.courses.index') }}">Cursos</a>
        	              </li>
        	              <li class="nav-item">
        	                <a class="nav-link" href="{{ route('course.admin.modules.index') }}">Modulos</a>
        	              </li>
        	              <li class="nav-item">
        	                <a class="nav-link" href="{{ route('course.admin.files.index') }}">Aulas</a>
        	              </li>
        	              <li class="nav-item">
        	              	<a class="nav-link">{{ini_get("upload_max_filesize")}}</a>
        	              </li>
        	              <li class="nav-item pull-xs-right pull-right">
        	                <a class="nav-link" href="{{ route('course.admin.courses.create') }}">Novo</a>
        	              </li>
        	            </ul>
        	          </div>
        	        </nav>
        			<div class="container-fluid">
        				<main id="main">
        					@yield('content')
        				</main>
        			</div>
        			<!-- /.container -->
        </div>
        <!-- /#wrap -->
		<footer id="footer">
			<div class="container">
				Desenvolvido com <i class="fa fa-heart text-danger"></i> por Sr. Web
			</div>
		</footer>
	</body>
	<style type="text/css">
		html, body{
			height: 100%;
		}
		#wrap{
			min-height: 100%;
			position: relative;
			margin-bottom: -2rem;
			padding-bottom: 3rem;
		}
		body{
			background: #fffffc;
			background: #ededf4;
			background: #ededed;
		    font-family: 'Nunito', sans-serif;
		}
		#menu{
			background: #ff1b1c;
			background: #2e282a;
			background: #ffc914;
			margin-bottom: 1rem;
			border-radius:0;
			-webkit-box-shadow: 0px 1px 3px 0 #777;
			padding-top: 0;
			padding-bottom: 0;
			box-shadow: 0px 1px 3px 0 #777;
			text-transform: uppercase;
		}
		#menu .navbar-brand{
			padding-top: 1.3rem;
			font-weight: bold;
		}
		#menu .nav-item{
			padding-top: 1rem;
			padding-bottom: 1rem;
			padding-left: 1.5rem;
			padding-right: 1.5rem;
			transition: all 0.8s;
			margin: 0;
		}
		#menu a{
			color: #76b041;
			color: #2e282a;
			display: block;
		}
		#menu .active, #menu .nav-item:hover{
			background: #2e282a;
		}
		#menu .active a,  #menu .nav-item:hover a{
			color: #fff;
			/* color: #ffc914; */
		}
		#main{
			background: #fff;
			padding: 2rem;
			border: 1px solid #dedede;
		}
		.content-header{
			padding-bottom: 2rem;
			/* color:#020100; */
		}
		#footer{
			background: #2e282a;
			padding-top: 0.5rem;
			padding-bottom: 0.5rem;
			line-height: 1rem;
			font-size: 0.8rem;
			color: #fff;
			text-align: right;
		}
		.pull-xs-right{
			float: right;
		}
		.panel-title{
			margin-bottom: 1rem;
		}
		.note-popover.popover{
			position: relative;
		}
	</style>
	<!-- include libraries(jQuery, bootstrap) -->
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
	<!-- include summernote css/js-->
	<link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
	<link href="/bower_components/summernote/dist/summernote.css" rel="stylesheet">
	<script src="/bower_components/summernote/dist/summernote.min.js"></script>
	<script src="/bower_components/select2/dist/js/select2.min.js"></script>
	<script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('uppie.min.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('select').select2();
			$('.dataTable').DataTable({
					"language": {
					    "search": "Pesquisar:",
					    "lengthMenu": "Mostrar _MENU_ por página",
					    "paginate":{
					    	"last":'Última',
					    	'next':'Próxima',
					    	'previous':'Anterior',
					    	'first':'Primeira'
					    },
					    'info': 'Exibindo _START_ a _END_ de _TOTAL_ registros'
					  },
					  "order":[]
				});
			var l = window.location.href;
			$('.nav a').each(function(index){
			    if($(this).attr('href')==l){
			        $(this).parent().addClass('active');
			    }
			});
			$('textarea').summernote({
				minHeight: 350,
				focus: true
			});
		});
	</script>
</html>