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

        .description-column {
            text-align: left;
            width: 40%;
            font-size: 0.8rem;
            line-height: 150%;
        }

    </style>

    <div class="card-body">

        <div style="display: flex; justify-content: space-between">
            <h4> Projects </h4>
            <a href="<?= base_url('project/create') ?>" class="btn btn-dark">Create Project</a>
        </div>

        <div class="white-background-card">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Team Size</th>
                    <th>Repository Link</th>
                    <th>Live Demo Link</th>
                    <th>Documentation Link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach (json_decode($projects, true)['data'] as $project): ?>
                    <tr>
                        <td style="width: 10%;"><?= $project['title'] ?></td>
                        <td class="description-column"><?= $project['description'] ?></td>
                        <td><?= $project['team_size'] ?></td>
                        <?php foreach (['repository_link', 'live_demo_link', 'documentation_link'] as $link): ?>
                            <td>
                                <?php if (!empty($project[$link])): ?>
                                    <a href="<?= $project[$link] ?>" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="#13bbfb" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M18 14v5a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8c0-1.1.9-2 2-2h5M15 3h6v6M10 14L20.2 3.8"/>
                                            </g>
                                        </svg>
                                    </a>
                                <?php else: ?>
                                    N/A
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                        <?php
                        $status_badge_classes = [
                            'Completed' => 'success',
                            'In Progress' => 'warning',
                            'On Hold' => 'secondary',
                        ];
                        $badge_class = $status_badge_classes[$project['status']] ?? 'danger';
                        ?>
                        <td>
                            <span class="badge badge-<?= $badge_class ?>"><?= $project['status'] ?></span>
                        </td>
                        <td>
                            <a href="<?= base_url('project/edit/' . $project['id']) ?>">
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