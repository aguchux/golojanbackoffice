 <!-- App Capsule -->
 <div id="appCapsule">

     <div class="section mt-2 text-center">
         <div class="card ">
             <div class="card-body pt-3 pb-3">
                 <h1 class="mt-2">Video Learning & Tutorials</h1>
             </div>
         </div>
     </div>

     <div class="section mt-2 px-4">


         <div class="row">
             <?php while ($videos = mysqli_fetch_object($ListVideos)) : ?>
                 <div class="card col-12 col-sm-6 col-lg-3 col-md-3 col-xs-12 text-center">

                     <div class="card">
                         <div class="card-body pt-3 pb-3">
                             <a href="/dasboard/tutorials/<?= $videos->id ?>/learn">
                                 <img src="<?= $Core->VideoBanner($videos->video) ?>" alt="<?= $videos->title ?>" class="img-responsive img-rounded w-100">
                             </a>
                         </div>
                         <h4 class="card-footer"><?= $videos->title ?></h4>

                     </div>


                 </div>
             <?php endwhile; ?>
         </div>

     </div>

 </div>
 <!-- * App Capsule -->