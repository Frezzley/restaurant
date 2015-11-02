<!--borrowed from "Homeberry"-->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= "detrfzguhikjl" ?></title>
    <?php //->load->helper('url'); ?>
    <link href="/myproject/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/myproject/css/bootstrap.css.map" rel="stylesheet" type="text/css"/>
    
</head>
<body>

<!-- Split button -->
<div class="btn-group">
    <button type="button" class="btn btn-info">Home</button>
    <button type="button" class="btn btn-info dropdown-toggle" aria-haspopup="true">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="#">Action</a></li>
    </ul>
</div>
<!-- Split button -->
<div class="btn-group">
    <button type="button" class="btn btn-warning">Benuzer</button>
    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="#">Benutzer</a></li>
    </ul>
</div>

<!-- Single button -->
<div class="btn-group">

    <button type="button" class="btn btn-danger">Restaurant</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu">
        <li><a href="#">Neu</a></li>
        <li><a href="/User/create/">User</a></li>
        <li><a href="/Restaurant/create/">Restaurant</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="#">Separated link</a></li>
    </ul>
</div>

<!-- Split button -->

<div class="btn-group">
    <button type="button" class="btn btn-primary">Benuzer</button>
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class=" dropdown dropdown-menu">
        <li><a href="#">Benutzer</a></li>
    </ul>
</div>