<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="callout callout-info <?= h($class) ?>"><?= h($message) ?></div>
