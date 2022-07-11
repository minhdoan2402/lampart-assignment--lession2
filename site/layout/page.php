<?php if (!empty($products)) : ?>
<div class="page">
    <ul class="pagination justify-content-center">
        <!-- Prev -->
        <?php if ($currentPage != 1) : ?>
        <?php if ($search) : ?>
        <li class="page-item"><a class="page-link" href="?page=<?= ($page - 1) ?>&search=<?= $search ?>">Previous</a>
        </li>
        <?php else : ?>
        <li class="page-item"><a class="page-link" href="?page=<?= ($page - 1) ?>">Previous</a></li>
        <?php endif ?>
        <?php endif ?>

        <!-- Mid -->
        <?php for ($i = 1; $i <= $pageNumber; $i++) : ?>
        <?php if ($search) : ?>

        <li class="page-item"><a class="<?= $i == $currentPage ? 'active' : '' ?> page-link"
                href="?page=<?= ($i) ?>&search=<?= $search ?>"><?= $i ?></a>
        </li>
        <?php else : ?>
        <li class="page-item"><a class="<?= $i == $currentPage ? 'active' : '' ?> page-link"
                href="?page=<?= ($i) ?>"><?= $i ?></a>
        </li>
        <?php endif ?>
        <?php endfor ?>

        <!-- Next -->
        <?php if ($currentPage != $pageNumber) : ?>
        <?php if ($search) : ?>
        <li class="page-item"><a class="page-link" href="?page=<?= ($page + 1) ?>&search=<?= $search ?>">Next</a></li>
        <?php else : ?>
        <li class="page-item"><a class="page-link" href="?page=<?= ($page + 1) ?>">Next</a></li>
        <?php endif ?>
        <?php endif ?>

    </ul>
</div>
<?php endif ?>