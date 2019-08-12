
<br>
<br>
<?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>
<div class="form-control btn btn-success col-offset-md-5 alert"   data-layout="top" data-type="alert">
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
                <h4><i class="icon-reorder"></i>User</h4>
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="col-md-5">
                            <a data-toggle="modal" href="#myModal1" class="btn btn-default btn-block"><i class="icon-user"></i>&nbsp;Create User&nbsp;&nbsp;</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="modal fade" id="myModal1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title">Create User</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="widget box">
                                                    <div class="widget-content">
                                                        <form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>user/insert" method="post">
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Name<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="name" id="name" class="form-control required">
                                                                    <div id="name_valid"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">User Name <span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="username" id="username" class="form-control required email">
                                                                    <div id="username_valid"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Password<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="password" id="password" class="form-control required url">
                                                                    <div id="password_valid"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Mobile No<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="mobileno" id="mobileno" class="form-control required" minlength="5">
                                                                    <div id="mobileno_valid"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-3 control-label">Email<span class="required">*</span></label>
                                                                <div class="col-md-5">
                                                                    <input type="text" name="email" id="email" class="form-control required" minlength="5">
                                                                    <div id="email_valid"></div>
                                                                </div>
                                                            </div>
                                                            <div class="form-actions" align="center">
                                                                <button  class="btn btn-primary" type="submit" name="submit" id="submit"  >Add User</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                <h4><i class="icon-reorder"></i>User Details</h4>
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
                            <th>Name</th>
                            <th>User Name</th>
                            <th>Mobile No</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $i=1;
                        foreach ($user as  $row) 
                            {?>

                        <tr>

                            <td><?php echo $i++;?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['username'];?></td>
                            <td><?php echo $row['mobileno'];?></td>
                            <td><?php echo $row['password'];?></td>

                            <td class="center">
                                <div class="btn-group">
                                    <button type="button" class="btn
                                    btn-info dropdown-toggle waves-effect waves-light"
                                    data-toggle="dropdown" aria-expanded="false">Manage <span
                                    class="caret"></span></button>
                                    <ul class="dropdown-menu"
                                    role="menu" style="background: #1EBFB9 none repeat scroll
                                    0% 0%;width:14px;min-width: 100%;">

                                    <li><a
                                        href="#edit<?php echo $row['id'];?>" class=""
                                        data-animation="fadein" data-plugin="custommodal"
                                        data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
                                        white; font-weight: bold; background-color: #1EBFB9" data-toggle="modal">Edit</a></li>

                                        <li><a
                                            href="#delete<?php echo $row['id'];?>" class=""
                                            data-animation="fadein" data-plugin="custommodal"
                                            data-overlayspeed="100" data-overlaycolor="#36404a" style="color:
                                            white; font-weight: bold; background-color: #1EBFB9;" data-toggle="modal">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            <?php }?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div> 
<?php foreach($user as $row) {?>
<div class="modal fade" id="edit<?php echo $row['id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Create User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget box">
                            <div class="widget-content">
                                <form class="form-horizontal" id="validate-1" action="<?php echo base_url();?>user/update" method="post">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Name<span class="required">*</span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="name" class="form-control required" value="<?php echo $row['name'];?>">
                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">User Name <span class="required">*</span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="username" class="form-control required email" value="<?php echo $row['username'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password<span class="required">*</span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="password" class="form-control required url" value="<?php echo $row['password'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mobile No<span class="required">*</span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="mobileno" class="form-control required" minlength="5" value="<?php echo $row['mobileno'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Email<span class="required"></span></label>
                                        <div class="col-md-5">
                                            <input type="text" name="email" class="form-control required" minlength="5" value="<?php echo $row['email'];?>">
                                        </div>
                                    </div>
                                    <div class="form-actions" align="center">
                                        <button  class="btn btn-primary "  >Update</button>&nbsp;<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<?php }?>
<?php foreach($user as $row) { ?>
<!-- Modal -->
<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" >Delete User</h4>
            </div>
            <div class="modal-body">
                <form name="form" action="<?php echo base_url();?>user/delete" method="post" id="form1">
                    <p align="center">Are you sure To Delete this Details</p>
                    <input type="hidden" value="<?php echo $row['id'];?>" name="id">
                    <div class="col-offset-4" align="center">
                        <input type="submit" name="submit" class='btn btn-primary' value="ok">
                    </div>
                </form>            
            </div>       
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/libs/jquery-1.10.2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#submit').click(function(){
            var name=$('#name').val();
            var username=$('#username').val();
            var password=$('#password').val();
            var mobileno=$('#mobileno').val();
            var email=$('#email').val();
            if(name=='')
            {
                $('#name').focus();
                $('#name_valid').html('<div><font color="red">Enter the name</font></div>');
                $('#name').keyup(function(){
                    $('#name_valid').html('');
                });
                return false;
            }
            if(username=='')
            {
                $('#username').focus();
                $('#username_valid').html('<div><font color="red">Enter the username</font></div>');
                $('#username').keyup(function(){
                    $('#username_valid').html('');
                });
                return false;
            } 
            if(password=='')
            {
                $('#password').focus();
                $('#password_valid').html('<div><font color="red">Enter the password</font></div>');
                $('#password').keyup(function(){
                    $('#password_valid').html('');
                });
                return false;
            }
            if(mobileno=='')
            {
                $('#mobileno').focus();
                $('#mobileno_vaild').html('<div><font color="red">Enter the mobile number</font></div>');
                $('#mobileno').keyup(function(){
                    $('#mobileno_vaild').html('');
                });
                return false;
            }
        });
});
</script>





