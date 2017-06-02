<div class="wrapper create-school container-fluid">
    <div class="table-div">
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
                        <button type="button" class="btn btn-sm btn-danger bn">Reset</button>
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
    </div>

</div>

