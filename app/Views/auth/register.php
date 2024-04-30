<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container-sm min-vh-100 d-flex flex-column">
    <div class="my-auto">
        <?php if (!empty(session()->getFlashdata('errors'))) : ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="card">
            <div class="card-header">
                <h4>Register</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= url_to('Register::process') ?>">
                    <div class="mb-4">
                        <label for"name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for"username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for"password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for"password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                    </div>

                    <div class="d-flex flex-column">
                        <button type="submit" class="btn btn-primary btn-block">REGISTER</button>
                        <p class="btn mt-2">Already have account? <a href="<?= url_to('Login::index') ?>">Login now!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
