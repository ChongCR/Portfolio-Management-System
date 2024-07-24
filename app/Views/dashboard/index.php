<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>


<?php if (session()->get('logged_in')): ?>


    <div class="card-body">

        <h2 style="color:gray">Welcome, <?= session()->get('username') ?>!</h2>

        <hr>
        <div class="white-background-card">

            <p><strong>Username:</strong> <?= session()->get('username') ?></p>
            <p><strong>Email:</strong> <?= session()->get('email') ?></p>
            <p><strong>Logged In:</strong> <?= session()->get('logged_in') ? 'Yes' : 'No' ?></p>
            <p><strong>User ID:</strong> <?= session()->get('id') ?></p>

            <p class="card-text info">This system is used to showcase the projects and experiences that I have. You can
                preview the pages after configuring the systems.</p>


            <a href="<?= base_url('/preview') ?>" class="btn btn-primary">Preview</a>
        </div>
    </div>


<?php endif; ?>



<?= $this->endSection() ?>