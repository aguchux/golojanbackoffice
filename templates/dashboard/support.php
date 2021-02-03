 <!-- App Capsule -->
 <div id="appCapsule">

     <div class="section mt-2 text-center">
         <div class="card">
             <div class="card-body pt-3 pb-3">
                 <h2 class="mt-2">Frequently Asked <br> Questions ?</h2>
             </div>
         </div>
     </div>

     <div class="section mt-2">
         <div class="card overflow-hidden">
             <div class="card-body p-0">


                 <div class="accordion border-0" id="accordionExample1">

                     <?php while ($faq = mysqli_fetch_object($ListFAQs)) : ?>
                         <div class="item">
                             <div class="accordion-header">
                                 <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#accordion_<?= $faq->id ?>">
                                     <?= $faq->faq ?>
                                 </button>
                             </div>
                             <div id="accordion_<?= $faq->id ?>" class="accordion-body collapse" data-parent="#accordionExample1">
                                 <div class="accordion-content">
                                     <?= $faq->answer ?>
                                 </div>
                             </div>
                         </div>
                     <?php endwhile; ?>

                 </div>
             </div>
         </div>
     </div>


     <div class="section mt-3 mb-3">
         <div class="card bg-primary">
             <div class="card-body text-center">
                 <h5 class="card-title">Still have question?</h5>
                 <p class="card-text">
                     Feel free to contact us <strong>support@golojan.com</strong>
                 </p>
                 <a href="mailto:support@golojan.com" class="btn btn-dark">
                     <ion-icon name="mail-open-outline"></ion-icon> Contact
                 </a>
             </div>
         </div>
     </div>

 </div>
 <!-- * App Capsule -->