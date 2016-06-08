<!-- Seccion que es Taskoj -->
<section id="intro" class="intro-section">
    <div class="container">
        <div class="row">
            <h1><?= lang('que_es_un_taskoj') ?></h1>
            <div class="col-lg-6">


                <img src="<?php echo base_url() . "assets/img/grupo-taskoj-300.png"; ?>"  class="img-responsive"  width="600" height="580" alt="que es taskoj"/>

            </div>
            <div class="col-lg-6">
                <div id="colocartextoIntro">

                    <span class="textoIntro"><?= lang('texto_intro_part1') ?>
                        <?= lang('texto_intro_part2') ?>
                        <?php
                        echo anchor('home', 'Taskoj.com', array(
                            'title' => 'Taskoj.com', 'target' => '_blank'));
                        ?>
                        <?= lang('texto_intro_part3') ?></span>

                </div>
            </div>
        </div>
    </div>
</section>
