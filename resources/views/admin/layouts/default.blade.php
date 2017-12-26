<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Administração</title>
    <style type="text/css">
        html, body{
            height: 100%;
        }
        #wrap{
            min-height: 100%;
            position: relative;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <div class="container">
            @yield('content')
        </div>
    </div>
    <!-- /#wrap -->
    <footer id="footer">
        <div class="container">
            <div class="pt-2 pb-2">
                Desenvolvido com <i class="fa fa-heart text-danger"></i> por Leonardo Hipólito
            </div>
        </div>
        <!-- /.container -->
    </footer>
</body>
</html>
