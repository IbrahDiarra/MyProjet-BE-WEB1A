
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster Two">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua One">
<style>
    
    .ibtexte10{
      font-family: "Lobster", sans-serif;
      color:green;
      font-size: 25px;
    }
    .ibtexte11{
      color:orange;
      font-family: "Lobster", sans-serif;
      font-size: 25px;
    }
   

</style>
<section class="page-section pt-5 mt-2" id="home">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" >
            <div class="carousel-item active" >
                <img src="images/ecole3.jpg" class="d-block imag1" alt="..." >
            </div>
            <div class="carousel-item" >
                <img src="images/ecole6.jpg" class="d-block imag1" alt="..." >
            </div>
            <div class="carousel-item" >
                <img src="images/ecole1.jpg" class="d-block imag1" alt="..." >
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="page-section" id="about" >
    <div class="cardss1" id="about">
        <div class="pt-3">
            <h3 class="ibtexte1">A Propos</h3>
        </div>
        <br>
        <div class="cardss2">
            <div class="presentation">
                <p style="color:black; font-size:17px;">
                <b class="ibtexte10"><span class="ibtexte11">App</span>EPT</b> 
                 est une application web de gestion des activités scolaires qui vise à simplifier et à centraliser les tâches liées à la vie scolaire. 
                Elle favorise l'organisation, la communication et la collaboration entre les étudiants, 
                les enseignants et le personnel administratif, ce qui contribue à une meilleure gestion des activités académiques.
                </p>
                <p style="color:black; font-size:17px;">Elle est conçue pour aider les étudiants, les enseignants et le personnel administratif
                     à organiser leurs activités académiques de manière efficace.
                </p>
                <p style="color:black; font-size:17px;">
                Tableau de bord personnalisé : Chaque utilisateur dispose d'un tableau de bord personnalisé qui affiche un aperçu des activités à venir, des tâches à accomplir et des notifications pertinentes.
                 Cela permet de rester informé des échéances et des événements importants.
                </p>
            </div>
            <div class="imagess">
                <img src="images/ecole5.jpg" class="w-100 h-100" alt="" style="border-radius:5%;">
            </div>
        </div>
    </div>
</section >



<section class="page-section pb-5 mb-5" id="contact">
               <div class="cardss1 pb-3">
                    <div class="pt-3">
                        <h3 class="ibtexte1 text-center">Nous contactez:</h3>
                    </div>
                    <br>
                    <div class="row" contact>
                          <div class="col-lg-5">
                               <div class="imagess">
                                  <img src="images/ecole6.jpg" class="w-100 h-100" alt="" style="border-radius: 15px 0 0 15px;">
                               </div>
                          </div>
                          <div class="col-lg-7 pt-2 pb-2 bg-info" style="border-radius: 0 15px 15px 0; font-family:Lobster;">
                                <div>
                                    <form class="user" id="contactForm">
                                        <div class="ca">
                                            <div class="row">
                                                  <div class="col-md-6">
                                                    <label>Votre Nom</label>
                                                    <div class="input-group mb-4">
                                                          <input class="form-control" placeholder="eg. William"  type="text" id="name" name="name"  required />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 ps-2">
                                                      <label>Objet</label>
                                                      <div class="input-group mb-4">
                                                          <input id="subject" class="form-control" name="subject" type="subject" placeholder="L'objet de votre message *" required />
                                                      </div>
                                                  </div>
                                              </div>
                                              <div>
                                                  <label>Adresse Email</label>
                                                  <div class="input-group">
                                                      <input type="email" class="form-control" placeholder="will@gmail.com" id="email" name="email"  data-sb-validations="required,email" />
                                                  </div>
                                              </div>
                                              <div class="form-group mt-4">
                                                <label>Votre message</label>
                                                <textarea class="form-control" id="message" name="message" placeholder="Votre message *" required></textarea>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12">
                                                      <button class="btn bg-primary mt-3" id="submitButton" style="color:black; font-family:Patua One;" type="submit">Envoyer votre message</button>
                                                  </div>
                                              </div>
                                        </div>
                                    </form>
                              </div>
                          </div>
                    </div> 
                </div> 
</section>