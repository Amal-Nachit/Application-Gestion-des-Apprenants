  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <h3 class="display-8 mt-5 ml-10">Édition de la promotion DWWM2</h3>
      <p class="display-8 mt-2 ml-10">les changements appliqués sont définitifs</p>
    </div>
    <div class="container bg-gray-100 p-5 px-6 w-100 mt-5 mb-5">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Nom de la promotion</label>
        <input type="text" class="form-control" id="NomPromo" placeholder="DWWM2">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Date de début</label>
        <input type="date" class="form-control" id="DebutPromo" placeholder="">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Date de fin</label>
        <input type="date" class="form-control" id="FinPromo" placeholder="">
      </div>
      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Place(s) disponible(s)</label>
        <input type="text" class="form-control" id="NbPlaces" placeholder="15">
      </div>
      <div class="d-flex justify-content-between">
        <div>
          <button type="button" class="btn btn-primary">Retour</button>
        </div>
        <div>
          <button type="button" class="btn btn-danger">Supprimer</button>
          <button type="button" id="btnAjouterPromo" class="btn btn-primary" onclick="AjouterPromo()">Sauvegarder</button>
        </div>
      </div>
    </div>
  </div>