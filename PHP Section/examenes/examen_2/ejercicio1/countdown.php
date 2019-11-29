<?php

/**
 * This function takes a number and substracts one from it for a countdown
 * @param int $num Current status of the countdown
 * @return int New status of the countdown
 */
function countdownHandling(int $num): int {
    return $num -= 1;
}