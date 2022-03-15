<?php
/**
 * @var array $arr
 */
?>
<div class="c_switcher">
    <?php array_walk($arr, function($link, $i) { ?>
    <?= $i ? ' &nbsp;|&nbsp; ' : '' ?>
    <?php if ( $link[2] ) : ?>
    <span class="u_utility_link t--active"><?= $link[0] ?></span>
    <?php else : ?>
    <a class="u_utility_link" href="<?= $link[1] ?>"><?= $link[0] ?></a>
    <?php endif ?>
    <?php }) ?>
</div>
