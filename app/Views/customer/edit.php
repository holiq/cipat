<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Customer::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Customer::update', $customer['id']) ?>">
                <input type="hidden" name="_method" value="put">

                <div class="mb-4">
                    <label for"name">Nama Customer</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $customer['name'] ?>">
                </div>

                <div class="mb-4">
                    <label for"phone">No HP</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= $customer['phone'] ?>">
                </div>

                <div class="mb-4">
                    <label for"address">Alamat</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= $customer['address'] ?>">
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
