<?php
$htmlTag = sfConfig::get('app_tFeedbackPlugin_form_field_container_tag', 'span');
$cssClass = sfConfig::get('app_tFeedbackPlugin_form_field_container_class', 'feedback_form_field');
?>

<<?php echo $htmlTag ?> class="<?php echo $cssClass ?> <?php echo $cssClass . "_" . $widget->getName(); ?>">
    <?php echo $widget->renderLabel($widget->getName() . ' (*)') ?>
    <?php echo $widget ?>
</<?php echo $htmlTag ?>>
