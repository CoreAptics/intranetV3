<?php

namespace App\Controller\social;

use App\Controller\BaseController;
use App\MesClasses\Excel\MyExcelWriter;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class SocialController
 * @package App\Controller\social
 * @Route("/{_locale}/social",
 *     requirements={
 *         "_locale": "fr|en"})
 */
class SocialController extends BaseController
{
    /**
     * @Route("/", name="social_index")
     * @param MyExcelWriter $myExcelWriter
     *
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function index(MyExcelWriter $myExcelWriter): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $myExcelWriter->write('A1', 'Bonjour');
        $myExcelWriter->write('A2', 'Le monde');

        return $myExcelWriter->saveCsv('toto');
        //return $this->render('social/index.html.twig', [
        //]);
    }
}
