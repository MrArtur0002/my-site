<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Главная страница Административной панели</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset("css/admin.css") }}">
        <link rel="stylesheet" href="{{ URL::asset("css/bootstrap.min.css") }}">
    </head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-9 left-menu">
            @include('admin.Dashboard.munchkin')
        </div>
        <div class="col-3 right-menu d-flex justify-content-center">
            @include('admin.Dashboard.category-menu')
        </div>
    </div>
</div>
</body>
</html>
