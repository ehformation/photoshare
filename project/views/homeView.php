<?php
include __DIR__ . '/partials/header.php';
?>
<div class="container col-4">
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
        </div>
    <?php endforeach; ?>
    <?php else : ?>
        <p>Aucune publication disponible pour le moment.</p>
    <?php endif; ?>
</div>
<?php
include __DIR__ . '/partials/footer.php';
?>