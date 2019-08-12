<br>

<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success col-offset-md-5 alert"   data-layout="top" data-type="alert">
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div>
<?php } ?>



<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn  btn-danger alert"  >
  <a href="#" class="close" data-dismiss="alert">&times;</a>
  <?php print_r($msg); ?>
</div>
<?php } ?> 

<div class="row">

  <div class="col-md-12">
    <div class="widget box">
      <div class="widget-header">
        <h4><i class="icon-reorder"></i>Appoinment</h4>
      </div>
      <div class="widget-content">
        <div class="row">
          <div class="col-md-5">
            <div class="col-md-6">
              <a data-toggle="modal" href="#myModal1" class="btn btn-default btn-block"><i class="icon-plus"></i>Add Appoinment</a>
            </div>
            <div class="modal fade" id="myModal1">
              <div class="modal-dialog">
                <div class="modal-content" style="width: 1164px;margin-left: -260px;">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Appoinment Details</h4>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="widget box">
                          <div class="widget-content">
                            <form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>appoinment/insert" method="post">
                              <div class="form-group">
                                <label class="col-md-1 control-label" style="width:137px;">Appoinment No <span class="required"></span></label>
                                <div class="col-md-3">
                                  <input type="text" name="appoinmentno" style="width:180px;" class="form-control required" value="<?php echo $cusid;?>" readonly>
                                </div>
                                <label class="col-md-2 control-label" style="width: 97px;">Start Date<span class="required">*</span></label>
                                <div class="col-md-2">
                                  <input type="text" name="startdate" class="form-control datepicker" id="startdate" style="width:180px;">
                                  <div id="date_valid"></div>
                                </div>
                                <label class="col-md-1 control-label" style="width:133px;"> Time<span class="required"></span></label>
                                <div class="col-md-3">
                                  <input type="text" name="starttime" class="form-control timepicker-fullscreen"  style="width:180px;">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-md-1 control-label" style="width:137px;">Customer Name<span class="required"></span>*</label>
                                <div class="col-md-2">
                                  <input type="text" name="customername" class="form-control required" id="customername"  style="width:180px;">
                                  <div id="name_valid"></div>
                                </div>
                                <label class="col-md-2 control-label">Duration<span class="required" ></span></label>
                                <div class="col-md-2">
                                  <input type="text" name="duration" class="form-control required"  style="width:180px;">
                                </div>
                                       <label class="col-md-1 control-label" style="width:137px;">Staff Name <span class="required"></span></label>
                                <div class="col-md-2">
                                  <input type="text" name="staffname" id="price" class="form-control required url"  style="width:180px;">
                                  <div id="price_valid"></div>
                                </div>
                        </div>
                              <div class="form-group">
                                <label class="col-md-1 control-label" style="width:137px;">Mobile No<span class="required">*</span></label>
                                <div class="col-md-2">
                                  <input type="text" name="mobileno" id="mobileno" class="form-control required url"  style="width:180px;">
                                  <div id="mobileno_valid"></div>
                                </div>
                            <label class="col-md-2 control-label" >Notes<span class="required"></span></label>
                                <div class="col-md-3">
                                  <textarea type="text" name="notes" class="form-control required"  style="width:180px;"></textarea> 
                                </div>                                
                              </div>
                              <div class="form-actions" align="center">
                                <button  class="btn btn-primary " id="submit"  >Add Appoinment</button><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div> 
      </div> 
    </div> 
  </div> 
</div> 
<div class="row">
  <div class="col-md-12">
    <div class="widget box">
      <div class="widget-header">
        <h4><i class="icon-reorder"></i>Appoinment Reports</h4>
      </div>
      <div class="widget-content">
        <table class="table table-striped table-bordered table-hover table-checkable datatable">
          <thead>
            <tr>

              <th>S.No</th>
              <th>Date</th>
              <th>Appoinment No</th>
              <th>Name</th>
              <th>Mobile No</th>
              <th>start Date</th>
              <th>Start Time</th>
              <th>Staff Name</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            $i=1;
            foreach($app as $it) {?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo date('d-m-Y',strtotime($it['date']));?></td>
              <td><?php echo $it['appoinmentno'];?></td>
              <td><?php echo $it['customername'];?></td>
              <td><?php echo $it['mobileno'];?></td>
              <td><?php echo date('d-m-Y',strtotime($it['startdate']));?></td>
              <td class="hidden-xs"><?php echo date('h:i:A',strtotime($it['starttime']));?></td>
              <td class="hidden-xs"><?php echo $it['staffname'];?></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div> 


<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>




<script type="text/javascript">
  $(document).ready(function(){
    $('#submit').click(function(){
      var startdate=$('#startdate').val();
      var customername=$('#customername').val();
            var mobileno=$('#mobileno').val();

      if(startdate=='')
      {
        $('#startdate').focus();
        $('#date_valid').html('<div><font color="red">Please select the date</font></div>');
        $('#startdate').change(function(){
          $('#date_valid').html('');
        });
        return false
      }

    if(customername=='')
      {
        $('#customername').focus();
        $('#name_valid').html('<div><font color="red">Enter the customer name</font></div>');
        $('#customername').keyup(function(){
          $('#name_valid').html('');
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
    });
  });
  </script>
