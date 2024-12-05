<?php
include __DIR__ . '/partials/header.php';
?>
<div class="container col-lg-4">
    <form method="post" action="?entity=post&action=add" enctype="multipart/form-data" class="my-4">
        <div class="card">
            <div class="card-body">
                <!-- Name input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label for="fieldImage" class="form-label">Image</label>
                    <input class="form-control form-control-lg" id="fieldImage" name="fieldImage" type="file" />
                </div>

                <!-- Legend input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="legende">Description</label>
                    <input type="text" id="legende" name="legende" class="form-control" />
                </div>

                <!-- Submit button -->
                <div class="d-grid gap-2">
                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4" name="poster">Poster</button>
                </div>
            </div>
        </div>
    </form>


    <!-- Afficher les post -->
    <?php if(!empty($posts)) : ?>
    <?php foreach ($posts as $post) : ?>
        <div class="card mb-3">
            <img src="../assets/img/posts/<?php echo $post['image'] ?>" class="card-img-top" alt="Camera"/>
            <div class="card-body bg-dark text-white">
                <h5 class="card-title"><?php echo $post['legende'] ?></h5>
                <p class="card-text ">
                <small class="text-muted"><span class="text-light font-italic">Il y'a <?php echo $post['last_updated'] ?></span>  </small>
                </p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <div>
                    <a href="#" data-bs-toggle="tooltip" data-bs-title="Default tooltip"><?php echo $post['nbr_likes'] ?> J'aime</a>
                </div>
                <div>
                    <?php if($post['alreadyLike']) : ?>
                        <a href="?action=delete_like&entity=like&post_id=<?php echo $post['id'] ?>"><i class="bi bi-balloon-heart-fill text-danger h4"></i></a>
                    <?php else : ?>
                        <a href="?action=add_like&entity=like&post_id=<?php echo $post['id'] ?>"><i class="bi bi-balloon-heart text-danger h4"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune publication disponible pour le moment.</p>
    <?php endif; ?>
</div>
<?php
include __DIR__ . '/partials/footer.php';
?>