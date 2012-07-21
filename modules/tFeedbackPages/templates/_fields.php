<?php foreach ($form as $widget): ?>
    <?php if (!$widget->isHidden()): ?>
        <?php include_partial('tFeedbackPages/field', array('widget' => $widget)) ?>
    <?php else: ?>
        <?php echo $widget ?>
    <?php endif ?>
<?php endforeach; ?>

