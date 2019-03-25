<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use League\Csv\Reader;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Repository\BikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Service\BikeService;

class ApiController extends Controller
{

    /** var BikeService */
    private $bikeService;
    public function __construct(BikeRepository $bikeRepository, BikeService $bikeService)
    {
        $this->bikeRepository = $bikeRepository;
        $this->bikeService = $bikeService;
    }

    private function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {

        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return $d;

    }

    /**
     * @Rest\Get(
     *     path="api/v1/bikes/{lat}/{lng}",
     *     name="Get bikes from location"
     * )
     *
     */
    public function getBikes($lat, $lng)
    {
        $lat = str_replace(",", ".", $lat);
        $lng = str_replace(",", ".", $lng);

        $entityManager = $this->getDoctrine()->getManager();
        $bikes = $this->bikeRepository->findAll();

        $bikeDistanceArray = array();
        foreach($bikes as $bike){
           array_push($bikeDistanceArray,$this->getDistance($bike->getEndStationLatitude(),$bike->getEndStationLongitude(),$lat,$lng));
        }

        sort($bikeDistanceArray);

        $RAW_QUERY = 'SELECT COUNT(*) FROM bike where end_station_latitude=' . $lat . ' AND end_station_longitude = "' . $lng . '"';
        $statement = $entityManager->getConnection()->prepare($RAW_QUERY);
        $statement->execute();
        $howManyRev = $statement->fetchAll();
        if($bikes == null){
            return new JsonResponse('No results', JsonResponse::HTTP_OK);
        }
        $bikeData = array("bikeDistanceArray" => $bikeDistanceArray,"freeBikes" =>  $howManyRev[0]['COUNT(*)']);
        return new JsonResponse(json_encode($bikeData), JsonResponse::HTTP_OK);
    }
}