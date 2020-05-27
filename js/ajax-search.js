$(document).ready(function(){
    $('.search-wrap input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $('.search-wrap .result').addClass("has-result");
            $.get("../search.php", {term: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            $('.search-wrap .result').removeClass("has-result");
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-wrap").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
