<div class="row mt-4">

    <?php while ($product = mysqli_fetch_object($Products)) :
        $Category = $Core->CategoryInfo($product->category);
        $StoreInfoProductArray = json_decode($StoreInfo->products);
    ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 my-2">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video->video ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    <?php endwhile; ?>


</div>
