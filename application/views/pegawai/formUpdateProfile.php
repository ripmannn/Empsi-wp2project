<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <?= $this->session->flashdata('upload_error') ?>
    <div class="card" >
        <div class="card-body">
            <?php foreach ($pegawai as $p) : ?>
                <form method="post" action="<?= base_url('pegawai/dashboard/updateDataAksi') ?>" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_pegawai" id="id_pegawai" class="form-control" value="<?= $p->id_pegawai ?>">
                    </div>

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $p->username ?>">
                        <?= form_error('username', '<div class="text-small text-danger" >', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai</label>
                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" value="<?= $p->nama_pegawai ?>">
                        <?= form_error('nama_pegawai', '<div class="text-small text-danger" >', '</div>') ?>
                    </div>

                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="photo" class="form-control" >
                        <?= form_error('photo', '<div class="text-small text-danger" >', '</div>') ?>
                    </div>

                    <a class="btn btn-warning" href="<?= base_url('pegawai/dashboard') ?>">Back</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>

</div>