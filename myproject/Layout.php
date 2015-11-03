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
<body>
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


