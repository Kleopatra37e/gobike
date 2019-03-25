<?php

namespace App\Controller;

use Symfony\Component\Validator\Constraints\Date;
use voku\helper\HtmlDomParser;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Bike;
use League\Csv\Reader;

use App\Repository\BikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{

    public function __construct(BikeRepository $bikeRepository)
    {
        $this->bikeRepository = $bikeRepository;
    }


    public function downloadCSV()
    {
        $path = __DIR__ . '/upload/data.csv';

        $reader = Reader::createFromPath($path, 'r');
        foreach ($reader as $row) {
            $bike = new Bike;
            $bikes = explode(";", $row[0]);

            $dateStartTime=substr($bikes[1],0, 10);
            $dateStartTime = \DateTime::createFromFormat('Y-m-d', $dateStartTime);
            $bike->setDurationTime($bikes[0]);
            $bike->setStartTime($dateStartTime);
            $bike->setEndTime($dateStartTime);
            $bike->setStartStationId($bikes[3]);
            $bike->setStartStationName($bikes[4]);
            $bike->setStartStationLatitude($bikes[5]);
            $bike->setStartStationLongitude($bikes[6]);
            $bike->setEndStationId($bikes[7]);
            $bike->setEndStationName($bikes[8]);
            $bike->setEndStationLatitude($bikes[9]);
            $bike->setEndStationLongitude($bikes[10]);
            $bike->setBikeId($bikes[11]);
            $bike->setUserType($bikes[12]);
            $bike->setMemberBirthYear($bikes[13]);
            $bike->setMemberGender($bikes[14]);
            $bike->setBikeShareForAllTrip($bikes[15]);
            $this->bikeRepository->save($bike);

            echo '</br>';
        }

        return $bike;
    }

}