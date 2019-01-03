<form class="form-inline col-12 connect-header" type="get">
    <div class="form-group mx-sm-1 mb-1">
        <input type="text" class="form-control form-control-sm" name="host" placeholder="address of host" value="<?= $_GET['host']; ?>">
    </div>
    <div class="form-group mx-sm-1 mb-1">
        <input type="text" class="form-control form-control-sm" name="user" placeholder="username" value="<?= $_GET['user']; ?>">
    </div>

    <div class="form-group mx-sm-1 mb-1">
        <input type="password" class="form-control form-control-sm" name="pass" placeholder="password" value="<?= $_GET['pass']; ?>">
    </div>

    <div class="form-group mx-sm-1 mb-1">
        <input type="text" class="form-control form-control-sm" name="db" placeholder="database" value="<?= $_GET['db']; ?>">
    </div>
    <button type="submit" class="btn btn-primary mb-1 btn-sm">connect</button>
</form>

 <?php if ($GLOBALS['error_message'] != "") {
    ?>
            <div class="col-12 alert alert-danger">
              <?= $GLOBALS['error_message']; ?>
            </div>
            <?php
} ?>