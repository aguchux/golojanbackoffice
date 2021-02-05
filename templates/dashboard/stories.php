<div class="section tab-content mt-2 mb-2">
    <div class="table-responsive">
        <table class="table table-bordered rounded">
            <thead>
                <tr>
                    <th scope="col">Stories & News</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($story = mysqli_fetch_object($Stories)) : ?>
                    <tr>
                        <th scope="row">
                            <div class="row card">
                                <div class="col-12 col-sm-12 text-center center">
                                    <a href="app-blog-post.html">
                                        <div class="blog-card">
                                            <img src="<?= $assets ?>img/sample/photo/1.jpg" alt="image" class="imaged w-100">
                                            <div class="text">
                                                <h4 class="title"><?= "{$story->title}" ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>