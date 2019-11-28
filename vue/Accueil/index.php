 <main id="accueil">
   <h2 class="title text-center">Accueil</h2>

   <section>
     <?php
      //      Message d'accueil personalisé pour l'utilisateur connecté
      if (isset($user)) {
        echo '<h2>Bienvenue ' . $user->getFirstName() . ' ' . $user->getLastName() . '</h2>';
      }
      if (isset($log)) {
        echo $log;
      }
      ?>
     <!----------------------Carousel de photos animant la page d'accueil------------------------------>
     <article>
       <div class="container col-lg-4">
         <div class="align-self-center my-3">
           <div id="carouselExampleControls" name="carousel" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
               <div class="carousel-item active">
                 <img src="<?php echo WEBROOT ?>img/img1.jpg" class="d-block w-90" alt="descriptif visuel de la photo du modèle XY">
               </div>
               <div class="carousel-item">
                 <img src="<?php echo WEBROOT ?>img/img2.jpg" class="d-block w-90" alt="descriptif visuel de la photo du modèle XY">
               </div>
               <div class="carousel-item">
                 <img src="<?php echo WEBROOT ?>img/img3.jpg" class="d-block w-90" alt="descriptif visuel de la photo du modèle XY">
               </div>
               <div class="carousel-item">
                 <img src="<?php echo WEBROOT ?>img/img4.jpg" class="d-block w-90" alt="descriptif visuel de la photo du modèle XY">
               </div>
             </div>
     </article>
     <!-----------Boutons de contrôle du défilement des photos----------------->
     <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Précédente</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Suivante</span>
     </a>
     </div>
     </div>
     </div>
   </section>
 </main>