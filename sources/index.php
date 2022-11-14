<!-- appel du header et de la navbar -->
<?php require_once '../sources/inc/header.php';?>
<?php require_once '../sources/inc/navbar.php';?>

<!-- appel du fichier functions -->
<?php require_once '../sources/functions/functions.php';?>

    <main>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="mb-3">
              <form action="./functions/functions.php" method="post">
                <div class="row g-2">
                  <div class="col-md">
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
                  <div class="col-md">
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
                    <button class="btn btn-primary btn-lg">Ajouter</button>
                  </div>
                </div>
              </form>
            </div>
            <ul class="list-group">
            <?php foreach(get_all_link() as $link): ?>
              <?php $id = $link['link_id'];?>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="<?php echo $link['url'];?>"><?php echo $link['title']?></a>
                <span>
                  <a href="./edit-link.php?link_id=<?php echo $id; ?>"><i class="fa-regular fa-pen-to-square me-1 text-warning"></i></a>
                  <a href="./functions/functions.php"><i class="fa-solid fa-trash ms-1 text-danger"></i></a>
                </span>
              </li>
              <?php echo $id;?>
            <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </div>
    </main>

<!-- appel du footer -->
<?php require_once '../sources/inc/footer.php';?>
