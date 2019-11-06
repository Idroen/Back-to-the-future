<?php


use http\QueryString;

class TimeTravel
{
    /**
     * @var DateTime
     */
    private $start;
    /**
     * @var DateTime
     */
    private  $end;

    public function __construct(DateTime $start, DateTime $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return string
     */
    public function getTravelInfo(): string
    {
       $difference = $this->getStart()->diff($this->getEnd());
       return $difference->format('Il y a %Y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates');
    }

    /**
     * @param DateInterval $interval
     * @return DateTime
     */
    public function findDate(DateInterval $interval)
    {
     $endDate = $this->start->sub($interval);
     return $endDate;
    }

    /**
     * @param DatePeriod $step
     * @return array
     */

    public function backToTheFutureStepByStep(DateInterval $step)
    {
        $result = [];
        $periods = new DatePeriod($this->start, $step, $this->end);
        foreach ($periods as $period){
            $result[] = $period->format('M d Y A h:i');
        }
        return $result;
    }


}