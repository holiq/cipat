<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Tambah Dosen</h3>
    </div>

    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Dosen::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Dosen::store') ?>">
                <div class="mb-4">
                    <label for"kode_dosen">Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="form-control">
                </div>

                <div class="mb-4">
                    <label for"nama_dosen">Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="status_dosen" class="form-control">
                </div>

                <div class="mb-4">
                    <label for"status_dosen">Status Dosen</label>
                    <select name="status_dosen" id="status_dosen" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="0">Tidak Aktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>