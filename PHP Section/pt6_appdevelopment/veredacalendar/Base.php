<?php

class Base
{
    /**
     * @var \DateTime The date when the calendar starts
     */
    private $startDate;
    /**
     * @var \DateTime The date when the calendar starts
     */
    private $endDate;
    /**
     * @var array Multidimensional Array of vacation periods starts in the calendar
     */
    private $vacationPeriodsStart;
    /**
     * @var array Multidimensional Array of vacation periods ends in the calendar
     */
    private $vacationPeriodsEnd;
    /**
     * @var array Array of days which are festive in the calendar
     */
    private $festiveDays;
    /**
     * @var array Array of days when there's the evaluations
     */
    private $evaluationDays = [];
    /**
     * @var integer Number of days that the school year lasts
     */
    private $courseLength;
    /**
     * @var array Number of days that each period lasts, 0 means that the period does not exist.
     * The values represent the first, second and third periods, and the period for practices on fourth place.
     */
    private $periodLength = [1, 1, 1, 1];

    /**
     * Base constructor.
     * @param DateTime $startDate Date of start of the calendar.
     * @param DateTime $endDate Date of the end of the calendar.
     * @param array $vacationPeriodsStart Array with starts of Vacation periods.
     * @param array $vacationPeriodsEnd Array with ends of Vacation periods.
     * @param array $festiveDays Array with individual days of vacations
     * @param array $evaluationDays Array with evaluation days
     */
    public function __construct(DateTime $startDate, DateTime $endDate, array $vacationPeriodsStart, array $vacationPeriodsEnd, array $festiveDays, array $evaluationDays)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->vacationPeriodsStart = $vacationPeriodsStart;
        $this->vacationPeriodsEnd = $vacationPeriodsEnd;
        $this->festiveDays = $festiveDays;
        $this->evaluationDays = $evaluationDays;
        $this->setCourseLength();
        $this->periodLengthCrafting();
    }

    function periodLengthCrafting()
    {
        $xd = [];
        $xd[0] = date_diff($this->startDate, $this->evaluationDays[0], true);
        $xd[1] = date_diff($this->evaluationDays[0], $this->evaluationDays[1], true);
        $xd[2] = date_diff($this->evaluationDays[1], $this->evaluationDays[2], true);
        $xd[3] = date_diff($this->evaluationDays[2], $this->evaluationDays[3], true);
        $this->setPeriodLength($xd);
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     */
    public function setStartDate(DateTime $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate(DateTime $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return array
     */
    public function getVacationPeriodsStart(): array
    {
        return $this->vacationPeriodsStart;
    }

    /**
     * @param array $vacationPeriodsStart
     */
    public function setVacationPeriodsStart(array $vacationPeriodsStart): void
    {
        $this->vacationPeriodsStart = $vacationPeriodsStart;
    }

    /**
     * @return array
     */
    public function getVacationPeriodsEnd(): array
    {
        return $this->vacationPeriodsEnd;
    }

    /**
     * @param array $vacationPeriodsEnd
     */
    public function setVacationPeriodsEnd(array $vacationPeriodsEnd): void
    {
        $this->vacationPeriodsEnd = $vacationPeriodsEnd;
    }

    /**
     * @return array
     */
    public function getFestiveDays(): array
    {
        return $this->festiveDays;
    }

    /**
     * @param array $festiveDays
     */
    public function setFestiveDays(array $festiveDays): void
    {
        $this->festiveDays = $festiveDays;
    }

    /**
     * @return array
     */
    public function getEvaluationDays(): array
    {
        return $this->evaluationDays;
    }

    /**
     * @param array $evaluationDays
     */
    public function setEvaluationDays(array $evaluationDays): void
    {
        $this->evaluationDays = $evaluationDays;
    }

    /**
     * @return int
     */
    public function getCourseLength(): int
    {
        return $this->courseLength;
    }

    public function setCourseLength(): void
    {
        $courseLength = intval(date_diff($this->startDate, $this->endDate, true)->format("%a"));
        $this->courseLength = $courseLength;
    }

    /**
     * @return array
     */
    public function getPeriodLength(): array
    {
        return $this->periodLength;
    }

    /**
     * @param array $periodLength
     */
    public function setPeriodLength(array $periodLength): void
    {
        $this->periodLength = $periodLength;
    }
}