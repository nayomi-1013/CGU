document.addEventListener('DOMContentLoaded', function() {
    alert("Hi");
    var method = "load";
    
    $.ajax({
        type: "POST",
        url: "../Controller/UserController.php",
        data: '&method='+method,
        cache: false,
        success: function(result){
            
        }
    });

}, false);