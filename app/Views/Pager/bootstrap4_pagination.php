<?php $pager->setSurroundCount(3); ?>
<nav>
    <ul class="pagination">
        <?php if ($pager->hasPreviousPage()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="First" class="page-link">
                    <span aria-hidden="true">
                        <i class="fas fa-angle-double-left"></i>
                    </span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPreviousPage() ?>" class="page-link" aria-label="Previous">
                    <span><i class="fas fa-angle-left"></i></span>
                </a>
            </li>
        <?php } ?>

        <?php
        foreach ($pager->links() as $link) {
            $activeclass = $link['active']?'active':'';
            ?>
            <li class="page-item <?= $activeclass ?>">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($pager->hasNextPage()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getNextPage() ?>" aria-label="Next" class="page-link">
                    <span aria-hidden="true">
                        <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" aria-label="Last" class="page-link">
                    <span aria-hidden="true">
                        <i class="fas fa-angle-double-right"></i>
                    </span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>
