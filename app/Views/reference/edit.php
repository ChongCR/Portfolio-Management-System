<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <div class="card-body">
        <h4>Edit Reference</h4>
        <div class="white-background-card">
            <form action="<?= base_url('reference/update/' . $reference['id']) ?>" method="post">
                <div class="form-group mt-2">
                    <label for="name" class="required">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $reference['name'] ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label for="relationship" class="required">Relationship</label>
                    <input type="text" class="form-control" id="relationship" name="relationship" value="<?= $reference['relationship'] ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label for="email" class="required">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $reference['email'] ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label for="phone" class="required">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= $reference['phone'] ?>" required>
                </div>
                <div class="form-group mt-2" style="display: flex; justify-content: space-between;gap: 10px;">

                    <div>
                        <a href="#" class="btn btn-danger mt-3" onclick="event.preventDefault(); confirmDelete('<?= base_url('reference/destroy/' . $reference['id']) ?>')">Delete</a>
                    </div>

                    <div>
                    <a href="<?= base_url('reference') ?>"
                       class="btn btn-secondary mt-3">Cancel</a>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


<script>

    $('form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url('reference/update/' . $reference['id']) ?>',
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
                        text: 'Reference updated successfully',
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


    function confirmDelete(deleteUrl) {
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this reference!",
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
                                window.location.href = '/reference';
                            });
                        } else {
                            Swal.fire("Error!", "There was an error deleting the reference", "error");
                        }
                    });
            }
        });
    }

</script>
<?= $this->endSection() ?>