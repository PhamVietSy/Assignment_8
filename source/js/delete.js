$('a.delete-item').click(function(event){
    event.preventDefault();
    
    var href = $(this).attr('href'); 
   
    $.ajax({
        type: "GET",
        url:    href,
        data: {},
        
        success: function () {
            alertify.error('Xóa sản phẩm');
            
        }
    });
    
});