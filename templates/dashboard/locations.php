
     <div class="section mt-2 px-4">
         <div class="row">
             <?php while ($location = mysqli_fetch_object($Locations)) : ?>
                 <div class="card col-12 col-sm-6 col-lg-3 col-md-3 col-xs-12 text-center m-2">
                     <div class="card">
                         <div class="card-body pt-3 pb-3">                    
                                 <img src="./_store/flags/<?= "{$location->flag}.png" ?>" alt="<?= $location->location ?>" class="img-responsive img-rounded w-100">
                         </div>
                         <h4 class="card-footer h2"><a class="btn btn-primary btn-block btn-md" href="/dashboard/locations/<?= $location->id ?>/switch"> Switch to <?= $location->location ?></a></h4>
                     </div>
                 </div>
             <?php endwhile; ?>
         </div>
     </div>
