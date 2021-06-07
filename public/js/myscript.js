$(document).ready(function () { 

  function validation(name, price, qty){

    var msg = "all fields are required, price and quantity numbers only"
  
    if(name == ""){
    alert(msg);
    return false;
    }
    
    if(price == "" || isNaN(price)){
    alert(msg);
    return false;
    }
  
    if(qty == "" || isNaN(qty)){
    alert(msg);
    return false;
    }
  
  }
 
$('.freeze').click(function(){
    
   var id = $(this).attr('id').substr(6);
   var update_url = "freezeorder/" + id;
   var $thisbutton = $(this);
   var linkid = "addlink" + id;
   $.ajax({
    method: 'PUT',
    url: update_url,
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function(){
       $thisbutton.prop('disabled',true);
       $('#'+linkid).hide();
    }
  })
});

$('.refreshclass').click(function(){
  let item_name = $('#itemname').val();
  let price = $('#price').val();
  let quantity = $('#quantity').val();
  let id = $('input[type=hidden]#order_id').val();
  let _token = $('meta[name="csrf-token"]').attr('content');

  validation(item_name , price, quantity);

  $.ajax({
    method: 'POST',
    url: "/itemcreate",
    data: {
      id: id,
      itemname: item_name,
      quantity: quantity,
      price: price,
      _token: _token
    },
    success:function(response){
      console.log(response);
      setTimeout(function() {
        window.location.href = "/";
      }, 500);

    }
  })
})

$('.clearclass').click(function(){
  let item_name = $('#itemname').val();
  let price = $('#price').val();
  let quantity = $('#quantity').val();
  let id = $('input[type=hidden]#order_id').val();
  let _token = $('meta[name="csrf-token"]').attr('content');

  validation(item_name , price, quantity);

 
  $.ajax({
    method: 'POST',
    url: "/itemcreate",
    data: {
      id: id,
      itemname: item_name,
      quantity: quantity,
      price: price,
      _token: _token
    },
    success:function(response){
      console.log(response);
      $(':input','#itemform')
     .not(':button, :hidden')
     .val('');
      
    }
  })
})


});