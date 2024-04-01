<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row justify-content-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 my-auto">
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
                    <form method="post" action="<?= url_to('Login::process') ?>">
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
                            <p class="btn btn-light mt-2">Don't have account? <a href="<?= url_to('Register::index') ?>">Regiter now!</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>