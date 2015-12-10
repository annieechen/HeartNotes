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
        print("<h4>username</h4>");
        print("<h6>{$username}</h6>");
        print("<h4>uniqueID</h4>");
        print("<h6>{$uniqueID}</h6>");
        // create url
        $url = "https://ide50-aec78.cs50.io/newupload.php?uID=" . $uniqueID;
        print("<h4>Upload Notes to this Link!<h4>");
        print("<a href='{$url}'>{$url}</a><br>");
        print('<div class="fb-share-button" data-href="https://ide50-aec78.cs50.io/newupload.php?uID=17c55bc41c9" data-layout="button"></div>');
    ?>
    
</html>