<?php
/**
 * Created by PhpStorm.
 * User: Stephane
 * Date: 31/07/2018
 * Time: 04:36
 */
if (isset($_SESSION['Flash']) && !empty($_SESSION['Flash'])): ?>
    <div class="alert alert-<?= $_SESSION['Flash']->class ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['Flash']->message ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php unset($_SESSION['Flash']);
endif;