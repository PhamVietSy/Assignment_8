
$(document).ready(function(){
    load_product();
  
    load_cart_data();

// load product
    function load_product()
    {
     $.ajax({
      url:"../banhang/Controller/Homeproducts.php",
      method:"POST",
      success:function(data)
      {
       $('#display_item').html(data);
      }
     })
    }
//    load items cart
    function load_cart_data()
    {
     $.ajax({
      url:"../banhang/Controller/fetch_items_cart.php",
      method:"POST",
      dataType:"json",
      success:function(data)
      {
          
       $('#cart_details').html(data.cart_details);
      
       $('.badge').text(data.total_item);
      }
     })
    }
   
//    Add cart
    $(document).on('click', '.add_to_cart', function(){
     var pro_id = $(this).attr('id');
     var pro_name = $('#name'+pro_id+'').val();
     var price = $('#price'+pro_id+'').val();
     var quantity = $('#quantity'+pro_id).val();
     var action = 'add';
     if(quantity > 0)
     {
      $.ajax({
       url:"../banhang/Controller/Homeproducts.php",
       method:"POST",
       data:{pro_id:pro_id, pro_name:pro_name, price:price, quantity:quantity, action:action},
       success:function(data)
       {
           
        load_cart_data();
        alert("Item has been Added into Cart");
       }
      })
      }
     else
     {
      alert("Please Enter Number of Quantity");
     }
    });
    // Delete cart 
    $(document).on('click', '.delete', function(){
        var pro_id = $(this).attr('id');
        var action = 'remove';
        if(confirm("Are you sure you want to remove this product?"))
        {
         $.ajax({
          url:"../banhang/Controller/Homeproducts.php",
          method:"POST",
          data:{pro_id:pro_id, action:action},
          success:function(data)
          {
           load_cart_data();
           view_data();
          }
         })
        }
        else
        {
         return false;
        }
    });
    //   Clear cart để khỏi reload trang
    $(document).on('click', '#clear_cart', function(){
        var action = 'empty';
        $.ajax({
         url:"../banhang/Controller/Homeproducts.php",
         method:"POST",
         data:{action:action},
         success:function()
         {
          load_cart_data();
          location.reload();
         }
        })
    });
    // ODER PAYMENT
    view_data();
  
    function view_data (){
        $.ajax({
            // url:"../../Controller/fetch_order_payment.php",
            method:"POST",
            success:function(data)
            {
            $('#order_payment').html(data);

            $('.quantity').change(function(){
              
                var pro_id = $(this).attr('data-product-id');
                var quantity =$(this).val();
                var action = 'update';
                if(quantity > 0){
                    $.ajax({
                        url:"../../Controller/Homeproducts.php",
                        method:"POST",
                        data:{pro_id:pro_id,quantity:quantity, action:action},
                        success:function(data)
                        {
                        load_cart_data();
                        location.reload();
                        view_data();
                        }
                    })
                }else alert("Please Enter Number of Quantity");
                
              });
            }
        })
    };
    
    
});
