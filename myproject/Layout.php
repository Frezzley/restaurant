<!--borrowed from "Homeberry"-->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= "Restaurant" ?></title>
    <?php //->load->helper('url'); ?>
    <link href="/myproject/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/myproject/css/bootstrap.css.map" rel="stylesheet" type="text/css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<!--<body>--
<buttons>
    <div class="btn-group">
        <td><a class="btn btn-info" href="/home">Home</a></td>
    </div>
    <div class="btn-group">
        <td><a class="btn btn-warning" href="/user/index">Benutzer</a></td>
    </div>
    <div class="btn-group">
        <td><a class="btn btn-danger" href="/restaurant/index">Restaurant</a></td>
    </div>
    <div class="btn-group">
        <button type="button" class="btn btn-primary">Neu</button>
        <button type="button" class="btn btn-primary dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="caret"></span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <ul class="dropdown-menu">
            <li><a href="/user/create/">User</a></li>
            <li><a href="/restaurant/create/">Restaurant</a></li>
        </ul>
    </div>
</buttons>
!--->

<body>

<!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/home">Restaurant</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/home">Home</a></li>
                <li><a href="/user/index">Benutzer</a></li>
                <li><a href="/restaurant/index">Restaurant</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Neu <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/user/create/">User</a></li>
                        <li><a href="/restaurant/create/#">Restaurant</a></li>


                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar/">Log in</a></li>
            </ul>
        </div>
    </div>
</nav>


</body>