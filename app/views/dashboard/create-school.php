<div class="wrapper create-school">
    <div class="body-content">
        <div class="heading">
            <p> Enter School Details </p>
        </div>
        <br/>
        <div class="col-sm-6 col-sm-offset-3 change-input">
            <?php if(isset($this->status)){ ?>
                <div class="alert alert-<?= $this->status == 'error' ? 'danger' : 'success' ?>" > <?= $this->msg; ?> </div>
            <?php } ?>
            <form action="" method="POST">
            <input type="text" name="name" class="form-control" placeholder="School Name" required/>
            <br/>
            <input type="text" name="location" class="form-control" placeholder="School Location" required/>
            <br/>
            <input type="text" name="s_population" class="form-control" placeholder="School Population" required/>
            <br/>
            <input type="text" name="admin_username" class="form-control" placeholder="Admin Username" required/>
            <br/>
            <input type="password" name="admin_password" class="form-control" placeholder="Admin Password" required/>
            <br/>
            <button type="submit" class="btn btn-block submit-button" name="create_school">Submit</button>
            </form>
        </div>
    </div>

</div>