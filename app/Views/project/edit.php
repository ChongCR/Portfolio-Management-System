<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

<div class="card-body">
    <h4>Edit Project</h4>
    <div class="white-background-card">
        <form action="<?= base_url('project/update/' . $project['id']) ?>" method="post">
            <div class="form-group">
                <label for="title" class="required"><?= lang('project.label.title'); ?></label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $project['title'] ?>"
                       required>
            </div>
            <div class="form-group mt-2">
                <label for="description" class="required"><?= lang('project.label.description'); ?></label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          required><?= $project['description'] ?></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="date_range" class="required"><?= lang('project.label.date_range'); ?></label>
                <?php
                $start_date = DateTime::createFromFormat('Y-m-d', $project['start_date'])->format('m/d/Y');
                $end_date = DateTime::createFromFormat('Y-m-d', $project['end_date'])->format('m/d/Y');
                ?>
                <input type="text" name="daterange" class="form-control"
                       value="<?= $start_date . ' - ' . $end_date ?>"/></div>
            <div class="form-group mt-2">
                <label for="status"><?= lang('project.label.status'); ?></label>
                <select class="form-control" id="status" name="status" required>
                    <option value="Ongoing" <?= $project['status'] == 'Ongoing' ? 'selected' : '' ?>>Ongoing</option>
                    <option value="Completed" <?= $project['status'] == 'Completed' ? 'selected' : '' ?>>Completed
                    </option>
                    <option value="Planned" <?= $project['status'] == 'Planned' ? 'selected' : '' ?>>Planned</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="role" class="required"><?= lang('project.label.role'); ?></label>
                <input type="text" class="form-control" id="role" name="role" value="<?= $project['role'] ?>" required>
            </div>
            <div class="form-group mt-2">
                <label for="responsibilities" class="required"><?= lang('project.label.responsibilities'); ?></label>
                <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3"
                          required><?= $project['responsibilities'] ?></textarea>
            </div>
            <div class="form-group mt-2">
                <label for="technologies" class="required"><?= lang('project.label.technologies'); ?></label>
                <input type="text" class="form-control" id="technologies" name="technologies"
                       value="<?= $project['technologies'] ?>" required>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div class="form-group mt-2" style="width: 48%;">
                    <label for="team_size" class="required"><?= lang('project.label.team_size'); ?></label>
                    <input type="number" class="form-control" id="team_size" name="team_size"
                           value="<?= $project['team_size'] ?>" required>
                </div>
                <div class="form-group mt-2" style="width: 48%;">
                    <label for="collaborators" class="required"><?= lang('project.label.collaborators'); ?></label>
                    <input class="form-control" id="collaborators" name="collaborators"
                           value="<?= $project['collaborators'] ?>" required></input>
                </div>
            </div>
            <div class="form-group mt-2">
                <label for="repository_link"><?= lang('project.label.repository_link'); ?></label>
                <input type="url" class="form-control" id="repository_link" name="repository_link"
                       value="<?= $project['repository_link'] ?>" >
            </div>
            <div class="form-group mt-2">
                <label for="live_demo_link"><?= lang('project.label.live_demo_link'); ?></label>
                <input type="url" class="form-control" id="live_demo_link" name="live_demo_link"
                       value="<?= $project['live_demo_link'] ?>" >
            </div>
            <div class="form-group mt-2 ">
                <label for="documentation_link"><?= lang('project.label.documentation_link'); ?></label>
                <input type="url" class="form-control" id="documentation_link" name="documentation_link"
                       value="<?= $project['documentation_link'] ?>">
            </div>
            <div class="form-group mt-2" style="display: flex; justify-content: space-between">

                <div>
                    <a href="#" onclick="confirmDelete('<?= base_url('project/destroy/' . $project['id']) ?>')"
                       class="btn btn-danger mt-3"><?= lang('project.label.delete'); ?></a>
                </div>

                <div>
                    <a href="<?= base_url('project') ?>"
                       class="btn btn-secondary mt-3"><?= lang('project.label.cancel'); ?></a>
                    <button type="submit" class="btn btn-primary mt-3"><?= lang('project.label.update'); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('project/update/' . $project['id']) ?>',
            type: 'post',
            data: $(this).serialize(),
            success: function(data) {
                if (data.validation_errors) {
                    var errors = '';
                    for (var error in data.validation_errors) {
                        errors += data.validation_errors[error] + '<br>';
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errors,
                        confirmButtonColor: "#343A40",
                    });
                } else {
                    window.location.href = '/project';
                }
            }
        });
    });

    //Date Range Picker
    $(function () {
        <?php
        $start_date = DateTime::createFromFormat('Y-m-d', $project['start_date'])->format('m/d/Y');
        $end_date = DateTime::createFromFormat('Y-m-d', $project['end_date'])->format('m/d/Y');
        ?>
        $('input[name="daterange"]').daterangepicker({
            opens: 'right',
            startDate: '<?= $start_date ?>',
            endDate: '<?= $end_date ?>'
        });
    });

    //Tagify
    window.onload = function () {
        var technologies = document.querySelector('#technologies');
        var technologiesData = JSON.parse('<?= $project['technologies'] ?>');
        var technologiesValues = technologiesData.map(function (tag) {
            return tag.value;
        });
        technologies.value = technologiesValues.join(',');
        new Tagify(technologies, {
            whitelist: technologiesValues
        });

        var collaborators = document.querySelector('#collaborators');
        var collaboratorsData = JSON.parse('<?= $project['collaborators'] ?>');
        var collaboratorsValues = collaboratorsData.map(function (tag) {
            return tag.value;
        });
        collaborators.value = collaboratorsValues.join(',');
        new Tagify(collaborators, {
            whitelist: collaboratorsValues
        });
    }

    var deleteUrl = '<?= base_url('project/destroy/' . $project['id']) ?>';

    //Sweet alert delete confirmation
    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this project!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#343A40',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(deleteUrl, {
                    method: 'DELETE',
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: "Deleted!",
                                text: data.message,
                                icon: "success",
                                confirmButtonColor: '#343A40',
                            }).then(() => {
                                window.location.href = '/project';
                            });
                        } else {
                            Swal.fire("Error!", "There was an error deleting the project", "error");
                        }
                    });
            }
        });
    }
</script>

<?= $this->endSection() ?>