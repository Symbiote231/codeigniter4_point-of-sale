<?= $this->extend('bootstrap_layout'); ?>

<?= $this->section('content'); ?>

<div class="d-flex align-items-center justify-content-center flex-grow-1">
    <div class="card p-4 shadow-lg login-card">
        <div class="text-center mb-1">
            <img src="<?= base_url('assets/images/login.svg'); ?>" alt="Login Icon" width="80">
        </div>
        <h1 class="text-center mb-3">Login</h1>

        <!-- Display validation error -->
        <?php if (session()->getFlashdata('error')): ?>
            <div id="errorAlert" class="alert alert-danger fade show" role="alert">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form id="loginForm" action="<?= site_url('login'); ?>" method="post" novalidate>
            <?= csrf_field(); ?> <!-- Add this line for CSRF protection -->
            <div class="mb-3">
                <div class="text-start">
                    <label for="userName" class="form-label">User Name</label>
                </div>
                <input id="userName" name="userName" type="text" class="form-control" placeholder="admin" required>
                <div class="invalid-feedback">
                    Please enter your username.
                </div>
            </div>

            <div class="mb-3">
                <div class="text-start">
                    <label for="password" class="form-label">Password</label>
                </div>
                <input id="password" name="password" type="password" class="form-control" placeholder="******" required>
                <div class="invalid-feedback">
                    Please enter your password.
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100">LOGIN</button>
        </form>
    </div>
</div>

<link href="<?= base_url('assets/css/login.css'); ?>" rel="stylesheet">
<script src="<?= base_url('assets/js/login.js'); ?>"></script>

<?= $this->endSection(); ?>