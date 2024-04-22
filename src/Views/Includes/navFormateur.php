
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
</head>


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="ml-4 nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
      type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Accueil</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
      role="tab" aria-controls="profile-tab-pane" aria-selected="false">Promotions</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

      <?php include __DIR__ . "/cours.php"; ?>

    <div class="container bg-gray-100 py-3 w-50 p-3 mt-5 mb-5">
      <div class="d-flex justify-content-between">
        <h2>DWWM2 - après midi</h2>
        <p class="fw-semibold"><?php echo date('d/m/Y'); ?></p>
      </div>
      <p>15 participants</p>

      <form class="row g-3">
        <div class="">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <h2 id="codeDisplay" class="text-danger"></h2>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button id="generateCodeBtn" onclick="generateRandomCode('codeDisplay')"
              class="btn btn-primary me-md-2 mt-4" type="button">Valider
              présence</button>
          </div>
        </div>
      </form>
    </div>

    <div class="container bg-gray-100 py-3 w-50 p-3 mt-5 mb-5">
      <div class="d-flex justify-content-between">
        <h2>DWWM2 - matin</h2>
        <p class="fw-semibold"><?php echo date('d/m/Y'); ?></p>
      </div>
      <p>15 participants</p>

      <form class="row g-3">
        <div class="">
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <h2 id="codeDisplay2" class="text-danger"></h2>
          </div>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button onclick="generateRandomCode2('codeDisplay2')" id="generateCodeBtn2"
              class="btn btn-primary me-md-2 mt-4" type="button">
              Valider présence</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php
  include __DIR__ . "/ajouterPromo.php"
    ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./style/js/script.js"></script>

  </body>

  </html>