 <!-- Menu ajout outils -->
<div class="container" id="addOutils" style="display:none; position: absolute;">

<div class="row ">

    <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4 bg-light">
                 <p style="display: flex; justify-content: right; font-weight: bold;" onclick="closeAddOutils()"> X</p> 
            <div class="card-body bg-light">
                <div class="container">
                    <form id="contact-form" enctype="multipart/form-data"role="form" action="addOutils.php" method="post" >
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_name" id="aj_nom">Nom de l'outils *</label> <input id="nomOutils" type="text" name="name" class="form-control" placeholder="Entrez le nom de votre outils *" required="required" data-error="Firstname is required."> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_lastname"id="aj_marque">Marque</label> <input id="marque" type="text" name="marque" class="form-control" placeholder="Entrez la marque de votre outils" data-error="Lastname is required."> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email"id="aj_garantie">Garantie</label> <input id="garantie" type="number" name="garantie" class="form-control" placeholder="Date de validitée de la garentie" data-error="Entrez une date valide"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_need"id="aj_etat">Etat</label> <select id="etat" name="etat" class="form-control" required="required" data-error="Please specify your need.">
                                            <option id="aj_neuf">Neuf</option>
                                            <option id="aj_bon">Bon état</option>
                                            <option id="aj_mauv">Mauvais état</option>
                                            <option id="aj_nf">Non fonctionel</option>
                                         
                                        </select> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email" id="aj_date">Date d'achat</label> <input id="dateAchat" type="date" name="dateAchat" class="form-control" placeholder="Entrez la date d'achat ici" data-error="Rentrez une date valide"> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email" id="aj_q">Quantitée</label> <input id="quantite" type="number" name="quantite" class="form-control" placeholder="Quantitée "  data-error="Entrez un nombre valide."> </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email" id="aj_photo">Photo</label> <input id="photo" type="text" name="photo" class="form-control" placeholder="URL photo "  data-error="Entrez une url valide."> </div>
                                </div>
                            </div>
						      <!-- ajout fichier  -->
							<div class="mb-3">
                             <label for="screenshot" class="form-label" id="aj_f">Votre fichier</label>
                             <input type="file" class="form-control" id="screenshot" name="fichier" />
                             </div>
							
							
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"> <label for="form_message" id="aj_des">Description complémentaire</label> <textarea id="description" name="description" class="form-control" placeholder="Entrez la description ici" rows="4" data-error="Please, leave us a message."></textarea> </div>
                                </div>
                            </div>
                                <input id="hiddenInput" type="hidden" name="id_boite" class="form-control" placeholder="Quantitée " value="1">
                                <div class="col-md-12"> <input type="submit" id="valid"class="btn btn-success btn-send pt-2 btn-block " value="Send Message"> </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- /.8 -->
    </div> <!-- /.row-->
</div>
</div>


