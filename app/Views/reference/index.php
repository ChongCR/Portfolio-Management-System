<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <div class="card-body">

        <div style="display: flex; justify-content: space-between">
            <h4> References </h4>
            <a href="<?= base_url('reference/create') ?>" class="btn btn-dark">Create Reference</a>
        </div>

        <div class="white-background-card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Relationship</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($references as $reference): ?>
                    <tr>
                        <td><?= $reference['name'] ?></td>
                        <td><?= $reference['relationship'] ?></td>
                        <td><?= $reference['email'] ?></td>
                        <td><?= $reference['phone'] ?></td>
                        <td>
                            <a href="<?= base_url('reference/edit/' . $reference['id']) ?>">
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