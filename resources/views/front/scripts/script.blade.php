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
     Swal('Oops...','Something Went Wrong','error');
   }
 });
  });







function isNumberKey(evt)
      {
          

         var charCode = (evt.which) ? evt.which : event.keyCode
         
         if (charCode > 31 && (charCode < 48 || charCode > 57)){
            $('#mobileError').text('Only numeric value allowed');
            return false;
         }
         else{
          $('#mobileError').text('');
         }

         return true;
      }

function isNumberKey1(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)){
            $('#mobileError').text('Only numeric value allowed');
            return false;
         }
         else{
          $('#mobileError').text('');
         }

         return true;
      }









  $('#checkRegistration').on('click',function(){
    var email = $('#customerEmail').val();
    var name = $('#name').val();
    var mobile = $('#CreateMobileNo').val();
    var pass = $('#CreatePassword').val();
    var con_pass = $('#ConfirmPassword').val();

    var checkUser = 0;
    if(email == ''){
      $('#emailError').text('Email is required');
      checkUser=checkUser+1;
    }
    else{
        
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  var res = emailReg.test( email );
  alert(email)
  if(!res){
    //   alert('0')
      $('#emailError').text('Invalid Email');
      checkUser=checkUser+1;
  }
  else{
    //   alert('1')
      $('#emailEmail').text('');
  }
        
        
    }
    
    
    if(mobile == ''){
      $('#mobileError').text('Mobile Number is required');
      checkUser=checkUser+1;
    }
    if(name == ''){
      $('#nameError').text('Name is required');
      checkUser=checkUser+1;
    }
    if(pass == ''){
      $('#passwordError').text('Password is required');
      checkUser=checkUser+1;
    }
    else{
        if(pass.length <8 && pass.length>20){
            $('#passwordError').text('Password length should be in between 8 & 20');
      checkUser=checkUser+1;
        }
    }
    if(con_pass == ''){
      $('#cpasswordError').text('Confirm Password is required');
      checkUser=checkUser+1;
    }
    else{
        if(con_pass.length <8 && con_pass.length>20){
            $('#cpasswordError').text('Password length should be in between 8 & 20');
      checkUser=checkUser+1;
        }
        else{
            if(pass === con_pass){
                $('#cpasswordError').text('');
            }
            else{
                 $('#cpasswordError').text('Password did not match');
                checkUser=checkUser+1;
            }
        }
    }

    if(checkUser == 0){

    var CSRF_TOKEN = jQuery('meta[name="csrf-token"]').attr('content');

      $('#register1').hide();      
      $('#register2').show();      
      
      $('.scroll-top').click();
      
    jQuery.ajax({
     url: '/sendEmailOtp',
     type: 'POST',
     data: { _token:CSRF_TOKEN, email: email },
     success: function (data) {

      
    },
    failure: function (data) {
     Swal('Oops...','Something Went Wrong','error');
   }
 });

}


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
        // Swal('Invalid OTP');
        Swal('Ohh...','Invalid OTP','error');
        $('#email_otp').empty();
      }          
      
    },
    failure: function (data) {
      Swal('Oops...','Something Went Wrong','error');
     // Swal('Something Went Wrong');
   }
 });

  };



</script>


@if(!empty(session()->get('successNewsletter')))
<script type="text/javascript">
  // alert();
  Swal("",<?php echo "'".session()->get('successNewsletter')."'";?>,'success');
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
  Swal('Great',<?php echo "'".session()->get('shopSuccess')."'";?>,'success');
</script>
@endif

@if(!empty(session()->get('message')))
<script type="text/javascript">
  // alert();
  Swal(<?php echo "'".session()->get('message')."'";?>);
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

      Swal("Done",'Registration Successful','success');
      setTimeout(function(){
        window.location.href = '/';       
      }, 3000);
      
      
    },
    failure: function (data) {
      Swal('Oops...','Something Went Wrong','error');
     // Swal('Something Went Wrong');
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
      Swal('Oops...','Please Login First','warning');
    }
    else{
        // Swal(id);

        jQuery.ajax({
         url: '/add-to-wishlist',
         type: 'POST',
         data: {_token: CSRF_TOKEN, id: id, userId : userId},
         success: function (data) {
          Swal('Yeah ',data.message,'success');
           // Swal(data.message);         

           
           setTimeout(function(){
             location.reload();       
           }, 1000);

         },
         failure: function (data) {
           // Swal(data);
           Swal('Oops...',data,'error');
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
           // Swal(data.message);
           Swal('Oops...',data.message,'error');
         }
       });
        }
        else{
           Swal("Sorry", "Product Out Of Stock.", "warning");
          // Swal('Product Out Of Stock.');
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

             if(data=='No'){
              Swal('Ohh...','Cart quantity exceeds the stock limit','warning');
            }
            else{

           // Swal(data.cartItem);
           jQuery('#cartCount').html(data.cartItem);

           jQuery('#cartSuccess').text('Product added to cart successfully');
           jQuery("#cartSuccess").hide().slideDown();
           
           // Swal('Product added to cart successfully.');
           Swal("Great", "Product added to cart successfully.", "success");
           
           let audio = new Audio('/notify/Notification.mp3');
           audio.play();

           setTimeout(function(){
            location.reload();      
          }, 3000);


         }
       },
       failure: function (data) {
         // Swal(data.message);
         Swal('Oops...',data.message,'error');
       }
     });
        }
        else{
           Swal("Sorry", "Product Out Of Stock.", "warning");
          // Swal('Product Out Of Stock.');
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
               $('#cartCount').html(data.cartItem);
               $('#totalCart').html('Rs. '+data.bill);
               
               $('#div-list'+id).remove();
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


      updateCart(id,'plus');

    }

    function minus(id){
      var productQuantity = $('#productQuantity'+id).val();

      if(productQuantity>1){
        updateCart(id,'minus');
      }
      
    }



    function updateCart(id,action){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

     var shippingTotal = $('#shippingTotal').val();

     $.ajax({
       url: '/update-cart',
       type: 'POST',
       data: {_token: CSRF_TOKEN, id: id, action: action, shippingTotal: shippingTotal},
       success: function (data) {
         $("#total"+id).empty();
         $("#total"+id).html("RS. " + data.total + ".00");
         
         $("#subTotal").empty();
         $("#subTotal").html("RS. " + data.subTotal + ".00");

         //   $("#totalShippingCharge").empty();
         // $("#totalShippingCharge").html("RS. " + data.shippingAmount + ".00");

         $("#totalBill").empty();
         $("#totalBill").html("RS. " + data.bill + ".00");
         $('#grand_total').val(data.bill);

       },
       failure: function (data) {
         // alert('Something went wrong');
         Swal('Oops...',data,'error');
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

        location.reload();
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
           // Swal(data.message);
           Swal('Oops...',data.message,'error');
         }
       });
        }
        else{
          Swal('Ohh..','Product Out Of Stock.','warning');
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
          $('#eye2').hide();
          $('#eyed2').show();
        } else {
          x.type = "password";
          $('#eyed2').hide();
          $('#eye2').show();
        }
      }

      function getPassword(){
        var y = document.getElementById("CreatePassword");
        if (y.type === "password") {
          y.type = "text";
          $('#eye1').hide();
          $('#eyed1').show();
        } else {
          y.type = "password";
          $('#eyed1').hide();
          $('#eye1').show();
        }
      }

      function getLoginPassword(){
        var y = document.getElementById("CustomerPassword");
        if (y.type === "password") {
          y.type = "text";
          $('#eye1').hide();
          $('#eyed1').show();
        } else {
          y.type = "password";
          $('#eyed1').hide();
          $('#eye1').show();
        }
      }

    </script>


    <script type="text/javascript">


      $('#quick-view-modal-container').on('show.bs.modal', function (event) {
        $('#quick-view-modal-container img').attr('src',false)

      var button = $(event.relatedTarget) // Button that triggered the modal
      var productId = button.data('myid')
      var modal = $(this)

      // alert(productId);
      // get product details data
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
      $.ajax({
        url: '/get-product_details-data/'+productId,
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        success: function (response) {
          // var responseObj = JSON.parse(data);
          data = response.product;
          images = response.images;
          // image = response.products_images;

          $("#pdName").html(data.name);
          $("#pdName").html(data.name);
          $("#pdSku").html(data.sku);
          $("#pdDescription").html(data.key_features);
          if(data.sale_price){

            $("#pdPrice").html('Rs.'+data.price);
            $("#pdSalePrice").html('Rs. '+data.sale_price);
          }
          else{
            $("#pdSalePrice").html('Rs. '+data.price);

          }
          $("#pdName").attr('href', '/productDetail/'+data.slug);
          

          $(".quickViewProductQuantity").attr('id', 'quantityPd'+data.id);




          $("#mainCoverImage").attr('src', '/storage/'+data.cover);

          // alert(images.length)

          for(i=0;i<images.length;i++){
            ii=parseInt(i)+1;
            $('#myTabContent').append('<div class="tab-pane fade" id="single-slide'+ii+'" role="tabpanel" aria-labelledby="single-slide-tab-'+ii+'"><div class="single-product-img img-full"><img src="storage/'+images[i].src+'" class="img-fluid" alt=""></div></div>');

            $('.slick-track').append('<div class="single-small-image img-full slick-slide slick-current" data-slick-index="'+i+'" aria-hidden="false" tabindex="'+i+'" style="width: 98px;"><a data-toggle="tab" id="single-slide-tab-'+ii+'" href="#single-slide'+ii+'" tabindex="'+i+'"><img src="/storage/'+images[i].src+'" class="img-fluid" alt=""></a></div>');
          }

          // $("#pro2").attr('src', '/'+response.products_images[1]);
          // // $("#pro3").attr('src', '/'+response.products_images[0]);
          // $("#pro4").attr('src', '/'+response.products_images[2]);

          // $("#pro5").attr('src', '/'+response.products_images[0]);
          // $("#pro6").attr('src', '/'+response.products_images[1]);
          // // $("#pro7").attr('src', '/'+response.products_images[0]);
          // $("#pro8").attr('src', '/'+response.products_images[2]);
          // if(data.product_brand)
          //   $("#pdBrand").html('Brand: '+ data.product_brand);
          // $("#pdProductCode").html('Product Code: Product '+ data.id);
          // $("#pdReward").html('Reward Points: '+ data);
          if(data.stock_quantity > 0)
           $("#pdAvailability").html("In Stock");
         else
           $("#pdAvailability").html("Out of Stock");

         $("#pdPeriod").html(data.return_period);

         $("#pdAddToCart").attr('onclick', 'addToCart('+productId+')');
         $("#pdaddToWishlist").attr('onclick', 'addToWishlist('+productId+')');
       }
     });
    })


  </script>


  <script>

    $('.select_coupon').on('change',function(){

      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      
      var selectedCoupon = $('.select_coupon').val();
      var grand_total = $('#grand_total').val();

      jQuery.ajax({
       url: '/getCouponDetail',
       type: 'POST',
       data: {_token: CSRF_TOKEN, coupon_id: selectedCoupon, grand_total: grand_total},
       success: function (data) {

        $('#couponDescription').empty();
        if(data.success == "1"){

          $('#couponDescription').text('Discount: Rs. '+data.discount);
          $('#apply_coupon').attr('disabled',false)
        }
        else{

          $('#couponDescription').text('Not applicable on this order. Applicable on order beetween '+data.discount);
          $('#apply_coupon').attr('disabled',true)
        }

           // location.reload();
         },
         failure: function (data) {
           // Swal(data.message);
           Swal('Oops...',data.message,'error');
         }
       });

    })


  </script>




  <script type="text/javascript">

    function getDeliveryDate(delivery_date){
     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');



     jQuery.ajax({
       url: '/setDeliveryDate',
       type: 'POST',
       data: {_token: CSRF_TOKEN, del_date: delivery_date},
       success: function (data) {


       },
       failure: function (data) {
         // Swal(data.message);
         Swal('Oops...','Something Went Wrong','error');
       }
     });

   }
 </script>



 <script type="text/javascript">


  function getColor(clr){
    $('#filterColor').val(clr);
  }

  function getBrand(brnd){
    $('#filterBrand').val(brnd);
  }

  function getMaterial(mtrl){
    $('#filterMaterial').val(mtrl);
  }

  $('#priceFilter').on('click',function(){
    $('#filterPrice').val($('#price-amount').val())
  })



</script>