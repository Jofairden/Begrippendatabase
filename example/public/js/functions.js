$('document').ready(function(){

    $(".btn-success").click(function(){
        var id = $(this).closest("tr").attr('id');
        $.ajax({
            url: window.location.href,
            type: 'POST',
            data: { '_token' : window.Laravel.csrfToken, 'id' : id },
            success: function(response) { 
                console.log(response);
                var tr = "tr#" + id;
                $(tr).fadeOut(500);
            },
        });
    });

     $(".btn-danger").click(function(){
        var id = $(this).closest("tr").attr('id');
        $.ajax({
            url: window.location.href,
            type: 'DELETE',
            data: { '_token' : window.Laravel.csrfToken, 'id' : id },
            success: function(response) { 
                var tr = "tr#" + id;
                $(tr).fadeOut(500);
            },
        });
    });


});