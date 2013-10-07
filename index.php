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
                        <li><a href="#contact">Login</a></li>
                    </ul>
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
        <h1>You have to know the material you're writing about before you alter it.  <small>Humter S Thompson</small></h1>
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