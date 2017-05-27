<?php

/* @var $this yii\web\View */

$this->title = 'Meal Calendar';
?>
<h1>Meal Calendar</h1>
<?php foreach ($dates as $day): ?>
    <h2><?= $day['day']->format('l, F j'); ?></h2>
    <?php foreach ($day['meals'] as $mealType => $mealItems): ?>
        <h3><?= $mealType ?></h3>
        <?php if (count($mealItems)): ?>
            <ul>
                <?php foreach ($mealItems as $item): ?>
                    <li><?= $item->name ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
