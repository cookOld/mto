<?php
use yii\helpers\Url;

$menuItems = [
    
];

$actionId = array_slice(explode("-", $this->context->action->id), 0, -1);

if (isset($menuItems[$this->context->action->id])) {
    $activeItem = $this->context->action->id;
} elseif (isset($menuItems[implode("-", $actionId)])) {
    $activeItem = implode("-", $actionId);
} else {
    $activeItem = "index";
}

foreach ($menuItems as $key => $name) {
    echo '<li class="nav-item"><a href="' . Url::to([$key]) . '" class="nav-link';
    if ($activeItem == $key) {
        echo ' active';
    }
    echo '">' . $name . '</a></li>' . PHP_EOL;
}
?>

