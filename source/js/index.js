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
$(document).on('click', '.add_to_cart', function(){
    var pro_id = $(this).attr('id');
    var pro_name = $('#name'+pro_id+'').val();
    var price = $('#price'+pro_id+'').val();
    var quantity = $('#quantity'+pro_id).val();
    var action = 'add';
    if(quantity > 0)
    {
     $.ajax({
      url:"./../Controller/CartController.php",
      method:"POST",
      data:{pro_id:pro_id, pro_name:pro_name, price:price, quantity:quantity, action:action},
      success:function(data)
      {
          
       
       alert("Item has been Added into Cart");
      }
     })
     }
    else
    {
     alert("Please Enter Number of Quantity");
    }
   });