<script type="text/javascript">
  // $(document).ready(function(){

  //   var uid = <?php if(!empty(Auth::user()->id)){echo Auth::user()->id;} else {echo 0;}?> ;

  //   if(uid==0){
  //     window.location.href='/';
  //   }

  // });
</script>


 <script type="text/javascript">
   
  $('#customerEmail').on('change',function(){
    var email = $('#customerEmail').val();
    // alert(email)

    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    
    jQuery.ajax({
     url: '/checkCustomerEmail',
     type: 'POST',
     data: { _token:CSRF_TOKEN, email: email },
     success: function (data) {
       
      if(data==1){
        $('#emailError').show();
        $('#checkRegistration').attr('disabled',true);
        $('#emailError').text(' Email already exist. Try another.');
      } 
      else{
        $('#emailError').hide();
        $('#checkRegistration').prop('disabled',false);
      }          
      
    },
    failure: function (data) {
     Swal('Something Went Wrong');
   }
 });
  });



  $('#checkRegistration').on('click',function(){
    var email = $('#customerEmail').val();
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');

    jQuery.ajax({
     url: '/sendEmailOtp',
     type: 'POST',
     data: { _token:CSRF_TOKEN, email: email },
     success: function (data) {
       
      $('#register1').hide();      
      $('#register2').show();      
      
    },
    failure: function (data) {
     Swal('Something Went Wrong');
   }
 });


  });

  function checkOtp(){


    var email = $('#customerEmail').val();
    var otp = $('#email_otp').val();

    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    
    jQuery.ajax({
     url: '/verifyOtp',
     type: 'POST',
     data: { _token:CSRF_TOKEN, email: email, otp: otp },
     success: function (data) {
       
      if(data==1){
        postRegister();
      } 
      else{
        Swal('Invalid OTP');
        $('#email_otp').empty();
      }          
      
    },
    failure: function (data) {
     Swal('Something Went Wrong');
   }
 });

  };



</script>


@if(!empty(session()->get('serviceSuccess')))
<script type="text/javascript">
  // alert();
  Swal(<?php echo "'".session()->get('serviceSuccess')."'";?>);
</script>
@endif

@if(!empty(session()->get('wishlistLogin')))
<script type="text/javascript">
  // alert();
  Swal(<?php echo "'".session()->get('wishlistLogin')."'";?>);
</script>
@endif

@if(!empty(session()->get('shopSuccess')))
<script type="text/javascript">
  // alert();
  Swal(<?php echo "'".session()->get('shopSuccess')."'";?>);
</script>
@endif


<script type="text/javascript">

  //Frontend Custonmer Registration
  function postRegister(){
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    
    jQuery.ajax({
     url: '/register',
     type: 'POST',
     data: $('#registerCustomer').serialize(),
     success: function (data) {
       
      Swal('Registration Successful');
      setTimeout(function(){
        window.location.href = '/';       
      }, 3000);
      
      
    },
    failure: function (data) {
     Swal('Something Went Wrong');
   }
 });
    
  }


      //For Front end City Nawanshahr
      function showComingSoon(){
        Swal('Coming Soon');
      }

      //For Admin panel - Product page

      function showCitySearch(){
        window.location.href="/?city=Banga";
      }

    </script>

    <script type="text/javascript">

  // Add to Wishlist
  function addToWishlist(id){
    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
    userId = <?php if(!empty(Auth::user()->id)){echo Auth::user()->id;} else {echo 0;}?> ;

    if(userId == 0){
      Swal('Please Login First');
    }
    else{
        // Swal(id);

        jQuery.ajax({
         url: '/add-to-wishlist',
         type: 'POST',
         data: {_token: CSRF_TOKEN, id: id, userId : userId},
         success: function (data) {
           Swal(data.message);         

           
           setTimeout(function(){
             location.reload();       
           }, 1000);

         },
         failure: function (data) {
           Swal(data);
         }
       });
      }
    }

  </script>


  <script type="text/javascript">
  //Confirmation to delete Wishlist Item
  function confirmDelete(id){   
    swal({
      title: "Do you want to remove this product ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        deleteWishlistItem(id);
        
      } 
    });
    
  }



//To Delete Wishlist Item
function deleteWishlistItem(id){
  var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
  user_id = @if(!empty(auth()->user())){{auth()->user()->id}}@else{{'0'}}@endif;
          // alert(id+" / "+user_id);

          jQuery.ajax({
           url: '/delete-wishlist-item',
           type: 'POST',
           data: {_token: CSRF_TOKEN, id: id, user_id : user_id},
           success: function (data) {
               // window.location.href = '/wishlist';
               location.reload();
             },
             failure: function (data) {
               // alert(data.message);
             }
           });
        }

      </script>


      <script type="text/javascript">
  //Confirmation to delete Customer's Address
  function removeAddress(id){   
    swal({
      title: "Do you want to delete this address ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        deleteAddress(id);
        
      } 
    });
    
  }



//To Delete Customer's Address
function deleteAddress(id){
  var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
  
  jQuery.ajax({
   url: '/delete-address',
   type: 'POST',
   data: {_token: CSRF_TOKEN, id: id},
   success: function (data) {
               // window.location.href = '/wishlist';
               location.reload();
             },
             failure: function (data) {
               // alert(data.message);
             }
           });
}





</script>



<script type="text/javascript">
 
  function buyNow(id){
    

    var user_id = <?php echo auth()->user()->id ?? 0 ?>;

    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
        // Swal(id);
        var quantity = jQuery('#quantityPd'+id).val();
        var stock = jQuery('#stock'+id).val();
        var size = jQuery('#productSize'+id).val();
        var weight = jQuery('#productWeight'+id).val();
        var price = jQuery('#productPrice'+id).val();


        if(stock == 'yes'){
          jQuery.ajax({
           url: '/add-to-cart',
           type: 'POST',
           data: {_token: CSRF_TOKEN, id: id, quantity: quantity, product_size : size, product_price : price, weight: weight},
           success: function (data) {
             if(user_id>0){

              window.location.href = '/checkout'
            }
            else{
              window.location.href = '/login'
            }

           // location.reload();
         },
         failure: function (data) {
           Swal(data.message);
         }
       });
        }
        else{
          Swal('Product Out Of Stock.');
        }

      }


// Add to Cart
function addToCart(id){
  var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
        // Swal(id);
        var quantity = jQuery('#quantityPd'+id).val();
        var stock = jQuery('#stock'+id).val();
        var size = jQuery('#productSize'+id).val();
        var weight = jQuery('#productWeight'+id).val();
        var price = jQuery('#productPrice'+id).val();


        if(stock == 'yes'){
          jQuery.ajax({
           url: '/add-to-cart',
           type: 'POST',
           data: {_token: CSRF_TOKEN, id: id, quantity: quantity, product_size : size, product_price : price, weight: weight},
           success: function (data) {
           // Swal(data.cartItem);
           jQuery('#cartCount').html(data.cartItem);

           jQuery('#cartSuccess').text('Product added to cart successfully');
           jQuery("#cartSuccess").hide().slideDown();
           // setTimeout(function(){
            // $("#cartSuccess").hide();        
          // }, 3000);

          location.reload();
        },
        failure: function (data) {
         Swal(data.message);
       }
     });
        }
        else{
          Swal('Product Out Of Stock.');
        }
      }


    </script>

    <script type="text/javascript">
     function getProductWeight(id,weight,mass,price){
      $('#productSize'+id).val($('#productSize'+id).val()+','+weight+mass);
      $('#productPrice'+id).val(price);

    }

    function getProductSize(id,weight,price){
      $('#productSize'+id).val($('#productSize'+id).val()+','+weight);
      $('#productPrice'+id).val(price);

    }
  </script>

  <script type="text/javascript">
   

    function removeProduct(id){

      var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
      
      jQuery.ajax({
       url: '/remove-product',
       type: 'POST',
       data: {_token: CSRF_TOKEN, id: id},
       success: function (data) {
               // alert(data.flag);
               jQuery('#cartCount').html(data.cartItem);
               jQuery('#totalCart').html('Rs. '+data.bill);
               
               jQuery('#div-list'+id).hide();
             },
             failure: function (data) {
               // alert(data.message);
             }
           });

    }

  </script>


  
  <script type="text/javascript">
    function plus(id){
      var productQuantity = $('#productQuantity'+id).val();


      var plusquantityId = parseInt(productQuantity) + 1;

      $('#productQuantity'+id).val(plusquantityId);

      updateCart(id,'plus');

    }

    function minus(id){
      var productQuantity = $('#productQuantity'+id).val();

      if(parseInt(productQuantity)>1){
        var minusquantityId = parseInt(productQuantity) - 1;

        $('#productQuantity'+id).val(minusquantityId);
        updateCart(id,'minus');
      }
      
    }



    function updateCart(id,action){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

     

     $.ajax({
       url: '/update-cart',
       type: 'POST',
       data: {_token: CSRF_TOKEN, id: id, action:action},
       success: function (data) {
         $("#total"+id).empty();
         $("#total"+id).html("RS. " + data.total + ".00");
         
         $("#totalBill").empty();
         $("#totalBill").html("RS. " + data.bill + ".00");

       },
       failure: function (data) {
         alert('Something went wrong');
       }
     });
   }

   function deleteCartProduct(id){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // count--;

    $.ajax({
      /* the route pointing to the post function */
      url: '/cart/delete-product/'+id,
      type: 'POST',
      datatype: 'JSON',
      /* send the csrf-token and the input to the controller */
      data: {_token: CSRF_TOKEN, id: id},
      success: function (data) {
        $('#cartTr'+id).hide();
        
        $('#cartCount').html(data.cartItem);

        $("#totalBill").empty();
        $("#totalBill").html("RS. " + data.bill + ".00");

        if(data.bill <= 0){
          $("#checkoutLink").attr("href", "/");
          $("#checkoutLink").html('Continue Shopping');
        }
      }
    });
  }


</script>



<script type="text/javascript">
  
// Add to Cart
function addToCartWishlist(id){
  var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');
        // Swal(id);
        var quantity = jQuery('#quantityPd'+id).val();
        var stock = jQuery('#stock'+id).val();
        var size = jQuery('#productSize'+id).val();
        var weight = jQuery('#productWeight'+id).val();
        var price = jQuery('#productPrice'+id).val();


        if(stock == 'yes'){
          jQuery.ajax({
           url: '/add-to-cart',
           type: 'POST',
           data: {_token: CSRF_TOKEN, id: id, quantity: quantity, product_size : size, product_price : price, weight: weight},
           success: function (data) {
            
            deleteWishlistItem(id);

           // location.reload();
         },
         failure: function (data) {
           Swal(data.message);
         }
       });
        }
        else{
          Swal('Product Out Of Stock.');
        }
      }


    </script>

    <script type="text/javascript">
      
      function getService(){
        var check = $('#get_category').val();
        if(check == 'Product Based'){
          $('#product').show();
          $('#service').hide();
        }
        else{
          $('#service').show();
          $('#product').hide();
        }
      }


      function getBillAdd(pm){
        $('#billing_add').val(pm);
      }

      function getDelAdd(pm){
        $('#delivery_add').val(pm);
      }


    </script>


    <script type="text/javascript">
      
      function getConfirmPassword(){
        var x = document.getElementById("ConfirmPassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

      function getPassword(){
        var x = document.getElementById("CreatePassword");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }

    </script>