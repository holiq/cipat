<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="row justify-content-center min-vh-100">
        <div class="col-12 col-md-8 col-lg-6 my-auto">
            <?php if (! empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <span><?= session()->getFlashdata('message') ?></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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