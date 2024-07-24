<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <style>
        body {
            background-color: #f0f0f0;
        }

        table {
            width: 100%;
        }

        thead th {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            vertical-align: middle;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody td {
            text-align: center;
            vertical-align: middle;
        }
    </style>

    <div class="card-body">

        <div style="display: flex; justify-content: space-between">
            <h4> Annoucements </h4>
            <a href="<?= base_url('annoucement/create') ?>" class="btn btn-dark">Create Announcement</a>
        </div>

        <div class="white-background-card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($annoucements as $announcement): ?>
                    <tr>
                        <td><?= $announcement['title'] ?></td>
                        <td>
                            <span class="badge badge-<?= $announcement['status'] ? 'success' : 'danger' ?>">
                                <?= $announcement['status'] ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('annoucement/edit/' . $announcement['id']) ?>">
                                <button class="btn btn-dark">Edit</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
<?= $this->endSection() ?>