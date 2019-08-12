
<br>

<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success alert"   data-layout="top" data-type="alert">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?php print_r($msg); ?>
</div>
<?php } ?>



<?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-danger alert"  >
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <?php print_r($msg); ?>
</div>
<?php } ?>
 





<div class="row">
    <div class="col-md-12">
        <div class="widget box">
            <div class="widget-header">
                <h4><i class="icon-reorder"></i>Vat</h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="col-md-4">
                            <a  href="#myModal1"  data-toggle="modal" class="btn btn-default btn-block"><i class="icon-plus"></i>Add Vat</a>
                        </div>
                        <div class="modal fade" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title"> Vat</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="widget box">
                                                    <div class="widget-content">
                                                        <form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>vat/insert" method="post">
                                                           
                                               <!--              <div class="form-group">
                                                                <label class="col-md-3 control-label">VAT<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="vatname" id="vatname" class="form-control required email">
                                                                    <div id="item_valid"></div>
                                                                </div>
                                                            </div> -->
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">VAT %<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="vat" class="form-control required url" id="vat">
                                                                    <div id="vat_valid"></div>
                                                                </div>
                                                            </div>
                                                           
                                                            <div class="form-actions" align="center">
                                                                <button  class="btn btn-primary" id="submit"  >Add Vat</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

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
                <h4><i class="icon-reorder"></i>Vat Details</h4>
                <div class="toolbar no-padding">
                    <div class="btn-group">
                        <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                    </div>
                </div>
            </div>
            <div class="widget-content">
                <table class="table table-striped table-bordered table-hover table-checkable datatable">
                    <thead>
                        <tr>

                            <th>S.No</th>
                            <th>Date</th>
                            <th>Vat %</th>
                            <th>Delete</th>
                       </tr>
                    </thead>
                    <tbody>
         <?php 
                        $i=1;
                        foreach($vat as $it) {

                        echo'<tr>

                            <td>'. $i++.'</td>
                            <td>'. date('d-m-Y',strtotime($it['date'])).'</td>
                            <td>'. $it['vat'].'</td>
                           <td ><a href="'.base_url().'vat/delete/'.$it['id'].'"  onclick="var x=confirm(\'Are you sure want delete  this\'); if(!x){return false};" class="btn btn-danger " >Delete</a></td>


                            </tr>';
                             }?> 


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div> 



<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>

<script type="text/javascript">

$(document).ready(function(){


  $('#submit').click(function(){
          var vat=$('#vat').val();
         
         
          if(vat=='')
          {
            $('#vat').focus();
            $('#vat_valid').html('<div><font color="red">Enter the Vat</font></div>');
            $('#vat').keyup(function(){
              $('#vat_valid').html('');
            });
            return false
          }
                 });
                 });
</script>