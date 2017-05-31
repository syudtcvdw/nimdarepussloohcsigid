<div class="manage-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h4>Manage SuperAdmins</h4>
        </div>
        <p></p><p></p>
        <div class="col-md-5"> <!-- /.end of col-md-5 -->
            <div class="panel panel-default"> <!-- /.panel-default -->
                <div class="panel-heading">Add Super Admins </div><!-- /.end of panel-heading -->
                <div class="panel-body"><!--Panel body-->
                    <form class="form-horizontal" method="post" action="">
                        <div class ="form-group">
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
                                <input type="email" class="form-control" placeholder="Email address" name="txtemail" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label sr-only">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" name="txtpass" required disabled />
                                <span class = "input-group-addon"><button class="btn btn-danger">Generate</button></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit" name="btn-signup">Add New Super Admin</button>
                        </div>
                    </form>
                </div>   <!--end of panel body -->
            </div><!-- /.end of panel-default -->
        </div> <!-- /.end of col-md-5 -->
        <div class="col-md-7">
                <div class="panel panel-primary">
                    <div class="panel-heading">Manage Super Admin Accounts</div>
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

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>