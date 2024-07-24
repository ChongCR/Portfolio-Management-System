<?= $this->extend('layout/master_layout') ?>

<?= $this->section('content') ?>

    <div class="card-body">

        <h4> Settings </h4>

        <div class="white-background-card">
            <form action="/settings/update" method="post">
                <div class="form-group">
                    <label for="language">Language</label>
                    <select class="form-control" id="language" name="language">
                        <option value="english">English</option>
                        <option value="chinese">Chinese</option>
                        <option value="malay">Malay</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark">Save</button>
            </form>
        </div>

    </div>

<?= $this->endSection() ?>