<?php
function removeDuplicates($array) {
    $uniqueArray = [];

    foreach ($array as $element) {
        $isDuplicate = false;
        foreach ($uniqueArray as $uniqueElement) {
            if ($uniqueElement === $element) {
                $isDuplicate = true;
                break;
            }
        }
        
        if (!$isDuplicate) {
            $uniqueArray[] = $element;
        }
    }

    return $uniqueArray;
}

$array = [1, 2, 2, 3, 4, 4, 5];
$uniqueArray = removeDuplicates($array);

print_r($uniqueArray);
?>
