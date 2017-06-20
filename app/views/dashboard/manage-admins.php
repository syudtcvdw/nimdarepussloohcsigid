<div class="manage-wrapper">
  <!--wrapper begin-->
  <div class="row">
    <!--row--->
    <div class="col-lg-12">
      <h3></h3>
    </div>

    <div class="col-md-5 pad">
      <!--col-md-5-add-admin-->
      <!-- /.end of col-md-5 -->
      <div class="panel panel-default">
        <!-- /.panel-default -->
        <div class="panel-heading">
          <h4 class="panel-title">Add Super Admins </h4>
        </div>
        <!-- /.end of panel-heading -->
        <div class="panel-body">
          <!--Panel body-->
          <? if (isset($this->notice)): ?>
            <br>
            <div class="alert alert-<?= $this->error ? 'danger' : 'success' ?> notice">
              <?= $this->notice; ?>
            </div>
          <?php endif; ?>
          <!--form for adding super admin-->
          <p id="info"></p>
          <form class="add-admin-form" action="" method="POST">
            <div class="form-group">
              <label class="control-label sr-only">Fullname</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control" placeholder="Enter Fullname" name="fullname"
                       value="<?= _preserveInputs('fullname'); ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label sr-only">Email Address</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i> </span>
                <input type="email" class="form-control" placeholder="Email address" name="useremail"
                       value="<?= _preserveInputs('useremail'); ?>"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label sr-only">Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="text" class="form-control" placeholder="Password" name="userpass"
                       value="<?= _generate_id() ?>" readonly/>
                <span class="input-group-addon">
                                    <script>var API = "<?= API_PATH ?>"</script>
                                    <a id="pwdgen" class="btn btn-danger"
                                       onclick="window.location('<?= PROJECT_PATH; ?>manage');">Generate</a></span>
              </div>
            </div>
            <div class="form-group">
              <button class="btn btn-primary" type="submit" name="add-super-admin">Add New Super Admin
              </button>
            </div>
          </form>
          <!--end of super admin forms-->
        </div>
        <!--end of panel body -->
      </div>
      <!-- /.end of panel-default -->
    </div>
    <!-- /.end of col-md-5 -->

    <div class="col-md-7 pad">
      <!--col-md-7-- view all admin-->
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h4 class="panel-title">Manage Super Admin Accounts</h4></div>
        <div class="panel-body">
          <table id="admin-table" class="table table-striped table-bordered" cellpadding="2" cellspacing="2">
            <thead>
            <tr>
              <th>S/N</th>
              <th>Fullname</th>
              <th>Email</th>
              <th>Date Created</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if ($this->viewAdmins) : ?>
              <?php $sn = 1; ?>
              <?php foreach ($this->viewAdmins as $admin) : ?>
                <tr>
                  <td> <?= $sn++; ?> </td>
                  <td> <?= $admin->fullname; ?> </td>
                  <td> <?= $admin->useremail; ?> </td>
                  <td> <?= $admin->date_created; ?> </td>
                  <td>
                    <a title="Delete" href="<?= PROJECT_PATH . \App\Core\App::$uri . '/delete/' . $admin->id; ?>"><i
                          class="fa fa-trash"></i></a> &nbsp;
                    <a data-toggle="modal" data-target="#myModal" href="#myModal"
                       data-name="<?= $admin->fullname ?>" data-id="<?= $admin->id ?>"
                       data-path="<?= PROJECT_PATH . \App\Core\App::$uri . '/change-password/' ?>"
                       class="btn btn-warning btn-sm">Reset</a>

                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!--end of col-md-7-view-all-admin-->
  </div>
  <!--row end-->


  <!--Change Password Modal Box-->
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
       aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password For <span
                id="pwd-admin-target"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal change-pswd-form" action="" method="post">
            <div class="form-group" id="spwd">
              <label class="control-label sr-only">Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="Password" name="userpass">
                <span class="input-group-addon"><a href='#'><i class="fa fa-eye"></i></a> </span>
              </div>
            </div>
            <div class="form-group" id="spwd">
              <label class="control-label sr-only">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control" placeholder="Confirm New Password"
                       name="conf_userpass">
                <span class="input-group-addon"><a href='#'><i class="fa fa-eye"></i></a> </span>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="changePassword" class="btn btn-success">Change Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div><!--end of modal-->
</div>
<!--manage-wrapper end-->