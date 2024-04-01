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

            <div class="card">
                <div class="card-body">
                    <h1>Halo <?= session()->get('name') ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>