<?php
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Legacy Tuesdays</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="css/vendor/normalize.min.css">
        <link rel="stylesheet" href="css/vendor/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/jquery-2.1.4.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/vendor/jquery.validate.min.js"></script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="index.php">Legacy Tuesdays</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="analysis.php">Analysis</a></li>
                            <li><a href="admin.php">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="hero-unit">
                <h1>Admin</h1>
                <form id="result" name="result" method="post" action="addresult.php">
                <div class="form-group">
                    <label for="dateInput">Date: YYYY-MM-DD or you break fucking everything, yes I need to fix that at some point</label>
                    <input type="text" class="form-control" id="dateInput" name="dateInput" placeholder="YYYY-MM-DD" >
                    <script>
                    $(document).ready(function() {
                        $("#dateInput").val("2015-" + getMonth(new Date()) + "-");
                        $("#dateInput").focus();
                    });
                    </script>
                </div>
                <div class="form-group">
                    <label for="nameInput">Full Name: typos in names will create a new user</label>
                    <input type="text" class="form-control" id="nameInput" name="nameInput" placeholder="Dack Fayden">
                </div>
                <div class="form-group">
                    <label for="pointsInput">Points: i can set it so its 9 by default if you want</label>
                    <input type="text" class="form-control" id="pointsInput" name="pointsInput" placeholder="9 or 12">
                </div>
                <div class="form-group">
                    <label for="nameInput">Deck</label>
                    <input type="text" class="form-control" id="deckInput" name="deckInput" placeholder="RUG Delver">
                </div>
                <div class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="formatInput" id="formatLegacy" value="0" checked>
                        Legacy
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="formatInput" id="formatModern" value="1">
                        Modern
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="formatInput" id="formatStdFnm" value="2">
                        Standard FNM
                      </label>
                    </div>
                </div>
                <!--type="submit" -->
                <button type="submit" /id="submitbtn" name="submitbtn" type="button" class="btn btn-default">Submit</button>
                </form>
                <div id="success">
                    <h2 style="color: green;">Success</h2>
                </div>
            </div>         
            <br>
            <br>
      <hr>
      <footer>
        <p>&copy; Henry Chladil 2015</p>
      </footer>

        
        <script src="js/main.js"></script>
        <script>

            $(document).ready(function() {
                $('#success').hide();
                //var form = $('#result');
                $('#result').validate({
                    rules: {
                        dateInput: {
                            required: true,
                            date: true,
                            minlength: 10,
                            maxlength: 10
                        },
                        nameInput: {
                            required: true
                        },
                        pointsInput: {
                            required: true
                        },
                        deckInput: {
                            required: true
                        }, 
                        formatInput: {
                            required: true
                        }
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            type: "POST",
                            url: "addresult.php",
                            data: $(form).serialize(),
                            success: function(response) {
                                console.log(response);
                                $('#success').fadeIn(500, function() {
                                    $('#success').fadeOut(500);
                                });
                            }
                        });
                        return false;
                    }
                });
            });
        </script>
        <script> 
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-30953838-1','auto');ga('send','pageview');
        </script>
    </body>
</html>
