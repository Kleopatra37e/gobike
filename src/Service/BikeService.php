<?php

namespace App\Service;

use App\Entity\Bike;
use App\Exception\ObjectNotFoundException;
use App\Repository\BikeRepository;
use Symfony\Component\HttpFoundation\Request;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\ServiceSubscriberInterface;
use Symfony\Component\DependencyInjection\ServiceSubscriberTrait;

class BikeService
{
    /** @var BikeRepository */
    private $bikeRepository;

    /**
     *
     * @param BikeRepository $bikeRepository
     */
    public function __construct(
        BikeRepository $bikeRepository
    )
    {
        $this->bikeRepository = $bikeRepository;
    }

    public function getBikes($lat, $lng)
    {

        /** @var Bike $bikes */

        $bikes[] = $this->bikeRepository->findBy(array('startStationLatitude' => $lat, 'startStationLongitude' => $lng),(array('startStationLatitude' => 'desc')));

        return $bikes;
    }

    public function countBikes($lat, $lng)
    {

        /** @var Bike $bikes */

        $bikes[] = $this->bikeRepository->findBy(array('endStationLatitude' => $lat, 'endStationLongitude' => $lng));




        return $bikes;
    }


}
