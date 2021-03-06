<?php
    session_name("my-dynamic-cv");
    session_start();

    include_once "inc/class/competence.class.php";
    include_once "inc/class/experience.class.php";
    include_once "inc/class/formation.class.php";
    include_once "inc/class/loisir.class.php";
    include_once "inc/class/user.class.php";

    $user = new User();
    $user->get(1);
    $competences = Competence::getAll();
    $experiences = Experience::getAll();
    $formations = Formation::getAll();
    $loisirs = Loisir::getAll();
    
    $page = "my-cv";
    include_once "inc/parts/header.php";
?>
    <main class="container mt-3">
        <section id="presentation">
            <div class="row">
                <div class="col">
                    <img src="<?= $user->getPhoto();?>" alt="<?=$user->getNom();?>">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col"><h3><?=$user->posteRecherche();?></h3></div>
                    </div>
                    <div class="row">
                        <div class="col"><h3><?=$user;?></h3></div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p>
                                <?=$user->getAdresse();?><br>
                                <?=$user->getCodePostal() . " " . $user->getVille();?>
                            </p>
                        </div>
                    </div>

                    <div class="row pb-1">
                        <div class="col align-self-center"><?=$user->getTelephone();?></div>
                        <div class="col"><a href="tel:<?=$user->getTelephone();?>" class="btn btn-secondary w-50">M'appeller</a></div>
                    </div>

                    <div class="row">
                        <div class="col align-self-center"><?=$user->getEmail();?></div>
                        <div class="col"><a href="contact.php" class="btn btn-secondary w-50">Me contacter</a></div>
                    </div>
                </div>
            </div>
        </section>

        <section id="competences">
            <h4>Compétences</h4>

            <div class="pl-2 border">
                <?php foreach ($competences as $item) : ?>
                    <?= $item; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="experiences">
            <h4>Expérience</h4>

            <div class="pl-2 border">
                <?php foreach ($experiences as $item) : ?>
                    <?= $item; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="formations">
            <h4>Formation</h4>

            <div class="pl-2 border">
                <?php foreach ($formations as $item) : ?>
                    <?= $item; ?>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="loisirs">
            <h4>Loisirs</h4>

            <div class="pl-2 border">
                <?php foreach ($loisirs as $item) : ?>
                    <?= $item; ?>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <?php
        include_once "inc/parts/footer.php";
    ?>