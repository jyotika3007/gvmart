<script type="text/javascript">




function showProductDiv(){
    // alert()
    $('#ShopCategory').attr('readonly',true);

    $('#shopCategory').show();
}



  // For Dynamic size divs for products
  var count_form = 0;
  function getSizeDiv(){
    var CSRF_TOKEN = $('meta[name="_t"]').attr('content');
    $.ajax({
      type: "post",
      url: "/admin/getMoreFields",
      crossDomain: true,
      data:{ _token: CSRF_TOKEN, show:'page',id: count_form },       
      dataType: 'html',
      success:function(data){
        // alert('yes')
        $('#dynamic-size').append(data);
        count_form++;

      },
      failure:function(data){
       // alert('no')
       $('#dynamic-size').append(data);
     }
   });
  }

  function removeDiv(id){
    $('#sizes_div'+id).hide();
  }

  function deleteSize(id){
    window.location.href = '/admin/delete_size/'+id;
  }




  // For Product Detail For Stock Management

// $('.select2').on('change',function(){
//   var product_id = $('.select2').val();

//   alert(product_id);

//     var CSRF_TOKEN = $('meta[name="_t"]').attr('content');
//     var product_id = $('#product_names'+countProductDiv).val();

//     alert(product_id);
//     $.ajax({
//       type: "post",
//       url: "/admin/getProductDetail",
//       crossDomain: true,
//       data:{ _token: CSRF_TOKEN, show:'page',id: product_id },       
     
//       success:function(data){

//         $('#product_sku'+countProductDiv).val(data.sku);

//       },
//       failure:function(data){
      
//      }
//    });
//   });


  var count_product = 0;
  function getStockDiv(){



  var product_ids = $('#product_ids').val();
  var product_quantity = $('#product_quantity').val();
  var product_price = $('#product_price').val();
  var countStock = 0;



  if(product_ids == ''){
    countStock=countStock+1;
    $('#productError').text('Select product first');
  }
  if(product_quantity == ''){
    countStock=countStock+1;
    $('#productQuantityError').text('Enter quantity first');
  }
  if(product_price == ''){
    countStock=countStock+1;
    $('#productPriceError').text('Enter price first');
  }





  if(countStock == 0){


    var CSRF_TOKEN = $('meta[name="_t"]').attr('content');
    $.ajax({
      type: "post",
      url: "/admin/getMoreStockFields",
      crossDomain: true,
      data:{ _token: CSRF_TOKEN, show:'page',id: count_product },       
      dataType: 'html',
      success:function(data){
        // alert('yes')
        $('#dynamic-stock').append(data);
        count_product++;

      },
      failure:function(data){
       // alert('no')
       $('#dynamic-stock').append(data);
     }
   });

}

  }

  function removeDiv(id){
    $('#stock_div'+id).remove();
  }

  function deleteStock(id){
    window.location.href = '/admin/deleteStock/'+id;
  }




//For Dynamc Weight Divs  For Products

var count_weight = 0;
function getWeightDiv(){
  var CSRF_TOKEN = $('meta[name="_t"]').attr('content');
  $.ajax({
    type: "post",
    url: "/admin/getMoreWeightFields",
    crossDomain: true,
    data:{ _token: CSRF_TOKEN, show:'page',id: count_weight },       
    dataType: 'html',
    success:function(data){
        // alert('yes')
        $('#dynamic-weight').append(data);
        count_weight++;

      },
      failure:function(data){
       // alert('no')
       $('#dynamic-weight').append(data);
     }
   });
}

function removeWeightDiv(id){
  $('#weights_div'+id).hide();
}

function deleteWeight(id){
  window.location.href = '/admin/delete_weight/'+id;
}

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


</script>

<script type="text/javascript">
  
  $('#registerShopButton').on('click',function()
  {
    // alert()
    var shopName = $('#shopName').val();
    var shopOwnerName = $('#shopOwnerName').val();
    var shopEmail = $('#shopEmail').val();
    var shopContact = $('#shopContact').val();
    var shopCover = $('#shopCover').val();
    var shopAddress = $('#shopAddress').val();
    var shopCity = $('#shopCity').val();
    var shopState = $('#shopState').val();
    var shopCountry = $('#shopCountry').val();
    var shopPincode = $('#shopPincode').val();
    var shopPassword = $('#shopPassword').val();
    var checkCount = 0;


    if(shopName == ''){
      $('#shopNameError').show();
      $('#shopNameError').text('Shop Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopNameError').hide();
    }

    if(shopOwnerName == ''){
      $('#shopOwnerNameError').show();
      $('#shopOwnerNameError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopOwnerNameError').hide();
    }

    if(shopEmail == ''){
      $('#shopEmailError').show();
      $('#shopEmailError').text('Email is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopEmailError').hide();
    }

    if(shopContact == ''){
      $('#shopContactError').show();
      $('#shopContactError').text('Contact Number is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopContactError').hide();
    }

    if(shopCover == ''){
      $('#shopCoverError').show();
      $('#shopCoverError').text('Image is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCoverError').hide();
    }

    if(shopAddress == ''){
      $('#shopAddressError').show();
      $('#shopAddressError').text('Address is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopAddressError').hide();
    }

    if(shopCity == ''){
      $('#shopCityError').show();
      $('#shopCityError').text('City Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCityError').hide();
    }

    if(shopState == ''){
      $('#shopStateError').show();
      $('#shopStateError').text('State Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopStateError').hide();
    }

    if(shopCountry == ''){
      $('#shopCountryError').show();
      $('#shopCountryError').text('Country Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCountryError').hide();
    }

    if(shopPincode == ''){
      $('#shopPincodeError').show();
      $('#shopPincodeError').text('PinCode is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopPincodeError').hide();
    }

    if(shopPassword == ''){
      $('#shopPasswordError').show();
      $('#shopPasswordError').text('Password is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopPasswordError').hide();
    }


    if(checkCount>0){
    }
    else{
      $('#sumitShopForm').click();
    }
    
  }

  );









$('#order_type').on('change',function(){
  var order_type = $('#order_type').val();
  // alert(order_type)

  if(order_type == 'all_orders'){
    window.location.href="/admin/orders";
  }
  else{
    window.location.href="/admin/order_list/"+order_type;

  }
})










function isNumberKey(evt)
      {
        
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57)){
          
            return false;
         }

         return true;
      }




$('#bill_no').on('keyup',function(){
  var bill_no = $('#bill_no').val();
  var CSRF_TOKEN = $('meta[name="_t"]').attr('content');
  $.ajax({
    type: "post",
    url: "/admin/checkBillNo",
    crossDomain: true,
    data:{ _token: CSRF_TOKEN, bill_no: bill_no },       
    dataType: 'html',
    success:function(data){
        // alert('yes')
        if(data == 1){
          $('#bill_no_error').text('This bill number already exists');
          $('#create_inventory').attr('disabled',true);
        }
        else{
          $('#bill_no_error').text('');
          $('#create_inventory').attr('disabled',false);
        }

      },
      failure:function(data){
       // alert('no')
       $('#bill_no_error').text('Something went wrong');
     }
   });
});





function handleDiscount(input) {

    if (input.value < 0) {
      input.value = 0;
    }
    if (input.value > 100) {
      input.value = 100;
  }
}


function getPrice(input) {
  
    if (input.value =='') {
      $('#discount').attr('disabled',true);
      $('#discount').val('');
      $('#sale_price').attr('disabled',true);
      $('#sale_price').val('');
    }
    else{
      $('#discount').attr('disabled',false);
      $('#sale_price').attr('disabled',false);
    }
    
}


</script>