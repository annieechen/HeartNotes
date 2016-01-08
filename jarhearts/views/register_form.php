<head>
    <!--allow gmail signin-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="184842439817-f071ci64fi41c73u6d716k4loo91g7rr.apps.googleusercontent.com">
</head>
Want to be able to track your notes? Register for an account!
<!-- Couldn't get the google sign in to work :(
<p>Or sign in with your Google Account!</p>
<div padding-top=20px align="center" class="g-signin2" data-onsuccess="onSignIn"></div> -->
<form action="register.php" method="post">
    <fieldset>
        <br>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="email" placeholder="Email" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
         <div class="form-group">
            <input class="form-control" name="confirmation" placeholder="Confirm Password" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a>
</div>