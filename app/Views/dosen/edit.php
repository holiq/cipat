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

    <a href="<?= url_to('Dosen::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= url_to('Dosen::update', $dosen['id_dosen']) ?>">
                <input type="hidden" name="_method" value="put">

                <div class="mb-4">
                    <label for"kode_dosen">Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" value="<?= $dosen['kode_dosen'] ?>">
                </div>

                <div class="mb-4">
                    <label for"nama_dosen">Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="status_dosen" class="form-control" value="<?= $dosen['nama_dosen'] ?>">
                </div>

                <div class="mb-4">
                    <label for"status_dosen">Status Dosen</label>
                    <select name="status_dosen" id="status_dosen" class="form-control">
                        <option value="0" <?= (! $dosen['kode_dosen']) ? 'selected' : '' ?>>Tidak Aktif</option>
                        <option value="1" <?= ($dosen['status_dosen']) ? 'selected' : '' ?>>Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
