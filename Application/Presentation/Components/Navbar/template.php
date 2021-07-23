<nav class="navbar">
    <ul class="menu">
        <?php foreach ($items as $item) : ?>
            <li class="item">
                <a href="<?= $item['href'] ?>" class="link"><?= $item['text'] ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>