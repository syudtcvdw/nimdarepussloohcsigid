<div class="sidebar">

    <div class="col-md-12 ">
        <button class=" logo">
            <img src="<?= ASSET_PATH ?>logo/logo-icon.png" class="img img-responsive logo-icon" alt="">
            <img src="<?= ASSET_PATH ?>logo/logo-full.png" class="img img-responsive logo-full" alt=""></button>
    </div>

    <div class="col-md-12 ">
        <a class="<?= $this->menu == 0 ? 'active' : '' ?> sidebar-row" href="<?= PROJECT_PATH ?>">
            <img src="<?= ASSET_PATH ?>icons/dashboard-wire-frame.png" height=30px alt=""> <span> Dashboard</span></a>
    </div>

    <div class="col-md-12 ">
        <a class="<?= $this->menu == 1 ? 'active' : '' ?> sidebar-row" href="<?= DASHBOARD_PATH . 'create-school' ?>">
            <img src="<?= ASSET_PATH ?>icons/plus-wire-frame.png" height=30px alt=""> <span> Create School</span></a>
    </div>

    <div class="col-md-12">
        <a class="<?= $this->menu == 2 ? 'active' : '' ?> sidebar-row" href="<?= DASHBOARD_PATH . 'view-schools' ?>">
            <img src="<?= ASSET_PATH ?>icons/list-wire-frame.png" height=30px alt=""> <span> View Schools</span></a>
    </div>

    <div class="col-md-12">
        <a class="<?= $this->menu == 3 ? 'active' : '' ?> sidebar-row" href="<?= DASHBOARD_PATH . 'manage-admins' ?>">
            <img src="<?= ASSET_PATH ?>icons/settings-wire-frame.png" height=30px alt="">
            <span> Manage Admins</span></a>
    </div>

    <div class="col-md-12 ">
        <a class="<?= $this->menu == 4 ? 'active' : '' ?> sidebar-row" href="<?= DASHBOARD_PATH . 'feedback' ?>">
            <img src="<?= ASSET_PATH ?>icons/feedback-wire-frame.png" height=30px alt=""> <span> Feedback</span>
        </a>
    </div>

    <div class="col-md-12 ">
        <a class=" sidebar-row" href="<?= PROJECT_PATH . 'logout' ?>">
            <img src="<?= ASSET_PATH ?>icons/exit-wire-frame.png" height=30px alt=""> <span> Logout</span>
        </a>
    </div>
</div>
