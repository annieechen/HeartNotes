<html><form action="newupload.php" method="post" onSubmit="return validateForm()">
    <fieldset> 
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="uniqueID" placeholder="ID of receiver" type="text"/>
        </div>
        <div>Type of Note <br>
            <select id = "uploadtype" name="type">
                <option value="default" selected="selected">Please choose</option>
                <option value="youtube">Youtube Link</option>
                <option value="image">Image</option>
                <option value="memory">Memory</option>
                <option value="note">Note</option>
            </select>
        </div>
        <br>
        <div id="type_youtube" class="type_input" class="form-group" style="display: none;">
            <input class="form-control" class="youtube" name="youtube" placeholder="Youtube URL" type="text"/>
        </div>
        <div id="type_image" class="type_input" class="form-group" style="display: none;">
            <input class="form-control" class="image" name="image" placeholder="Image Link" type="text"/>
        </div>
        <div id="type_memory" class="type_input" class="form-group" style="display: none;">
            <textarea rows="10" cols="50" class="form-control" class="memory" name="memory" placeholder="Text" type="text"></textarea>
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
   Questions? Check out our <a href="about.php">FAQ</a>

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
