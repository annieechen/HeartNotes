        /*
        var catresults = ["https://upload.wikimedia.org/wikipedia/commons/1/1e/Large_Siamese_cat_tosses_a_mouse.jpg"], start = 0;
        
        function getCats(startNumber)
        {
            $.getJSON("https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=cats&start="+startNumber+"&callback=?", function(results){
                catresults.push(results.responseData.results.url);
                counter++;
                if(catresults.length < 538){
                    start = start + 4;
                    getCats(start);
                } else 
                {
                   return;
                }
            });
        }
        getCats(start);
        for (var i=0; i<catresults.length; i++) {
        document.write("Element " +i+ " contains: " +catresults[i]+ "<br />");
        }
        document.write(counter);
        */

    var catAPI = 'https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=fuzzy%20monkey&callback=processResults'
$.getJSON( catAPI, 
function(json) {
  alert(json);
});
    
    