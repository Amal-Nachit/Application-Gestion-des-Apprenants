<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="ml-4 nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
      type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Accueil</button>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
    <h3 class="display-8 mt-5 ml-4">Cours du jour</h3>
  </div>

  <div class="container bg-gray-100 py-5 w-50 p-3 mt-5 mb-5">
    <div class="d-flex justify-content-between">
      <h2>DWWM2</h2>
      <p class="fw-semibold"><?php echo date('d/m/Y'); ?></p>
    </div>

    <form class="row g-3">
      <div class="">
        <label for="inputCode" class="form-label">Code *</label>
        <input type="text" class="form-control" id="inputCode" aria-describedby="inputCode"
          placeholder="Tapez votre code ici">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
          <button class="btn btn-primary me-md-2 mt-4" type="button">Valider Présence</button>
        </div>
      </div>
    </form>
    </body>

    </html>