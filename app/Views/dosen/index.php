<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php if(! empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('message'); ?>
                </div>
                <?php endif ?>

                <a href="<?= url_to('Dosen::create') ?>" class="btn btn-md btn-success mb-3">Tambah Data</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Kode Dosen</th>
                            <th>Nama Dosen</th>
                            <th>Status Dosen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $dosen) : ?>
                            <tr>
                                <td><?= $dosen['kode_dosen'] ?></td>
                                <td><?= $dosen['nama_dosen'] ?></td>
                                <td><?= $dosen['status_dosen'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td class="text-center">
                                    <a href="/dosen/edit/<?= $dosen['id_dosen']; ?>">Edit</a>
                                    <a href="/dosen/delete/<?= $dosen['id_dosen']; ?>">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
