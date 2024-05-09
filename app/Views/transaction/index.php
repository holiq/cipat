<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message') ?>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Transaction::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Customer</th>
                        <th>Tanggal Transaksi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['no_transaction'] ?></td>
                            <td><?= $row['customer_name'] ?></td>
                            <td><?= $row['transaction_date'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-link text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#coll-<?= $row['id'] ?>" aria-expanded="false" aria-controls="coll-<?= $row['id'] ?>">Detail</button>
                                <a href="<?= route_to('Product::edit', $row['id']); ?>" class="btn btn-link">Edit</a>
                                <a href="<?= route_to('Product::destroy', $row['id']); ?>" class="btn btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                        <tr class="collapse multi-collapse" id="coll-<?= $row['id'] ?>">
                            <td></td>
                            <td colspan="4">
                                <div class="row g-2">
                                    <div class="col-3">
                                        <h6>Barang</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Jumalah</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Harga</h6>
                                    </div>
                                    <div class="col-3">
                                        <h6>Total</h6>
                                    </div>
                                    <?php foreach ($row['details'] as $detail) : ?>
                                        <div class="col-3">
                                            <input type="text" class="form-control" value="<?= $detail['product_name'] ?>" readonly>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" value="<?= $detail['qty'] ?>" readonly>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" value="<?= $detail['price'] ?>" readonly>
                                        </div>
                                        <div class="col-3">
                                            <input type="text" class="form-control" value="<?= $detail['amount'] ?>" readonly>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('transaction', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
