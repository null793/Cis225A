<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../bootstrap/assets/ico/favicon.png">

    <title>Book-o-matic</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../css/bookomatic.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="../bootstrap/assets/js/html5shiv.js"></script>
    <script src="../bootstrap/assets/js/respond.min.js"></script>
    <![endif]-->

    <!-- Custom styles for this template -->

    <style id="holderjs-style" type="text/css">.holderjs-fluid {font-size:16px;font-weight:bold;text-align:center;font-family:sans-serif;margin:0}</style><script>window["_GOOG_TRANS_EXT_VER"] = "1";</script></head>

<body style="">
<div class="navbar-wrapper">
    <div class="container">

        <div class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Book-o-matic</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Register</a></li>
                        <li class="drop down">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Login <strong class="caret"></strong></a>
                            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                <!-- Login form here -->
                                <form action="login.php" method="post" accept-charset="UTF-8">
                                    <input id="user_username" style="margin-bottom: 15px;" type="text" name="user[username]" size="30" />
                                    <input id="user_password" style="margin-bottom: 15px;" type="password" name="user[password]" size="30" />
                                    <input id="user_remember_me" style="float: left; margin-right: 10px;" type="checkbox" name="user[remember_me]" value="1" />
                                    <label class="string optional" for="user_remember_me"> Remember me</label>

                                    <input class="btn btn-primary" style="clear: left; width: 100%; height: 32px; font-size: 13px;" type="submit" name="commit" value="Sign In" />
                                </form>

                            </div>

                        </li>
                    </ul>
                    <!-- The drop down menu -->

                </div>

            </div>
        </div>

    </div>
</div>







<!-- Marketing messaging and featurettes
================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->


    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->


    <!-- FOOTER -->
    <div class="footer" id="footer">
        <h1>Sometimes at dusk, when you were trying to relax and not think of the general stagnation, the Garbage God would gather a handful of those choked-off morning hopes and dangle them somewhere just out of reach; they would hang in the breeze and make a sound like delicate glass bells, reminding you of something you never quite got hold of, and never would.  <small>Humter S Thompson</small></h1>
    </div>


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../bootstrap/assets/js/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bootstrap/assets/js/holder.js"></script>
<script>
    $(function(){
        $(window).resize(function(){
            placeFooter();
        });

        placeFooter();
        // hide it before it's positioned

    });

    $(document).ready(function()
    {
        //Handles menu drop down
        $('.dropdown-menu').find('form').click(function (e) {
            e.stopPropagation();
        });
    });

    function placeFooter() {
        var windHeight = $(window).height();
        var footerHeight = $('.footer').height();
        console.log(windHeight);
        var offset = parseInt(windHeight) - parseInt(footerHeight);
        console.log(offset);

        $('.footer').css('top',windHeight);

    }
</script>

</body></html>