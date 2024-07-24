<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>


    <div class="card-body">
        <h4>Create Project</h4>
        <div class="white-background-card">
            <form action="<?= base_url('project/store') ?>" method="post">
                <div class="form-group">
                    <label for="title" class="required"><?= lang('project.label.title'); ?></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group mt-2">
                    <label for="description" class="required"><?= lang('project.label.description'); ?></label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="date_range" class="required"><?= lang('project.label.date_range'); ?></label>
                    <input type="text" name="daterange" class="form-control"/>
                </div>
                <div class="form-group mt-2">
                    <label for="status"><?= lang('project.label.status'); ?></label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="Ongoing">Ongoing</option>
                        <option value="Completed">Completed</option>
                        <option value="Planned">Planned</option>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="role" class="required"><?= lang('project.label.role'); ?></label>
                    <input type="text" class="form-control" id="role" name="role" required>
                </div>
                <div class="form-group mt-2">
                    <label for="responsibilities"
                           class="required"><?= lang('project.label.responsibilities'); ?></label>
                    <textarea class="form-control" id="responsibilities" name="responsibilities" rows="3"
                              required></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="technologies" class="required"><?= lang('project.label.technologies'); ?></label>
                    <input type="text" class="form-control" id="technologies" name="technologies" required>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <div class="form-group mt-2" style="width: 48%;">
                        <label for="team_size" class="required"><?= lang('project.label.team_size'); ?></label>
                        <input type="number" class="form-control" id="team_size" name="team_size" required>
                    </div>
                    <div class="form-group mt-2" style="width: 48%;">
                        <label for="collaborators" class="required"><?= lang('project.label.collaborators'); ?></label>
                        <input class="form-control" id="collaborators" name="collaborators" required></input>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="repository_link"><?= lang('project.label.repository_link'); ?></label>
                    <input type="url" class="form-control" id="repository_link" name="repository_link">
                </div>
                <div class="form-group mt-2">
                    <label for="live_demo_link"><?= lang('project.label.live_demo_link'); ?></label>
                    <input type="url" class="form-control" id="live_demo_link" name="live_demo_link">
                </div>
                <div class="form-group mt-2 ">
                    <label for="documentation_link"><?= lang('project.label.documentation_link'); ?></label>
                    <input type="url" class="form-control" id="documentation_link" name="documentation_link">
                </div>
                <div class="form-group mt-2" style="display: flex; justify-content: end;gap: 10px;">
                    <a href="<?= base_url('project') ?>"
                       class="btn btn-secondary mt-3"><?= lang('project.label.cancel'); ?></a>
                    <button type="submit" class="btn btn-primary mt-3"><?= lang('project.label.create'); ?></button>
                </div>
            </form>
        </div>

    </div>


    <script>


        $(function () {

            //Form Submit
            $('form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('project/store') ?>',
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
            $('input[name="daterange"]').daterangepicker({
                opens: 'right'
            });
        });


        //Tagify
        window.onload = function () {
            var technologies = document.querySelector('#technologies');
            new Tagify(technologies);
            var collaborators = document.querySelector('#collaborators');
            new Tagify(collaborators);
        }






    </script>
<?= $this->endSection() ?>