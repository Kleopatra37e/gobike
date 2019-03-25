<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity
 * @ORM\Table(name="bike")
 */
class Bike {
  /**
   * @ORM\Column(type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /** @ORM\Column(type="integer", name="duration_time") */
  public $durationTime;
  
   /** @ORM\Column(type="datetime", name="start_time") */
    public $startTime;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Bike
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
  
 /** @ORM\Column(type="datetime", name="end_time") */
    public $endTime;
  
 /** @ORM\Column(type="integer", name="start_station_id") */
  private $startStationId;
  
    /** @ORM\Column(type="string", length=100, name="start_station_name") */
  private $startStationName;
  
    /**
   * @ORM\Column(type="string", length=100, name="start_station_latitude")
   */
  private $startStationLatitude;
  
    /**
   * @ORM\Column(type="string", length=100, name="start_station_longitude")
   */
  private $startStationLongitude;
  
    /**
   * @ORM\Column(type="integer", name="end_station_id")
   */
  private $endStationId;
  
    /**
   * @ORM\Column(type="string", length=100, name="end_station_name")
   */
  private $endStationName;
  
    /**
   * @ORM\Column(type="string", length=100, name="end_station_latitude")
   */
  private $endStationLatitude;
  
    /**
   * @ORM\Column(type="string", length=100, name="end_station_longitude")
   */
  private $endStationLongitude;
  
    /**
   * @ORM\Column(type="integer", name="bike_id")
   */
  private $bikeId;
  
    /**
   * @ORM\Column(type="string", length=100, name="user_type")
   */
  private $userType;
  
    /**
   * @ORM\Column(type="string", length=100, name="member_birth_year")
   */
  private $memberBirthYear;

    /**
     * @ORM\Column(type="string", length=100, name="member_gender")
     */
    private $memberGender;

    /**
     * @return mixed
     */
    public function getMemberGender()
    {
        return $this->memberGender;
    }

    /**
     * @param mixed $memberGender
     */
    public function setMemberGender($memberGender): void
    {
        $this->memberGender = $memberGender;
    }
  
    /**
   * @ORM\Column(type="string", length=100, name="bike_share_for_all_trip")
   */
  private $bikeShareForAllTrip;

    /**
     * @return mixed
     */
    public function getDurationTime()
    {
        return $this->durationTime;
    }

    /**
     * @param mixed $durationTime
     * @return Bike
     */
    public function setDurationTime($durationTime)
    {
        $this->durationTime = $durationTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param mixed $startTime
     * @return Bike
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param mixed $endTime
     * @return Bike
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartStationId()
    {
        return $this->startStationId;
    }

    /**
     * @param mixed $startStationId
     * @return Bike
     */
    public function setStartStationId($startStationId)
    {
        $this->startStationId = $startStationId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartStationName()
    {
        return $this->startStationName;
    }

    /**
     * @param mixed $startStationName
     * @return Bike
     */
    public function setStartStationName($startStationName)
    {
        $this->startStationName = $startStationName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartStationLatitude()
    {
        return $this->startStationLatitude;
    }

    /**
     * @param mixed $startStationLatitude
     * @return Bike
     */
    public function setStartStationLatitude($startStationLatitude)
    {
        $this->startStationLatitude = $startStationLatitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStartStationLongitude()
    {
        return $this->startStationLongitude;
    }

    /**
     * @param mixed $startStationLongitude
     * @return Bike
     */
    public function setStartStationLongitude($startStationLongitude)
    {
        $this->startStationLongitude = $startStationLongitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndStationId()
    {
        return $this->endStationId;
    }

    /**
     * @param mixed $endStationId
     * @return Bike
     */
    public function setEndStationId($endStationId)
    {
        $this->endStationId = $endStationId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndStationName()
    {
        return $this->endStationName;
    }

    /**
     * @param mixed $endStationName
     * @return Bike
     */
    public function setEndStationName($endStationName)
    {
        $this->endStationName = $endStationName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndStationLatitude()
    {
        return $this->endStationLatitude;
    }

    /**
     * @param mixed $endStationLatitude
     * @return Bike
     */
    public function setEndStationLatitude($endStationLatitude)
    {
        $this->endStationLatitude = $endStationLatitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndStationLongitude()
    {
        return $this->endStationLongitude;
    }

    /**
     * @param mixed $endStationLongitude
     * @return Bike
     */
    public function setEndStationLongitude($endStationLongitude)
    {
        $this->endStationLongitude = $endStationLongitude;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBikeId()
    {
        return $this->bikeId;
    }

    /**
     * @param mixed $bikeId
     * @return Bike
     */
    public function setBikeId($bikeId)
    {
        $this->bikeId = $bikeId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param mixed $userType
     * @return Bike
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberBirthYear()
    {
        return $this->memberBirthYear;
    }

    /**
     * @param mixed $memberBirthYear
     * @return Bike
     */
    public function setMemberBirthYear($memberBirthYear)
    {
        $this->memberBirthYear = $memberBirthYear;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBikeShareForAllTrip()
    {
        return $this->bikeShareForAllTrip;
    }

    /**
     * @param mixed $bikeShareForAllTrip
     * @return Bike
     */
    public function setBikeShareForAllTrip($bikeShareForAllTrip)
    {
        $this->bikeShareForAllTrip = $bikeShareForAllTrip;
        return $this;
    }
}