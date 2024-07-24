<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <div class="card-body">
        <h4>Edit Announcement</h4>
        <div class="white-background-card">
            <form action="<?= base_url('annoucement/update/' . $annoucement['id']) ?>" method="post">
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <br>
                    <div style="display: flex;flex-direction: row;align-items: center; gap: 10px;">
                        <div>
                            <label class="switch">
                                <input type="checkbox" id="status" name="status" <?= $annoucement['status'] ? 'checked' : '' ?>>
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <div>
                            <small id="statusHint"><?= $annoucement['status'] ? 'Show' : 'Hide' ?></small>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label for="title" class="required">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= $annoucement['title'] ?>" required>
                </div>
                <div class="form-group mt-2" style="display: flex; justify-content: end;gap: 10px;">
                    <a href="<?= base_url('annoucement') ?>"
                       class="btn btn-secondary mt-3">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function () {

            $('#status').on('change', function () {
                $('#statusHint').text(this.checked ? 'Show' : 'Hide');
            });

            //Form Submit
            $('form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '<?= base_url('annoucement/update/' . $annoucement['id']) ?>',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.validation_errors || data.error) {
                            var errors = '';
                            if (data.validation_errors) {
                                for (var error in data.validation_errors) {
                                    errors += data.validation_errors[error] + '<br>';
                                }
                            }
                            if (data.error) {
                                errors += data.error;
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                html: errors,
                                confirmButtonColor: "#343A40",
                            });
                        } else {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Announcement updated successfully',
                                confirmButtonColor: "#343A40",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = '/annoucement';
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>

<?= $this->endSection() ?>