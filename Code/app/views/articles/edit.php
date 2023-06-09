<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light">
                <h2 class="text-center">Edit Article</h2>
                <p class="text-center mb-4">Please fill out this form to update an article</p>
                <form action="<?php echo URLROOT; ?>/articles/edit" method="POST">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                    <div class="form-group mb-2">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" name="title" value="<?php echo $data['title'] ?>" class="form-control <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>">
                        <?php if (!empty($data['title_error'])) : ?><span class="invalid-feedback"><?php echo $data['title_error'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="body" class="form-label">Content</label>
                        <textarea id="body" name="body" class="form-control <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>" rows="5"><?php echo $data['body'] ?></textarea>
                        <?php if (!empty($data['body_error'])) : ?><span class="invalid-feedback"><?php echo $data['body_error'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tags" class="form-label">Tags</label>
                        <input id="tags-edit" name="tags" value="" class="form-control <?php echo (!empty($data['tags_error'])) ? 'is-invalid' : ''; ?>">
                        <script>
                            var input = document.querySelector('#tags-edit');
                            var tagify = new Tagify(input, {
                                maxTags: 5,
                                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
                            });
                            tagify.addTags(<?php echo $data['tags']; ?>)
                        </script>
                        <?php if (!empty($data['tags_error'])) : ?><span class="invalid-feedback"><?php echo $data['tags_error'] ?></span>
                        <?php endif ?>
                    </div>
                    <?php if (userHasRole('journalist') || userHasRole('editor')) : ?>
                        <div class="form-group mb-2">
                            <label for="status_option" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="draft">Save as Draft</option>
                                <option value="pending_review">Send for Review</option>
                                <?php if (userHasRole('editor')) : ?>
                                    <option value="rejected">Reject</option>
                                    <option value="published">Publish</option>
                                <?php endif ?>
                            </select>
                        </div>
                    <?php endif ?>
                    <div class="col-12 d-flex justify-content-center mt-3 ">
                        <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>