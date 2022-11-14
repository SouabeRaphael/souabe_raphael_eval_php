<!-- appel du header et de la navbar -->
<?php require_once '../sources/inc/header.php';?>
<?php require_once '../sources/inc/navbar.php';?>

<?php $link_id = $_GET['link_id'];?>
    <main>
      <div class="container h-100">
        <div class="row justify-content-center h-50">
          <div class="col-md-6 shadow p-3 pt-5">
            <h2 class="mb-3">Éditer le lien # <?php echo $link_id; ?> </h2>
            <div class="mb-3">
              <form action="" method="post">
                <div class="mb-3">
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="title"
                      name="title"
                      placeholder="Stack overflow"
                    />
                    <label for="title">Titre</label>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-floating">
                    <input
                      type="url"
                      class="form-control"
                      id="url"
                      name="url"
                      placeholder="https://stackoverflow.com"
                    />
                    <label for="url">Lien</label>
                  </div>
                </div>
                <div class="col-md-auto d-flex">
                  <button class="btn btn-primary btn-lg">Enregister</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>

<!-- appel du footer -->
<?php require_once '../sources/inc/footer.php';?>

