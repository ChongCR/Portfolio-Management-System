<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>
    <div>

        <?php if (session()->get('logged_in')): ?>
            <a href="logout">Logout</a>

            <b><?= session()->get('username') ?></b>
            <b><?= session()->get('email') ?></b>
            <b><?= session()->get('logged_in') ?></b>
            <b><?= session()->get('id') ?></b>

        <?php endif; ?>
    </div>



test
    <?= $this->endSection() ?>