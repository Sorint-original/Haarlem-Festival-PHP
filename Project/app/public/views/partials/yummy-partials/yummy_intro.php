<header class="display-3 text-center py-3">
    <?php echo htmlspecialchars($page->header ?? ''); ?>
</header>

<p class="h3 text-center w-75 align-self-center">
    <?php echo htmlspecialchars($page->text ?? ''); ?>
</p>

<div class="note-box text-center">
    <strong>Note:</strong> <?php echo htmlspecialchars($page->note ?? ''); ?>
</div> 
