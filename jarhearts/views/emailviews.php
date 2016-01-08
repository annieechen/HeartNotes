<form action="email.php" method="post">
    <fieldset>
        <div class="form-group">
            <?php
                print("<input autocomplete='off' autofocus class='form-control' name='email' placeholder='ID of receiver' type='text' value='{$recipientemail}'/>");
            ?>
        </div>
        <div class="type_input" class="form-group">
            <textarea rows="10" cols="50" class="form-control" name="body" placeholder="text of email" type="text"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
               send!
            </button>
        </div>
    </fieldset>
</form>
