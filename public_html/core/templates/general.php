<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>M1 Блог</title>

        <!-- Bootstrap Core CSS -->
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/template/css/blog-home.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond./template/js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">М1 Блог</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/">Список записей</a>
                        </li>
                        <li>
                            <a href="/index/index/contact">Контакты</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <div class="row">

                <?= $content ?>


                <!-- Blog Sidebar Widgets Column -->
                <div class="col-md-4">



                    <!-- Blog Categories Well -->
                    <div class="well">
                        <h4>Управление</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="/index/manage/create">Добавить запись</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                    </div>


                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>&copy; Radmir Royanov</p>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="/template/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/template/js/bootstrap.min.js"></script>

    </body>

</html>