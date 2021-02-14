 <!-- App Capsule -->
 <div id="appCapsule">


     <div class="section mt-2 text-center">
         <div class="card ">
             <div class="card-body pt-3 pb-3">
                 <h1 class="mt-2"><small class="text-muted">Learning & Tutorials</small><br /><?= $VideoInfo->title ?></h1>
             </div>
         </div>
     </div>

     <div class="section m-2 p-2">
         <div class="blog-header-info mt-2 mb-2">
             <div>
                 <img src="<?= $assets ?>img/logo-icon.png" alt="img" class="imaged w24 rounded mr-05">
                 by <a href="#">Golojan</a>
             </div>
             <div>
                 <?= date("jS, F Y", strtotime($VideoInfo->title)) ?>
             </div>
         </div>
         <div class="row">
             <div class="card col-12 text-center p-0" style="width: 80%; margin: 0 auto;">
                 <div class="card m-0 p-0">
                     <iframe src="https://www.youtube.com/embed/Q4iKV83fe6w" height="400" frameborder="0" allow=""></iframe>
                 </div>
             </div>
         </div>

     </div>

 </div>
 <!-- * App Capsule -->