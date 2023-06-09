<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container mb-5 mt-5">
    <h1 class="display-5 fw-bold mb-3">Welcome!</h2>
        <p class="fs-4">Northern Australian Times is a premier news website dedicated to delivering the latest news, stories, and updates from across Northern Australia.
            Our commitment to journalistic integrity and local focus sets us apart as the trusted voice for our community.
            Stay informed and engaged with up-to-date coverage on politics, business, sports, culture, and more.
        </p>
        <a href="<?php echo URLROOT ?>/articles/index"><button class="btn btn-primary btn-lg" type="button">View Articles</button></a>
</div>


<div class="container">

    <h1 class="display-5 fw-bold mb-3">Latest News</h1>
    <div class="row">
        <?php if (empty($data['articles'])) : ?>
            <p class="fs-4">There are no news articles at the moment.</p>
        <?php else : ?>
            <?php foreach ($data['articles'] as $article) : ?>
                <article class="col-md-6 col-lg-4 mb-5 text-center">

                    <a href="<?php echo URLROOT; ?>/articles/display/<?php echo $article->id ?>">
                        <img class="rounded" src="<?php echo URLROOT ?>/img/card-img.svg" alt="Image">
                    </a>

                    <a class="article-title" href="<?php echo URLROOT; ?>/articles/display/<?php echo $article->id ?>">
                        <h3 class="mb-2 mt-2">
                            <?php echo $article->title ?>
                        </h3>
                    </a>
                    <div class="text-secondary mb-2">
                        <span>By <?php echo $article->name ?></span>
                        <span>-</span>
                        <span><?php echo displayDate(($article->created_at)) ?></span>
                    </div>
                    <?php foreach ($article->tags as $tag) : ?>
                        <a href="#" class="badge bg-secondary mt-1">
                            <?php echo $tag->tag_name; ?>
                        </a>
                    <?php endforeach; ?>

                </article>
            <?php endforeach ?>
        <?php endif ?>
    </div>

</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>