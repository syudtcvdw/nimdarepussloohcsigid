<div class="wrapper create-school">
    <div class="body-content">
        <div class="heading">
             Enter School Details
        </div>
        <br/>
        <div class="col-sm-6 col-sm-offset-3 change-input">
            <?php if(isset($this->status)){ ?>
                <div class="alert alert-<?= $this->status == 'error' ? 'danger' : 'success' ?>" > <?= $this->msg; ?> </div>
            <?php } ?>
            <form action="" method="POST" class="form-horizontal">
                <div class="form-group">
                    <label class="sr-only">School Name</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input type="text" name="name" class="form-control" placeholder="School Name" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">School Location</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                        <input type="text" name="location" class="form-control" placeholder="School Location" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">School Population</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sort-numeric-asc"></i></span>
                        <input type="text" name="s_population" class="form-control" placeholder="School Population" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="sr-only">Admin Username</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="admin_username" class="form-control" placeholder="Admin Username" required/>
                    </div>
                </div>
                <div class="form-group" id="spwd">
                    <label class="sr-only">Admin Password</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" name="admin_password" class="form-control" placeholder="Admin Password" required/>
                        <span class="input-group-addon"><a href='#'><i class="fa fa-eye"></i></a> </span>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block submit-button" name="create_school">Submit</button>
                </div>

            </form>
        </div>
    </div>

</div>