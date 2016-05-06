<!doctype html>
<html ng-app="contApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">



</head>
<body>
<div class="page-header">
    <h1>Проды</h1>
</div>

<!-- LOADING ICON =============================================== -->
<!-- show loading icon if the loading variable is set to true -->
<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

<div class="panel" ng-controller="mainController">

        <div class="cont-header row">
            <span class="col-md-1">№</span>
            <span class="col-md-5">Название</span>
            <span class="col-md-1">Размер</span>
            <span class="col-md-1">Время</span>
            <span class="col-md-2">Автор</span>
            <span class="col-md-2">Жанр</span>
        </div>
        <uib-accordion>
            <uib-accordion-group ng-repeat="cont in conts">
                <uib-accordion-heading>
                    <div class="row">
                        <div class="col-md-1">{{cont.id}}</div>
                        <div class="col-md-5"><a href="{{cont.link}}">{{cont.title}}</a></div>
                        <div class="col-md-1">{{cont.size}}</div>
                        <div class="col-md-1">{{cont.time}}</div>
                        <div class="col-md-2"><a href="{{cont.alink}}">{{cont.aname}}</a></div>
                        <div class="col-md-2">{{cont.genre}}</div>
                    </div>
                </uib-accordion-heading>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
                <p>This is just some content to illustrate fancy headings.</p>
            </uib-accordion-group>
        </uib-accordion>
    <uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" rotate="false" ng-change="pageChanged()"></uib-pagination>
</div>
<script src="js/angular-1.5.3/angular.js"></script>
<script src="js/angular-1.5.3/angular-animate.min.js"></script>
<script src="js/ui-bootstrap-tpls-1.3.2.min.js"></script>

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