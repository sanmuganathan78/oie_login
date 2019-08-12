<br>
<link href="<?php echo base_url();?>datepicker/bootstrap-datepicker.css" rel="stylesheet">
<link href="<?php echo base_url();?>datepicker/bootstrap-datepicker.min.css" rel="stylesheet">

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
 <link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">




<style type="text/css">

/*.ui-widget-contents {
  border: 2px solid #AAA;
  border-radius: 3px;
  font-weight: bold;
  color: #000;
  overflow-y: scroll;
  height: 150px;
}*/


  .change
  {
    width:135px;
  }
</style>
<div class="row">
  <div class="col-md-12">
    <div class="widget box">
      <div class="widget-header">
        <h4><i class="icon-reorder"></i>Invoice</h4>
      </div>
      <form class="form-horizontal" method="post" target="_blank" id="form" onsubmit="setTimeout(function () { location.href = '<?php echo base_url();?>invoice'; })"  action="<?php echo base_url();?>invoice/insert">
        <br>
        <br>
        <?php $data=$this->db->get('salesperson_detail')->result();?>
        <div class="form-group">
          <label class="col-md-1 control-label" style="width:101px;">Tax Type</label>
          <div class="col-md-2">
            <select type="text" name="taxtype" id="taxtype"  class="form-control" value="<?php echo $cusid;?>">
              <option value="">Select</option>
              <option value="withtax">With Tax</option>
              <option value="withouttax">Without Tax</option>
            </select>
            <div id="taxtype_valid"></div>
          </div>
          <div id="tax" style="display:none;">
            <label class="col-md-2 control-label">Invoice No:</label>
            <div class="col-md-2">
              <input type="text" name="invoiceno" class="form-control" id="invoiceno" readonly></div></div>
              <label class="col-md-2 control-label">Customer Name:</label>
              <div class="col-md-2">
                <input class="form-control" type="text" name="customername" placeholder="" id="customername">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-1 control-label" style="width:100px;">Mobile No:</label>
              <div class="col-md-2">
                <input class="form-control" type="text" id="mobileno" name="mobileno">
                <div id="mob_valid"></div>
              </div>
              <label class="col-md-2 control-label">Date</label>
              <div class="col-md-2">
                <input class="form-control date" type="text" name="invoicedate" value="<?php echo date("d-m-Y");?>" id="datepicker"></div>
                <label class="col-md-2 control-label">Address:</label>
                <div class="col-md-2"><textarea class="form-control" type="text" name="address" id="address" ></textarea></div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label"  style="width:101px;">Sales Person:</label>
                <div class="col-md-2">
                  <select class="form-control">
                    <option value="">Select</option>
                    <?php foreach($data as $a) {?>
                    <option value="<?php echo $a->personname;?>"><?php echo $a->personname;?></option>
                    <?php }?>
                  </select>					
                </div>
                <label class="col-md-2 control-label">Appoinment No:</label>
                <div class="col-md-2"><input class="form-control" type="text" id="appoinmentno" name="appoinmentno">
                  <div id="mob_valid"></div>
                </div>
              </div>
              <table class="responsive table" width="100%">
                <thead> 
                  <tr>
                    <th>S.No</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Item No</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Category</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Itemname</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price</th>
                    <th>&nbsp;&nbsp;Qty</th>
                    <th>&nbsp;&nbsp;&nbsp;&nbsp;Amount</th>
                  </tr>  
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                 
                      <td><input name="itemno[]" class="form-control change"  id="itemno" style="width:90px;"> 
                      <div id="itemno_valid"></div>
                    </td>
                       <?php $data=$this->db->get('category_details')->result();?>
                    <td>
                    <select name="category[]" class="form-control change"  id="category" style="width:190px;"> 
                    <option value="">Select Category</option>
                        <?php foreach($data as $v){?>
                      <option value="<?php echo $v->category;?>"><?php echo $v->category;?></option>
                      <?php } ?>
                     </select>
                       </td>
                  <td>
                  <select name="itemname[]" class="form-control itemname"  id="itemname" style="width:185px;">
                                    <option value=''>Select itemname</option>
                                  </select>
                      <div id="itemname_valid"></div>
                    </td>
                    <td> <input name="price[]" class="form-control change"  id="price" style="width:100px;" readonly>
                    </td>
                    <td><input name="qty[]" class="form-control change"  id="qty" style="width:65px;">
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
              <div class="col-sm-offset-7">
                <label for="inputPassword"  class="col-lg-5 control-label" style="width:103px;">Sub total</label>  
                <div class="col-sm-8">                              
                  <input type="text"  class="form-control" name="subtotal" id="subtotal" readonly>
                </div> 
              </div>
              <br>
              <br>
              <div id="vat1" style="display:none;"> 
                <?php $data=$this->db->get('vat_detail')->result();?>
                <div class="col-sm-offset-7">
                  <label for="inputPassword"  class="col-lg-3 control-label" style="width:103px;">Vat</label>  
                  <div class="col-sm-3">                              
                    <select  class="form-control" name="vat" id="vat">
                      <option value="">Select</option>
                      <?php foreach($data as $v){?>
                      <option value="<?php echo $v->vat;?>"><?php echo $v->vat;?></option>
                      <?php } ?>
                    </select></div> 
                    <div class="col-sm-5">                              
                      <input type="text"  class="form-control" name="vatamount" id="vatamount"  readonly>
                    </div> 
                  </div>
                  <br>
                  <br>
                </div>
                <div class="col-sm-offset-7">
                  <label for="inputPassword"  class="col-lg-3 control-label" style="width:103px;">Discount</label>  
                  <div class="col-sm-3">                              
                    <input type="text"  class="form-control" name="discount" id="discount" >
                  </div> 
                  <div class="col-sm-5">                              
                    <input type="text"  class="form-control" name="discountamount" id="discount1" readonly>
                  </div> 
                </div>
                <br>
                <br>
                <div class="col-sm-offset-7">
                  <label for="inputPassword"  class="col-lg-5 control-label" style="width:103px;">Adjustment</label> 
                  <div class="col-sm-8">                              
                    <input type="text"  class="form-control" name="adjustment"  id="adjustment">
                  </div> 
                  <br>
                  <br>
                </div>
                <div class="col-sm-offset-7">
                  <label for="inputPassword"  class="col-lg-5 control-label" style="width:103px;">Grand Total</label>  <div class="col-sm-8">                              
                  <input type="text"  class="form-control" name="grandtotal" id="grandtotal" readonly>
                  <input type="hidden"  class="form-control" name="grandtotal1" id="grandtotal1">
                  <input type="hidden"  class="form-control" name="grandtotal2" id="grandtotal2">
                </div> 
              </div>
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div class="col-sm-offset-5">
                <button type="submit" class="btn btn-info"  name="save" value="save" id="save">Save Bill</button>
                <button type="submit" class="btn btn-success" name="print" value="print" id="print">Print Bill</button>
                <button type="reset" class="btn btn-warning">Reset</button>
              </div>
              <br>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
    
   
    <script type="text/javascript">
      $(document).ready(function()
      {
        $('#save').click(function(){
          var taxtype=$('#taxtype').val();
          var mobileno=$('#mobileno').val();
          var itemno=$('#itemno').val();
          var itemname=$('#itemname').val();
          var qty=$('#qty').val();
          if(taxtype=='')
          {
            $('#taxtype').focus();
            $('#taxtype_valid').html('<div><font color="red">Select the tax type</font></div>');
            $('#taxtype').change(function(){
              $('#taxtype_valid').html('');
            });
            return false
          }
          if(mobileno=='')
          {
            $('#mobileno').focus();
            $('#mob_valid').html('<div><font color="red">Enter The Mobile No</font></div>');
            $('#mobileno').keyup(function(){
              $('#mob_valid').html('');
            });
            return false
          }
          if(itemno=='')
          {
            $('#itemno').focus();
            $('#itemno_valid').html('<div><font color="red">Enter the item number</font></div>');
            $('#itemno').keyup(function(){
              $('#itemno_valid').html('');
            });
            return false
          }
          if(itemname=='')
          {
            $('#itemname').focus();
            $('#itemname_valid').html('<div><font color="red">Enter the itemname</font></div>');
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
  var taxtype=$('#taxtype').val();
  var mobileno=$('#mobileno').val();
  var itemname=$('#itemname').val();
  var itemno=$('#itemno').val();
  var qty=$('#qty').val();
  if(taxtype=='')
  {
    $('#taxtype').focus();
    $('#taxtype_valid').html('<div><font color="red">Select the tax type</font></div>');
    $('#taxtype').keyup(function(){
      $('#taxtype_valid').html('');
    });
    return false
  }
  if(mobileno=='')
  {
    $('#mobileno').focus();
    $('#mob_valid').html('<div><font color="red">Enter The Mobile No</font></div>');
    $('#mobileno').keyup(function(){
      $('#mob_valid').html('');
    });
    return false
  }
  if(itemno=='')
  {
    $('#itemno').focus();
    $('#itemno_valid').html('<div><font color="red">Enter the item number</font></div>');
    $('#itemno').keyup(function(){
      $('#itemno_valid').html('');
    });
    return false
  }
  if(itemname=='')
  {
    $('#itemname').focus();
    $('#itemname_valid').html('<div><font color="red">Enter the itemname</font></div>');
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
$('#customername').blur(function(){
  var customername=$('#customername').val();
  $.post('<?php echo base_url();?>invoice/get_customername',{name:customername},function(res){
    var obj=jQuery.parseJSON(res);
    $('#mobileno').val(obj.mobileno);
    $('#address').val(obj.address);
  }); 
});
$('#mobileno').blur(function(){
  var mobileno=$('#mobileno').val();
  $.post('<?php echo base_url();?>invoice/get_mobileno',{name:mobileno},function(res){
    var obj=jQuery.parseJSON(res);
    $('#customername').val(obj.customername);
    $('#address').val(obj.address);
  }); 
});

$('#itemno').blur(function(){
  var itemno=$('#itemno').val();
  $.post('<?php echo base_url();?>invoice/itemno',{name:itemno},function(res){
    var obj=jQuery.parseJSON(res);
     $('#itemname').html(obj.itemname);
     $('#category').val(obj.category);
     $('#price').val(obj.price);
    $('#qty').focus();
  }); 
});

$('#itemname').blur(function(){
  var itemname=$('#itemname').val();
  $.post('<?php echo base_url();?>invoice/itemname',{name:itemname},function(res){
    var obj=jQuery.parseJSON(res);
    $('#price').val(obj.price);
     $('#category').val(obj.category);
     $('#itemno').val(obj.itemno);
    $('#qty').focus();
  }); 
});

$('#category').blur(function(){
  var category=$('#category').val();   
  $.post('<?php echo base_url(); ?>stock/category',{ name:category },function(res){
    $("#itemname option:gt(0)").remove(); 
    $('#itemname').find("option:eq(0)").html("Select itemname ");
    var obj=jQuery.parseJSON(res);
    $(obj).each(function()
    {
      var option = $('<option />');
      option.attr('value', this.value).text(this.label);           
      $('#itemname').append(option);
    });

  });
});


// $('#category').blur(function(){
//   var category=$('#category').val();   
//   $.post('<?php echo base_url(); ?>stock/category',{ name:category },function(res){
//     $("#itemname option:gt(0)").remove(); 
//     $('#itemname').find("option:eq(0)").html("Select itemname ");
//     var obj=jQuery.parseJSON(res);
//     $(obj).each(function()
//     {
//       var option = $('<option />');
//       option.attr('value', this.value).text(this.label);           
//       $('#itemname').append(option);
//     });

//   });
// });


// $('#category').blur(function(){
//   var category=$('#category').val();   
//   $.post('<?php echo base_url(); ?>stock/category',{ name:category },function(res){
//     $(".itemname option:gt(0)").remove(); 
//     $('.itemname').find("option:eq(0)").html("Select itemname ");
//     var obj=jQuery.parseJSON(res);
//     $(obj).each(function()
//     {
//       var option = $('<option />');
//       option.attr('value', this.value).text(this.label);           
//       $('.itemname').append(option);
//     });
//   });
// });

$('#taxtype').change(function(){
  var taxtype=$('#taxtype').val();
  $.post('<?php echo base_url();?>invoice/get_invoiceno',{taxtype:taxtype},function(res){
    $('#invoiceno').val(res);
  });
});
$( "#mobileno").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "<?php echo base_url();?>invoice/get_name",
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
      url: "<?php echo base_url();?>invoice/customername",
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
// $( "#itemname").autocomplete({
//   source: function(request, response) {
//     $.ajax({
//       url: "<?php echo base_url();?>invoice/get_itemname",
//       data: { itemname: $("#itemname").val()},
//       dataType: "json",
//       type: "POST",
//       success: function(data){
// // alert(data);
// response(data);
// }
// });
//   },
// });
$( "#itemno").autocomplete({
  source: function(request, response) {
    $.ajax({
      url: "<?php echo base_url();?>invoice/get_itemno",
      data: { itemno: $("#itemno").val()},
      dataType: "json",
      type: "POST",
      success: function(data){
// alert(data);
response(data);
}
});
  },
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
    $('#grandtotal1').val(total);
  }

  else
  {
     $('#amount').val(0);
    $('#subtotal').val(0);
    $('#grandtotal').val(0);
    $('#grandtotal1').val(0);
  }
});
$('#discount').keyup(function(){
  var discount=$('#discount').val();
  var grandtotal1=$('#grandtotal1').val();
  if(discount >0)
  {
    var dis=(parseFloat(grandtotal1)*parseFloat(discount)/100);
    var  totaldis=dis.toFixed(2);
    $('#discount1').val(totaldis);
    var totaldiscount=parseFloat(grandtotal1)-parseFloat(totaldis);
    var  t=totaldiscount.toFixed(2);
    $('#grandtotal').val(t);
    $('#grandtotal2').val(t);
  } 
  else
  {
    $('#grandtotal').val(grandtotal1);  
    $('#grandtotal2').val(grandtotal1);  
    $('#discount1').val('00');  
  }
})
$('#taxtype').change(function(){
  var taxtype=$('#taxtype').val();
  if(taxtype=='withtax')
  {
    $('#tax').show();
    $('#vat1').show();
  }
  else if(taxtype=='withouttax')
  {
    $('#tax').show();
    $('#vat1').hide();
  }
  else
  {
    $('#tax').hide();
    $('#vat1').hide();
  }
});	
$('#vat').change(function(){
  var vat=$('#vat').val();
  var subtotal=$('#subtotal').val();
  if(vat >0)
  {
    var a=(parseFloat(subtotal)*parseFloat(vat)/100);
    var b=a.toFixed(2);
    $('#vatamount').val(b);
    var x=parseFloat(subtotal)+parseFloat(b);
    var y=x.toFixed(2);
    $('#grandtotal').val(y);
    $('#grandtotal1').val(y);
    $('#grandtotal2').val(y);
  }     
});
$('#adjustment').keyup(function(){
  var adjustment=$('#adjustment').val();
  var grandtotal2=$('#grandtotal2').val();
  if(adjustment > 0)
  {
    var adjustment=parseFloat(grandtotal2)+parseFloat(adjustment);
    var ad=adjustment.toFixed(2);
    $('#grandtotal').val(ad);
  }
  else if(adjustment < 0)
  {
    var x1=parseFloat(grandtotal2)+parseFloat(adjustment);
    var y1=x1.toFixed(2);
    $('#grandtotal').val(y1);
  }
  else
  {
    var grandtotal1=$('#grandtotal2').val();
    $('#grandtotal').val(grandtotal1);
  }
});
$('.add').click(function(){
  var start=$('#hide').val();
  var total=Number(start)+1;
  $('#hide').val(total);
  var tbody=$('#append');			
  $('<tr><td>'+total+'</td><td><input name="itemno[]" class="form-control change"  id="itemno'+total+'" style="width:90px;"><div id="itemno_valid'+total+'"></div></td><?php $data=$this->db->get('category_details')->result();?><td><select name="category[]" class="form-control change"  id="category'+total+'" style="width:190px;"><option value="">Select Category</option><?php foreach($data as $v){?><option value="<?php echo $v->category;?>"><?php echo $v->category;?></option><?php }?></select></td><td><select name="itemname[]" class="form-control"  id="itemname'+total+'" required style="width:185px;"><option value="">Select Item</option></select><div id="itemname_valid'+total+'"></div></td><td><input name="price[]" class="form-control change"  id="price'+total+'" readonly style="width:100px;"></td><td><input name="qty[]" class="form-control change"  id="qty'+total+'" style="width:65px"><div id="qty_valid'+total+'"></div></td><td><input name="amount[]" class="form-control change"  id="amount'+total+'" readonly></td><td><button type="button" class="btn btn-danger remove" style="width:0px;">-</button></td></tr>').appendTo(tbody);
  $('#itemno'+total+'').focus();

  $('.remove').click(function(){
    $(this).parents('tr').remove();
    var tot=0;
    $('input[name^="amount"]').each(function(){
      tot +=Number($(this).val());
      var fina=tot.toFixed(2);
      $('#subtotal').val(fina);
      $('#grandtotal').val(fina);
      $('#grandtotal1').val(fina);
    });
  });
  $( "#itemname"+total+"").autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "<?php echo base_url();?>invoice/get_itemname",
        data: { itemname: $("#itemname"+total+"").val()},
        dataType: "json",
        type: "POST",
        success: function(data){
// alert(data);
response(data);
}
});
    },
  });
  $( "#itemno"+total+"").autocomplete({
    source: function(request, response) {
      $.ajax({
        url: "<?php echo base_url();?>invoice/get_itemno",
        data: { itemno: $("#itemno"+total+"").val()},
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
     $('#category'+total+'').val(obj.category);
     $('#itemno'+total+'').val(obj.itemno);

      $('#qty'+total+'').focus();
    }); 
  });
  $('#itemno'+total+'').blur(function(){
    var itemno=$('#itemno'+total+'').val();
    $.post('<?php echo base_url();?>invoice/itemno',{name:itemno},function(res){
      var obj=jQuery.parseJSON(res);
      $('#itemname'+total+'').val(obj.itemname);
      $('#price'+total+'').val(obj.price);
    $('#itemname'+total+'').html(obj.itemname);
     $('#category'+total+'').val(obj.category);
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
        $('#grandtotal1').val(fina);
        $('#grandtotal2').val(fina);
      });
    }

    else
    {
       $('#amount'+total+'').val(0);
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
    var mobileno=$('#mobileno').val();
    var itemno=$('#itemno'+total+'').val();
    var itemname=$('#itemname'+total+'').val();
    var qty=$('#qty'+total+'').val();
    if(mobileno=='')
    {
      $('#mobileno').focus();
      $('#mob_valid').html('<div><font color="red">Enter The Mobile No</font></div>');
      $('#mobileno').keyup(function(){
        $('#mob_valid').html('');
      });
      return false
    }
    if(itemno=='')
    {
      $('#itemno'+total+'').focus();
      $('#itemno_valid'+total+'').html('<div><font color="red">Enter the item number</font></div>');
      $('#itemno'+total+'').keyup(function(){
        $('#itemno_valid'+total+'').html('');
      });
      return false
    }
    if(itemname=='')
    {
      $('#itemname'+total+'').focus();
      $('#itemname_valid'+total+'').html('<div><font color="red">Enter the itemname</font></div>');
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
  var mobileno=$('#mobileno'+total+'').val();
  var itemno=$('#itemno'+total+'').val();
  var itemname=$('#itemname'+total+'').val();
  var qty=$('#qty'+total+'').val();
  if(mobileno=='')
  {
    $('#mobileno').focus();
    $('#mob_valid').html('<div><font color="red">Enter The Mobile No</font></div>');
    $('#mobileno').change(function(){
      $('#mob_valid').html('');
    });
    return false
  }
  if(itemno=='')
  {
    $('#itemno'+total+'').focus();
    $('#itemno_valid'+total+'').html('<div><font color="red">Enter the item number</font></div>');
    $('#itemno'+total+'').keyup(function(){
      $('#itemno_valid'+total+'').html('');
    });
    return false
  }
  if(itemname=='')
  {
    $('#itemname'+total+'').focus();
    $('#itemname_valid'+total+'').html('<div><font color="red">Enter the itemname</font></div>');
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


$('#category'+total+'').blur(function(){
  var category=$('#category'+total+'').val();   
  $.post('<?php echo base_url(); ?>stock/category',{ name:category },function(res){
    $("#itemname"+total+" option:gt(0)").remove(); 
    $('#itemname'+total+'').find("option:eq(0)").html("Select itemname ");
    var obj=jQuery.parseJSON(res);
    $(obj).each(function()
    {
      var option = $('<option />');
      option.attr('value', this.value).text(this.label);           
      $('#itemname'+total+'').append(option);
    });

  });
});

 // $('#category'+total+'').change(function(){
 //            var itemcode=$('#category'+total+'').val();
          
 //            $.post('<?php echo base_url(); ?>stock/category',{ name:itemcode },function(res){
 //                     $("#itemname"+total+" option:gt(0)").remove(); 
 //                $('#itemname'+total+'').find("option:eq(0)").html("Select itemname ");
 //                var obj=jQuery.parseJSON(res);
 //                $(obj).each(function()
 //                {
 //                    var option = $('<option />');
 //                    option.attr('value', this.value).text(this.label);           
 //                    $('#itemname'+total+'').append(option);
 //                }); 
 //            });
 //          });

});



});
</script>

<script>
    $(document).ready(function(){
      $('.date').datepicker({
    format: "dd-mm-yyyy",
    calendarWeeks: true,
    todayHighlight: true
});
    });
</script>