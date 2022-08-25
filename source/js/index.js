// $('a.add-to-cart').click(function(event){
//     event.preventDefault();
//     var href = $(this).attr('href'); 
//     // var name = $(this).attr('')
//     $.ajax({
//         type: "GET",
//         url:    href,
//         data: {},
        
//         success: function () {
//             alertify.success('Thêm vào giỏ hàng thành công');
            
//         }
//     });
    
// });
$(".buy-form").submit(function(event){
    event.preventDefault();
    console.log("data:", $(this).serializeArray());
    // $.ajax({
    //     type: "POST",
    //     url:    './Controller/CartController.php',
    //     data: $(this).serializeArray(),
        
    //     success: function () {
    //         alertify.success('Thêm vào giỏ hàng thành công');
            
    //     }
    // });
    
});