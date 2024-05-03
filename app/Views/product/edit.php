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

    <a href="<?= url_to('Product::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= url_to('Product::update', $product['id']) ?>">
                <input type="hidden" name="_method" value="put">

                <div class="mb-4">
                    <label for"name">Nama Barang</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?= $product['name'] ?>">
                </div>

                <div class="mb-4">
                    <label for"stock">Stok Barang</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="<?= $product['stock'] ?>">
                </div>

                <div class="mb-4">
                    <label for"price">Harga Jual</label>
                    <input type="text" name="price" id="price" class="form-control" value="<?= $product['price'] ?>">
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
