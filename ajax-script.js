/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */
$(document).on('click','#showData',function(e){
      $.ajax({    
        type: "GET",
        url: "fetch.php",             
        dataType: "html",                  
        success: function(data){                    
            $("#table-container").html(data); 
           
        }
    });
});


