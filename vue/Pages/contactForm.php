<main id="contactForm">
  <h4 class="title text-center">Nous contacter</h4>

  <section>
    <article>
  <div class="jumbotron col-md-7 my-3 mx-auto">
    <form id="contactForm" action="<?php echo WEBROOT ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Nom</label>
          <input type="text" class="form-control" id="inputEmail4" name="nom" placeholder="Nom">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Prénom</label>
          <input type="text" class="form-control" id="inputEmail4" name="prenom" placeholder="Prénom">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group col-md-12">
        <label for="exampleFormControlTextarea1">Nous écrire</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        <button type="submit" class="btn btn-primary my-3">Envoyer</button>
    </form>
  </div>
    </article>
  </section>
</main>