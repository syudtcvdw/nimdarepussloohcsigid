<div class="wrapper create-school container-fluid">
    <div class="table-div"> <!--View school table-->
        <table id="media-table" class="table table-striped table-hover table-condensed" cellpadding="2" cellspacing="2">
            <thead>
            <tr>
                <th>S/N</th>
                <th>School</th>
                <th>Location</th>
                <th>Population</th>
                <th>Admin Name</th>
                <th>Admin Password</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($this->allSchools as $sn => $school): ?>
                <tr>
                    <td>
                        <?= $sn + 1; ?>
                    </td>
                    <td>
                        <?= $school['name']; ?>
                    </td>
                    <td>
                        <?= $school['location']; ?>
                    </td>
                    <td>
                        <?= $school['s_population'];?>
                    </td>
                    <td>
                        <?= $school['admin_uname'];?>
                    </td>
                    <td>
                        <a data-toggle="modal" data-target="#passModal" href="#passModal"
                           data-name="<?/*= $admin['fullname'] */?>" data-id="<?/*= $admin['id'] */?>"
                           data-path="<?/*= PROJECT_PATH . \App\Core\App::$uri . '/../' */?>"
                           class = "btn btn-danger btn-sm">Reset</i></a>

                        </a>
                    </td>
                    <td class="no-bottom-padding">
                        <label class="switch">
                            <input type="checkbox" <?= $school['status']? 'checked':'' ?>>
                            <a href="<?= PROJECT_PATH . \App\Core\App::$uri . '/toggle/' .$school['slug']; ?>" class="toggle-school-status slider round"></a>
                        </label>
                    </td>
                </tr>
            <? endforeach; ?>

            </tbody>
        </table>
    </div> <!--end of view school table-->
    <!--Change Password Modal Box-->
    <!-- Modal -->
    <div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Password For <span id="pwd-admin-target"></span></h5>
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
</div><!--end of school container-->

