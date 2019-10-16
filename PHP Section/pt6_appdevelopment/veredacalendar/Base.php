<?php

abstract class Base {
    /**
     * @var \DateTime The date when the calendar starts
     */
    private $startDate;
    /**
     * @var \DateTime The date when the calendar starts
     */
    private $endDate;
    /**
     * @var array Multidimensional Array of vacation periods in the calendar
     */
    private $vacationPeriods;
    /**
     * @var \DateTime Array of days which are festive in the calendar
     */
    private $festiveDays;
    /**
     * @var integer Number of days that the school year lasts
     */
    private $courseLength;
    /**
     * @var array Number of days that each period lasts, 0 means that the period does not exist.
     * The values represent the first, second and third periods, and the period for practices on fourth place.
     */
    private $periodLength = [1, 1, 1, 1];
}