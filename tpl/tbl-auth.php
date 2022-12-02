<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login-form.css">
</head>
<body>
<form<body>
<!-- partial:index.partial.html -->
<div id="background">
    <div id="panel-box">
        <div class="panel">
            <div class="auth-form on" id="login">
                <div id="form-title">Log In</div>
                <form action="<?= site_url('auth.php?action=login') ?>" method="POST">
                    <input name="email" type="text" required="required" placeholder="email"/>
                    <input name="password" type="password" required="required" placeholder="password"/>
                    <button type="Submit">Log In</button>
                </form>
            </div>
            <div class="auth-form" id="signup" >
                <div id="form-title">Register</div>
                <form action="<?= site_url('auth.php?action=register') ?>" method="POST">
                    <input name="name" type="text" required="required" placeholder="full name"/>
                    <input name="password" type="password" required="required" placeholder="password"/>
                    <input name="email" type="email" required="required" placeholder="email"/>
                    <button type="Submit">Sign Up</button>
                </form>
            </div>
        </div>
        <div class="panel">
            <div id="switch">Sign Up</div>
            <div id="image-overlay"></div>
            <div id="image-side"></div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://code.jquery.com/jquery-3.3.1.min.js'></script><script  src="./script.js"></script>

</body>
<script src="assets/js/script.js"></script>
<script>
    $('#switch').click(function(){
        $(this).text(function(i, text){
            return text === "Sign Up" ? "Log In" : "Sign Up";
        });
        $('#login').toggleClass("on");
        $('#signup').toggleClass("on");
        $(this).toggleClass("two");
        $('#background').toggleClass("two");
        $('#image-overlay').toggleClass("two");
    })
</script>
</body>
</html>