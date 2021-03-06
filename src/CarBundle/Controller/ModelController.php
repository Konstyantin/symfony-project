<?php

namespace CarBundle\Controller;

use CarBundle\Form\ModelSearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class ModelController
 * @package CarBundle\Controller
 */
class ModelController extends Controller
{
    /**
     * Index Action
     *
     * Show list existing model item
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine();

        $form = $this->createForm(ModelSearchType::class);

        $modelList = $em->getRepository('CarBundle:Model')->getModelsList();

        return $this->render('@Car/Model/index.html.twig', [
            'modelList' => $modelList,
            'form' => $form->createView()
        ]);
    }

    /**
     * Model cars Action
     *
     * Show cars list by model name
     *
     * @param Request $request
     * @param string $model
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function modelCarsAction(Request $request, string $model)
    {
        $em = $this->getDoctrine();

        $carList = $em->getRepository('CarBundle:Car')->getCarsByModel($model);

        $modelList = $em->getRepository('CarBundle:Model')->getModelsList();

        return $this->render('CarBundle:Model:modelCars.html.twig', [
            'carList' => $carList,
            'modelList' => $modelList,
            'model' => $model
        ]);
    }
}
