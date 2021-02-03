 <!-- loader -->
 <div id="loader">
     <img src="<?= $assets ?>img/logo-icon.png" alt="icon" class="loading-icon">
 </div>
 <!-- * loader -->

 <!-- App Capsule -->
 <div id="appCapsule">


     <div class="section mt-2 text-center">
         <div class="card">
             <div class="card-body pt-3 pb-3">
                 <img src="<?= $assets ?>img/sample/photo/vector1.jpg" alt="image" class="imaged w-50 ">
                 <h2 class="mt-2">Frequently Asked <br> Questions ?</h2>
             </div>
         </div>
     </div>

     <div class="section mt-2">
         <div class="card overflow-hidden">
             <div class="card-body p-0">
                 <div class="accordion border-0" id="accordionExample1">

                     <div class="item">
                         <div class="accordion-header">
                             <button class="btn collapsed" type="button" data-toggle="collapse"
                                 data-target="#accordion1">
                                 What is Golojan?
                             </button>
                         </div>
                         <div id="accordion1" class="accordion-body collapse" data-parent="#accordionExample1">
                             <div class="accordion-content">
                                 Golojan is an online shopping platform with a network :to drive traffic to the shop,
                                 and enrich participating folks.
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="accordion-header">
                             <button class="btn collapsed" type="button" data-toggle="collapse"
                                 data-target="#accordion3">
                                 Is Golojan secure?
                             </button>
                         </div>
                         <div id="accordion3" class="accordion-body collapse" data-parent="#accordionExample1">
                             <div class="accordion-content">
                                 Yes. Golojan is secured with state of the art security to ensure easy and safe
                                 transactions on the platform.
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="accordion-header">
                             <button class="btn collapsed" type="button" data-toggle="collapse"
                                 data-target="#accordion2">
                                 How can I reach you?
                             </button>
                         </div>
                         <div id="accordion2" class="accordion-body collapse" data-parent="#accordionExample1">
                             <div class="accordion-content">
                                 You can reach us on <a href="#" target="_blank">item's support tab</a>.
                             </div>
                         </div>
                     </div>

                     <div class="item">
                         <div class="accordion-header">
                             <button class="btn collapsed" type="button" data-toggle="collapse"
                                 data-target="#accordion4">
                                 How can I join?
                             </button>
                         </div>
                         <div id="accordion4" class="accordion-body collapse" data-parent="#accordionExample1">
                             <div class="accordion-content">
                                 You can join using an exsisting member's referral link or <a href="/dashboard/register"
                                     target="_blank">Register</a>.
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
         </div>
     </div>


     <div class="section mt-3 mb-3">
         <div class="card bg-primary">
             <div class="card-body text-center">
                 <h5 class="card-title">Still have question?</h5>
                 <p class="card-text">
                     Feel free to contact us
                 </p>
                 <a href="mailto:support@golojan.com" class="btn btn-dark">
                     <ion-icon name="mail-open-outline"></ion-icon> Contact
                 </a>
             </div>
         </div>
     </div>

 </div>
 <!-- * App Capsule -->