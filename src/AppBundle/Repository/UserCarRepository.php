<?php

namespace AppBundle\Repository;
use AppBundle\Entity\UserCar;

/**
 * UserCarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserCarRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get user car list
     *
     * Get user car by passed user id
     *
     * @param int $userId
     * @return array
     */
    public function getUserCarList(int $userId)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.user =:user')
            ->setParameter('user', $userId)
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Get user car
     *
     * Get user cat by passed car_id and user_id parameters
     *
     * @param int $carId
     * @param int $userId
     * @return array
     */
    public function getUserCar(int $carId, int $userId)
    {
        $query = $this->createQueryBuilder('c')
            ->where('c.user =:user')
            ->andWhere('c.id =:id')
            ->setParameter('user', $userId)
            ->setParameter('id', $carId)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * Create user car
     *
     * @param $data
     * @param $user
     */
    public function create($data, $user)
    {
        $em = $this->getEntityManager();

        $userCar = new UserCar();
        $userCar->setCarName($data->getCarName());
        $userCar->setUser($user);
        $userCar->setModel($data->getModel());
        $userCar->setEngine($data->getEngine());
        $userCar->setTransmission($data->getTransmission());
        $userCar->setCreatedAt($data->getCreatedAt());
        $userCar->setColor($data->getColor());

        $em->persist($userCar);
        $em->flush();
    }

    /**
     * Edit user car
     *
     * @param $data
     * @param $userCar
     */
    public function edit($data, $userCar)
    {
        $em = $this->getEntityManager();

        $userCar->setCarName($data->getCarName());
        $userCar->setModel($data->getModel());
        $userCar->setEngine($data->getEngine());
        $userCar->setTransmission($data->getTransmission());
        $userCar->setCreatedAt($data->getCreatedAt());
        $userCar->setColor($data->getColor());

        $em->persist($userCar);
        $em->flush();
    }
}
