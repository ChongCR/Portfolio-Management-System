<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>


    <style>

        .file-preview {
            width: fit-content;
        }

        .file-footer-buttons {
            display: none;
        }

        .file-caption-main {
            display: none;
        }

    </style>

    <div class="card-body">
        <h4>Edit Personal Information</h4>
        <div class="white-background-card">
            <form action="<?= base_url('personal-information/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mt-2">
                    <label for="name" class="required">Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="<?= isset($personalInformation) ? $personalInformation['name'] : '' ?>" required>
                </div>
                <div class="form-group mt-2">
                    <label for="description" class="required">Description</label>
                    <textarea class="form-control" id="description" name="description"
                              required><?= isset($personalInformation) ? $personalInformation['description'] : '' ?></textarea>
                </div>
                <div class="form-group mt-2" style="display: flex; gap: 50px;">
                    <div style="display: flex;flex-direction: column; gap: 10px;">
                    <label for="profile_image_path">Profile Image</label>
                    <input type="file" id="profile_image_path" name="profile_image_path" class="file"
                           data-show-upload="false" data-show-caption="true">
                </div>

                    <hr>
                <?php if (isset($personalInformation) && $personalInformation['profile_image_path']): ?>

                    <div style="display: flex;flex-direction: column;gap: 10px;">
                        <label for="existing">Recent Profile Image</label>

                        <img src="<?= base_url('uploads/profile_information/' . $personalInformation['profile_image_path']) ?>"
                             alt="Profile Image" style="max-width: 200px; margin-top: 10px; border-radius: 50%; width: 250px;height: 200px;">
                    </div>
                <?php endif; ?>
        </div>
        <div class="form-group mt-2" style="display: flex; justify-content: end;gap: 10px;">
            <div>
                <a href="<?= base_url('personal-information') ?>" class="btn btn-secondary mt-3">Cancel</a>
                <button type="submit" class="btn btn-primary mt-3"><?= isset($personalInformation) ? 'Update' : 'Create' ?></button>
            </div>
        </div>
        </form>
    </div>
    </div>


    <script>
        $(document).ready(function () {
            $("#profile_image_path").fileinput({
                'showUpload': false,
                'previewFileType': 'any',
                'allowedFileExtensions': ['jpg', 'png'],
                'initialPreviewAsData': true,
            });
        });
    </script>

<?= $this->endSection() ?>