<!doctype html>
<html ng-app="contApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="page-header">
    <h1>Проды</h1>
</div>

<div class="panel">
    <table class="table table-striped" ng-controller="mainController">
        <thead>
        <tr>
            <th>Название</th>
            <th>Ссылка</th>
            <th>Размер</th>
            <th>Время</th>
            <th>Автор</th>
            <th>Жанр</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="cont in conts">
            <td>{{cont.title}}</td>
            <td>{{cont.link}}</td>
            <td>{{cont.size}}</td>
            <td>{{cont.time}}</td>
            <td>{{cont.author_id}}</td>
            <td>{{cont.genre_id}}</td>
        </tr>
        </tbody>
    </table>
</div>

<script src="js/angular-1.5.3/angular.js"></script>

<!-- ANGULAR -->
<!-- all angular resources will be loaded from the /public folder -->
<script src="js/controllers/mainCtrl.js"></script>
<!-- load our controller -->
<script src="js/services/contService.js"></script>
<!-- load our service -->
<script src="js/app.js"></script>
<!-- load our application -->
</body>
</html>