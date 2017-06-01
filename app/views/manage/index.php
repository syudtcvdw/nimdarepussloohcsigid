<div class="manage-wrapper"><!--wrapper begin-->
    <div class="row"><!--row--->
        <div class="col-lg-12">
            <span>Manage SuperAdmins</span>
        </div>

            <div class="col-md-5 pad"> <!--col-md-5-add-admin-->
                <!-- /.end of col-md-5 -->
                <div class="panel panel-default">
                    <!-- /.panel-default -->
                    <div class="panel-heading">
                        <h4>Add Super Admins </h4>
                    </div>
                    <!-- /.end of panel-heading -->
                    <div class="panel-body">
                        <!--Panel body-->
                        <!--form for adding super admin-->
                        <form class="form-horizontal" method="post" action="">
                            <div class="form-group">
                                <label class="control-label sr-only">Fullname</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only">Username</label>
                                <input type="text" class="form-control" placeholder="Enter A Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only">Email Address</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email address" name="useremail" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label sr-only">Password</label>
                                <div class="input-group">
                                    <input type="password" value="56788909087" class="form-control" placeholder="Password" name="userpass" required disabled />
                                    <span class="input-group-addon"><button class="btn btn-danger">Generate</button></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="add-super-admin">Add New Super Admin</button>
                            </div>
                        </form>
                        <!--end of super admin forms-->
                    </div>
                    <!--end of panel body -->
                </div>
                <!-- /.end of panel-default -->
            </div>
            <!-- /.end of col-md-5 -->
            <div class="col-md-7 pad"> <!--col-md-7-- view all admin-->
                <div class="panel panel-primary">
                    <div class="panel-heading"><h4>Manage Super Admin Accounts</h4></div>
                    <div class="panel-body">
                        <table id="media-table" class="table table-striped table-bordered" cellpadding="2" cellspacing="2">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Fullname</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <td>1.</td>
                                <td>Falua Temitope O.</td>
                                <td>emmathem</td>
                                <td>faluatemitopeo@gmail.com</td>
                                <td><a href="" ><i class="fa fa-trash"></i></a> &nbsp; <a href="" data-toggle="modal" data-target = "#myModal" ><i class="fa fa-edit"></i> </a></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!--end of col-md-7-view-all-admin-->
    </div><!--row end-->

    <!--Change Password Modal Box-->
    <div  id="myModal" class="modal fade modal-size"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter New Password" name="userpass" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm New Password" name="conf_userpass" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="changePassword" class="btn btn-success">Change Password</button>
                    </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!--manage-wrapper end-->

