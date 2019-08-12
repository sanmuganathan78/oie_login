<?php 
if($this->session->flashdata('msg')!=''){
    echo '<div class="alert alert-success">
    <strong>'.$this->session->flashdata('msg').'</strong>
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
</div>';
}elseif($this->session->flashdata('msg1')!=''){
    echo '<div class="alert alert-danger">
    <strong>'.$this->session->flashdata('msg1').'</strong>
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
</div>';
}
?>
<!-- <div class="page-wrapper">
    <div class="container-fluid" style="padding: 0px;">
     <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Create TAX</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> -->
                    <form  method="post" action="<?php echo base_url();?>admin/admin_tax/insert">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="inputAddress" class="col-form-label">Tax Type</label>
                                <input type="text" class="form-control" id="taxtype" name="taxtype" >
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="inputAddress" class="col-form-label">@</label>
                                <input type="text" class="form-control" required id="taxname" name="taxname" placeholder="%" onkeypress="return isNumberKey(event)" >
                                <div id="cusname_valid" style="position: absolute;">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress" class="col-form-label">SGST</label>
                                <input type="text" class="form-control taxss" id="customername" name="sgst" placeholder="%"  readonly required >
                                <div id="cusname_valid" style="position: absolute;">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress" class="col-form-label">CGST</label>
                                <input type="text" class="form-control taxss"  id="" name="cgst" placeholder="%" readonly required >
                                <div id="cusname_valid" style="position: absolute;">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputAddress" class="col-form-label">IGST</label>
                                <input type="text"  class="form-control" id="igst" name="igst" placeholder="%" readonly required >
                                <div id="cusname_valid" style="position: absolute;">
                                </div>
                            </div><!-- end card-box -->
                        </div> 
                        <div align="center">
                            <button   style="margin-left: 50px;" class="btn btn-info" name="save" value="save" id="submit">Save</button><button type="reset"  style="margin-left: 7px;" class="btn btn-info" name="print" value="print" id="print">Cancel</button>
                        </div><!-- end col -->
                    </form>
                   <!--  <div class="table-responsive m-t-40">
                        <table id="myTable" class="table">
                            <thead>
                                <tr>
                                    <th>s.No</th>
                                    <th>Tax Type</th>
                                    <th>@</th>
                                    <th>SGST</th>
                                    <th>CGST</th>
                                    <th>IGST</th>                            
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                
                                // foreach ($student as $rows) {
                                    // <td>'.$i++.'</td>
                                    // <td>'.$rows['taxtype'].'</td>
                                    // <td>'.$rows['taxname'].'</td>
                                    // <td>'.$rows['sgst'].'</td>
                                    // <td>'.$rows['cgst'].'</td>
                                    // <td>'.$rows['igst'].'</td>
                                    // <td><a href="'.base_url().'Admin/admin_tax/tax_delete/'.base64_encode($rows['id']).'" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure to delete this tax?\')">
                                    //         Delete <i class="fa fa-trash"></i></a>
                                    //     </td>
                                }
                                ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div> -->