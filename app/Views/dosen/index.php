<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('message'); ?>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Dosen::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="overflow-auto m-2">
            <table class="table text-nowrap table-responsive table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Kode Dosen</th>
                        <th>Nama Dosen</th>
                        <th>Status Dosen</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $dosen) : ?>
                        <tr>
                            <td><?= $dosen['kode_dosen'] ?></td>
                            <td><?= $dosen['nama_dosen'] ?></td>
                            <td class="text-center"><span class="badge bg-<?= $dosen['status_dosen'] ? 'success' : 'warning' ?>"><?= $dosen['status_dosen'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Dosen::edit', $dosen['id_dosen']); ?>">Edit</a>
                                <a href="<?= route_to('Dosen::destroy', $dosen['id_dosen']); ?>" class="text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('dosen', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
