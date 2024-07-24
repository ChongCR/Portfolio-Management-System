<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <style>
        body {
            background-color: #f0f0f2;
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

        <h4> Activity Logs </h4>

        <div class="white-background-card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Module</th>
                    <th>Method</th>
                    <th>Activity</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($logs as $log): ?>
                    <tr>
                        <td><?= $log['username'] ?></td>
                        <td><?= $log['module'] ?></td>
                        <td><?= $log['method'] ?></td>
                        <td><?= $log['activity'] ?></td>
                        <td><?= $log['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
<?= $this->endSection() ?>