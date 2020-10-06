document.addEventListener('DOMContentLoaded', function(){ 
    $('#register_form').submit(function(e){
        e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                // dataType: "html",
                data: $(this).serialize(),
                success: function(response){    
                    console.log(response);       
                    // demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', response.success, 2);
                },
                error: function(response){
                    console.log(response); 
                },
            });
    });