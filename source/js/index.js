$('a.add-to-cart').click(function(event){
    event.preventDefault();
    var href = $(this).attr('href'); 
    // var name = $(this).attr('')
    $.ajax({
        type: "GET",
        url:    href,
        data: {},
        
        success: function () {
            alertify.success('Thêm vào giỏ hàng thành công');
            
        }
    });
    
});