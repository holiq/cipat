<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container-sm min-vh-100 d-flex flex-column">
    <div class="my-auto">
        <?php if (! empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-success">
                <span><?= session()->getFlashdata('message') ?></span>
            </div>
        <?php endif ?>

        <?php if (! empty(session()->getFlashdata('errors'))) : ?>
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
                <h4>Login</h4>
            </div>
            <div class="card-body">
                <form method="post" action="<?= route_to('Login::process') ?>">
                    <div class="mb-4">
                        <label for"username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for"password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <div class="d-flex flex-column">
                        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                        <p class="btn mt-2">Don't have account? <a href="<?= route_to('Register::index') ?>">Regiter now!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
