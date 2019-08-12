
<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success col-offset-md-3 alert"   data-layout="top" data-type="alert">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div>
<?php } ?>

<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-danger btn-notification alert"  >
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div>
<?php } ?>
<div class="row">
  <div class="col-md-12">
    <div class="widget box">
      <div class="widget-header">
        <h4><i class="icon-reorder"></i>Purchase</h4>
      </div>
      <?php $data=$this->db->get('addcustomer')->result();?>

      <div class="widget-content">
        <form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>purchase/insert" method="post">
          <div class="form-group">
            <label class="col-md-2 control-label">Purchase No<span class="required"></span></label>
            <div class="col-md-2">
              <input type="text" name="purchaseno" class="form-control required" value="<?php echo $purchaseno;?>"  readonly>
            </div>
            <label class="col-md-2 control-label">Customer Name<span >*</span></label>
            <div class="col-md-2">
            <!--   <select class="select2-select-00 full-width-fix" name="customername" id="customername"  >

                <option value="">Select</option>
                <?php foreach($data as $v){?>
                <option value="<?php echo $v->customername;?>"><?php echo $v->customername;?></option>
                <?php } ?>
              </select> -->
               <input type="text" name="customername" class="form-control datepicker" id="customername">

            </div>
            <div id="customername_valid"></div>
            <label class="col-md-1 control-label">Date<span class="required"></span></label>
            <div class="col-md-2">
              <input type="text" name="purchasedate" class="form-control datepicker" value="<?php echo date('d-m-Y');?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Mobile No<span class="required">*</span></label>
            <div class="col-md-2">
              <input type="text" name="mobileno" id="mobileno" class="form-control required email">
              <div id="mobileno_valid"></div>
            </div>
            <label class="col-md-2 control-label">Supplier Name<span class="required"></span></label>
            <div class="col-md-2">
              <input type="text" name="suppliername" id="mobileno" class="form-control required email">
              <div id="mob_valid"></div>
            </div>
            <label class="col-md-1 control-label">Location<span class="required"></span></label>
            <div class="col-md-2">
              <input type="text" name="location" class="form-control required url">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Address<span class="required"></span></label>
            <div class="col-md-2">
              <textarea type="text" name="address"  id="address" class="form-control required"></textarea>
            </div>
<!--                                   <p class="help-block"><code>data-placeholder="Select a State"</code></p>
-->
</div>
<table class="responsive table" width="100%">
  <thead> 
    <tr>
      <th>S.No</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Itemname</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Qty</th>
      <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
    </tr>  
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td><input name="itemname[]" class="form-control change"  id="itemname" >
        <div id="itemname_valid"></div>
      </td>
      <td><input name="price[]" class="form-control change"  id="price" readonly>
      </td>
      <td><input name="qty[]" class="form-control change"  id="qty">
        <div id="qty_valid"></div>
      </td> 
      <td><input name="amount[]" class="form-control change"  id="amount" readonly>
      </td>
      <td><button type="button" class="btn btn-danger remove" style="width:0px;">-</button></td>
    </tr>
  </tbody> 
  <tbody id="append"></tbody> 
</table>
<div class="col-sm-offset-11">
  <button type="button" class="btn btn-primary add  col-offset-sm-6">+</button>
  <input type="hidden"  id="hide" value="1">
</div>
<br>
<div class="col-sm-offset-8">
  <label for="inputPassword"  class="col-lg-5 control-label" style="width:103px;">Sub total</label>  
  <div class="col-sm-7">                              
    <input type="text"  class="form-control" name="subtotal" id="subtotal" readonly>
  </div> 
</div>
<br><br>
<div class="col-sm-offset-8">
  <label for="inputPassword"  class="col-lg-5 control-label" style="width:103px;">Grand Total</label>  <div class="col-sm-7">                              
  <input type="text"  class="form-control" name="grandtotal" id="grandtotal" readonly>
</div> 
</div>
<br>
<br>
<br>
<div class="form-actions" align="center">
  <button  type="submit" class="btn btn-primary "name="save"   value="save" id="save">Add Purchase</button>
</div>
</form>
</div>
</div>
</div>
</div>

</body>
</html>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#save').click(function(){
      var customername=$('#customername').val();
      var mobileno=$('#mobileno').val();
      var itemname=$('#itemname').val();
      var qty=$('#qty').val();
      if(customername=='')
      {
        $('#customername').focus();
        $('#customername_valid').html('<div><font color="red">Enter the customer name</font></div>');
        $('#customername').keyup(function(){
          $('#customername_valid').html('');
        });
        return false
      }
      if(mobileno=='')
      {
        $('#mobileno').focus();
        $('#mobileno_valid').html('<div><font color="red">Enter the mobile number</font></div>');
        $('#mobileno').keyup(function(){
          $('#mobileno_valid').html('');
        });
        return false
      }
      if(itemname=='')
      {
        $('#itemname').focus();
        $('#itemname_valid').html('<div><font color="red">Enter the item name</font></div>');
        $('#itemname').keyup(function(){
          $('#itemname_valid').html('');
        });
        return false
      }
      if(qty=='')
      {
        $('#qty').focus();
        $('#qty_valid').html('<div><font color="red">Enter the qty</font></div>');
        $('#qty').keyup(function(){
          $('#qty_valid').html('');
        });
        return false
      }
    });
$('#print').click(function(){
  var customername=$('#customername').val();
  var mobileno=$('#mobileno').val();
  var itemname=$('#itemname').val();
  var qty=$('#qty').val();
  if(customername=='')
  {
    $('#customername').focus();
    $('#customername_valid').html('<div><font color="red">Enter the customer name</font></div>');
    $('#customername').keyup(function(){
      $('#customername_valid').html('');
    });
    return false
  }
  if(mobileno=='')
  {
    $('#mobileno').focus();
    $('#mobileno_valid').html('<div><font color="red">Enter the mobile number</font></div>');
    $('#mobileno').keyup(function(){
      $('#mobileno_valid').html('');
    });
    return false
  }
  if(itemname=='')
  {
    $('#itemname').focus();
    $('#itemname_valid').html('<div><font color="red">Enter the item name</font></div>');
    $('#itemname').keyup(function(){
      $('#itemname_valid').html('');
    });
    return false
  }
  if(qty=='')
  {
    $('#qty').focus();
    $('#qty_valid').html('<div><font color="red">Enter the qty</font></div>');
    $('#qty').keyup(function(){
      $('#qty_valid').html('');
    });
    return false
  }
});
$( "#mobileno").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "<?php echo base_url();?>purchase/get_mobileno",
      data: { mobileno: $("#mobileno").val()},
      dataType: "json",
      type: "POST",
      success: function(data){
// alert(data);
response(data);
}
});
  },
});
$( "#customername").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "<?php echo base_url();?>purchase/customername",
      data: { customername: $("#customername").val()},
      dataType: "json",
      type: "POST",
      success: function(data){
// alert(data);
response(data);
}
});
  },
});
$('#customername').blur(function(){
  var customername=$('#customername').val();
  $.post('<?php echo base_url();?>purchase/get_customername',{name:customername},function(res){
    var obj=jQuery.parseJSON(res);
    $('#mobileno').val(obj.mobileno);
    $('#address').val(obj.address);
  }); 

});

$('#mobileno').blur(function(){
  var mobileno=$('#mobileno').val();
  $.post('<?php echo base_url();?>purchase/mobileno',{name:mobileno},function(res){
     var obj=jQuery.parseJSON(res);
      $('#customername').val(obj.customername);
     $('#address').val(obj.address);
  }); 
});
$( "#itemname").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "<?php echo base_url();?>invoice/get_itemname",
      data: { itemname: $("#itemname").val()},
      dataType: "json",
      type: "POST",
      success: function(data){
// alert(data);
response(data);
}
});
  },
});
$('#itemname').blur(function(){
  var itemname=$('#itemname').val();
  $.post('<?php echo base_url();?>invoice/itemname',{name:itemname},function(res){
    var obj=jQuery.parseJSON(res);
    $('#price').val(obj.price);
    $('#vat').val(obj.vat);
    $('#qty').focus();
  }); 
});
$('#qty').keyup(function(){
  var price=$('#price').val();
  var qty=$('#qty').val();
  var vat=$('#vat').val();
  if(price > 0 && qty >0)
  {
    var amount=parseFloat(price)*parseFloat(qty);
    var total=amount.toFixed(2);
    $('#amount').val(total);
    $('#subtotal').val(total);
    $('#grandtotal').val(total);
  }
});
$('.add').click(function(){
  var start=$('#hide').val();
  var total=Number(start)+1;
  $('#hide').val(total);
  var tbody=$('#append');     
  $('<tr><td>'+total+'</td><td><input name="itemname[]" class="form-control change"  id="itemname'+total+'"><div id="item_valid'+total+'"></div></td><td><input name="price[]" class="form-control change"  id="price'+total+'" readonly></td><td><input name="qty[]" class="form-control change"  id="qty'+total+'"><div id="qty_valid'+total+'"></div></td><td><input name="amount[]" class="form-control change"  id="amount'+total+'" readonly></td><td><button type="button" class="btn btn-danger remove" style="width:0px;">-</button></td></tr>').appendTo(tbody);
  $('.remove').click(function(){
    $(this).parents('tr').remove();
    var tot=0;
    $('input[name^="amount"]').each(function(){
      tot +=Number($(this).val());
      var fina=tot.toFixed(2);
      $('#subtotal').val(fina);
      $('#grandtotal').val(fina);
      $('#grandtotal1').val(fina);
      $('#grandtotal2').val(fina);
    });
  });
  $('#qty'+total+'').keyup(function(){
    var rate=$('#rate'+total+'').val();
    var qty=$('#qty'+total+'').val();
    var vat=$('#vat'+total+'').val();
    if(rate > 0 && qty >0)
    {
      var amount=parseFloat(rate)*parseFloat(qty);
      var subtotal=amount.toFixed(2);
      $('#amount'+total+'').val(subtotal);
      var  tot=0;
      $('[name^="amount"]').each(function(){
        tot +=Number($(this).val());
        var fina=tot.toFixed(2);
        $('#subtotal').val(fina);
        $('#grandtotal').val(fina);
        $('#grandtotal1').val(fina);
        $('#grandtotal2').val(fina);
      });
    }
  });
  $('#save').click(function(){
    var itemname=$('#itemname'+total+'').val();
    var qty=$('#qty'+total+'').val();
    if(itemname=='')
    {
      $('#itemname'+total+'').focus();
      $('#itemname_valid'+total+'').html('<div><font color="red">Enter the item name</font></div>');
      $('#itemname'+total+'').keyup(function(){
        $('#itemname_valid'+total+'').html('');
      });
      return false
    }
    if(qty=='')
    {
      $('#qty'+total+'').focus();
      $('#qty_valid'+total+'').html('<div><font color="red">Enter the qty</font></div>');
      $('#qty'+total+'').keyup(function(){
        $('#qty_valid'+total+'').html('');
      });
      return false
    }
  });
  $('#print').click(function(){
    var itemname=$('#itemname').val();
    var qty=$('#qty').val();
    if(itemname=='')
    {
      $('#itemname').focus();
      $('#itemname_valid').html('<div><font color="red">Enter the item name</font></div>');
      $('#itemname').keyup(function(){
        $('#itemname_valid').html('');
      });
      return false
    }
    if(qty=='')
    {
      $('#qty').focus();
      $('#qty_valid').html('<div><font color="red">Enter the qty</font></div>');
      $('#qty').keyup(function(){
        $('#qty_valid').html('');
      });
      return false
    }
  });
  $( '#itemname'+total+'').autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "<?php echo base_url();?>invoice/get_itemname",
        data: { itemname: $('#itemname'+total+'').val()},
        dataType: "json",
        type: "POST",
        success: function(data){
// alert(data);
response(data);
}
});
    },
  });
  $('#itemname'+total+'').blur(function(){
    var itemname=$('#itemname'+total+'').val();
    $.post('<?php echo base_url();?>invoice/itemname',{name:itemname},function(res){
      var obj=jQuery.parseJSON(res);
      $('#price'+total+'').val(obj.price);
      $('#vat'+total+'').val(obj.vat);
      $('#qty'+total+'').focus();
    }); 
  });
  $('#qty'+total+'').keyup(function(){
    var price=$('#price'+total+'').val();
    var qty=$('#qty'+total+'').val();
    if(price > 0 && qty >0)
    {
      var amount=parseFloat(price)*parseFloat(qty);
      var subtotal=amount.toFixed(2);
      $('#amount'+total+'').val(subtotal);
      var  tot=0;
      $('[name^="amount"]').each(function(){
        tot +=Number($(this).val());
        var fina=tot.toFixed(2);
        $('#subtotal').val(fina);
        $('#grandtotal').val(fina);
      });
    }
  });
});
});
</script>
