<script type="text/javascript">

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
      $('#shopEmailError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopEmailError').hide();
    }

    if(shopContact == ''){
      $('#shopContactError').show();
      $('#shopContactError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopContactError').hide();
    }

    if(shopCover == ''){
      $('#shopCoverError').show();
      $('#shopCoverError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCoverError').hide();
    }

    if(shopAddress == ''){
      $('#shopAddressError').show();
      $('#shopAddressError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopAddressError').hide();
    }

    if(shopCity == ''){
      $('#shopCityError').show();
      $('#shopCityError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCityError').hide();
    }

    if(shopState == ''){
      $('#shopStateError').show();
      $('#shopStateError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopStateError').hide();
    }

    if(shopCountry == ''){
      $('#shopCountryError').show();
      $('#shopCountryError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopCountryError').hide();
    }

    if(shopPincode == ''){
      $('#shopPincodeError').show();
      $('#shopPincodeError').text('Owner Name is required');
      checkCount=checkCount+1;
    }
    else{
      $('#shopPincodeError').hide();
    }

    if(shopPassword == ''){
      $('#shopPasswordError').show();
      $('#shopPasswordError').text('Owner Name is required');
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

  )

</script>