<html>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <?php
        print("<h4>Username</h4>");
        print("<h6 style='font-size: 15pt;'>{$username}</h6>");
        // create url
        $url = "https://ide50-aec78.cs50.io/newupload.php?uID=" . $uniqueID;
        print("<h4>Your Share Link!<h4>");
        print("<a style='font-size: 15pt;' href='{$url}'>{$url}</a><br><br>");
        print("<div class='fb-share-button' data-href='{$url}' data-layout='button'></div>");
    ?>
    
</html>