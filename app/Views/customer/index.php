<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Customer::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="overflow-auto m-2">
            <table class="table text-nowrap table-responsive table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data as $customer) :?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $customer['name'] ?></td>
                            <td><?= $customer['phone'] ?></td>
                            <td><?= $customer['address'] ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Customer::edit', $customer['id']); ?>">Edit</a>
                                <a href="<?= route_to('Customer::destroy', $customer['id']); ?>" class="text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('customer', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
