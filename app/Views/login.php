<?= $this->extend('bootstrap_layout'); ?>

<?= $this->section('content'); ?>

<h1>Login</h1>

<form action="<?= site_url('login'); ?>" method="post">
    <div class="row justify-content-md-center">
        <div class="col-sm-2 mt-2">
            <div class="row">
                <div class="mb-3">
                    <div class="text-start">
                        <label for="userName" class="form-label">User Name</label>
                    </div>
                    <input type="text" class="form-control" id="userName" placeholder="admin">
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="text-start">
                        <label for="password" class="form-label">Password</label>
                    </div>
                    <input type="password" class="form-control" id="password" placeholder="******">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-md mt-2">LOGIN</button>
        </div>
    </div>
</form>

<?= $this->endSection(); ?>