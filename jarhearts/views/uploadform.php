<html><form action="newupload.php" method="post" onSubmit="return validateForm()">
    <fieldset> 
        <div class="form-group"> UniqueID of Recipient <br>
            <?php
            if(empty($uniqueID))
            {
                print('<input autocomplete="off" autofocus class="form-control" name="uniqueID" placeholder="ID of receiver" type="text"/>');
            } else
            {
                print("<input autocomplete='off' autofocus class='form-control' name='uniqueID' placeholder='ID of receiver' type='text' value='{$uniqueID}'/>");
            }
            ?>
        </div>
        <div>Type of Note <br>
            <select id = "uploadtype" name="type">
                <option value="default" selected="selected">Please choose</option>
                <option value="youtube">Youtube Link</option>
                <option value="image">Image</option>
                <option value="website">Website</option>
                <option value="note">Note</option>
            </select>
        </div>
        <div id="type_youtube" class="type_input" class="form-group" style="display: none;">
              Enter youtube link formatted like <a href="https://www.youtube.com/watch?v=F7AyRDKMJ2c">https://www.youtube.com/watch?v=F7AyRDKMJ2c</a>
            <br><input class="form-control" class="youtube" name="youtube" placeholder="Youtube URL" type="text"/>
        </div>
        <div id="type_image" class="type_input" class="form-group" style="display: none;">
            Enter url of image. If you have an image on your computer, upload it to <a href="http://tinypic.com/">tinypic.com/</a> and paste in the link <br>
            <input class="form-control" class="image" name="image" placeholder="Image Link" type="text"/>
        </div>
        <div id="type_website" class="type_input" class="form-group" style="display: none;"> Please make sure your website url begins with https://, or it may not load properly when displayed!<br>
            <input class="form-control" class="website" name="website" placeholder="link" type="text"/>
        </div>
        <div id="type_note" class="type_input" class="form-group" style="display: none;">
            <textarea rows="10" cols="50" class="form-control" class="note" name="note" placeholder="Memory" type="text"></textarea>
        </div>
        <div id="errormessage" style="color:Red;display:none">Please make sure all boxes are filled out correctly</div>
        <br>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Submit
            </button>
        </div>
    </fieldset>
</form>

<div>
   Questions? Check out our <a href="FAQ.php">FAQ</a>

<script>
    // changes form elements showing based on dropdown
   $("#uploadtype").change(function() {
       var type = $(this).val();
       $(".type_input").hide("fast", function() {
           $("#type_" + type).show("slow");
       });
   });
   
   // checks to make sure all applicable elements in form are filled out
   function validateForm() {
        var getType = document.getElementById("uploadtype");
        var type = getType.options[getType.selectedIndex].value;
        if (type === "default")
        {
            document.getElementById("errormessage").style.display=""
            return false;
        }
        var inputs = document.getElementsByName(type);
        for (var i = 0, n = inputs.length; i < n; i++)
        {
            if(!inputs[i].value) {
                document.getElementById("errormessage").style.display=""
                return false;
            }
        }
        return true;
   };    
</script>   

</html>
