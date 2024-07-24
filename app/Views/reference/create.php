<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <div class="card-body">
        <h4>Create Reference</h4>
        <div class="white-background-card">
            <form action="<?= base_url('reference/store') ?>" method="post">
                <div class="form-group mt-2">
                    <label for="name" class="required">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group mt-2">
                    <label for="relationship" class="required">Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" required>
                </div>
                <div class="form-group mt-2">
                    <label for="email" class="required">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group mt-2">
                    <label for="phone" class="required">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group mt-2" style="display: flex; justify-content: end;gap: 10px;">
                    <a href="<?= base_url('reference') ?>"
                       class="btn btn-secondary mt-3">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-3">Create</button>
                </div>
            </form>
        </div>
    </div>

<script>

    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('reference/store') ?>',
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
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Reference created successfully',
                        confirmButtonColor: "#343A40",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/reference';
                        }
                    });
                }
            }
        });
    });

</script>

<?= $this->endSection() ?>