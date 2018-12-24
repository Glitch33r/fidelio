<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\Project;
use BackendBundle\Entity\Responsibility_home;
use BackendBundle\Entity\RiskManagement;
use BackendBundle\Entity\Trading;
use FrontendBundle\Form\Type\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use BackendBundle\Entity\ContactForm;
use BackendBundle\Entity\Contacts;
use BackendBundle\Entity\Seo;
use BackendBundle\Entity\About;

use BackendBundle\Entity\Responsibility;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
//    /**
//     * @Route("/", name="homepage")
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'home']);
//        $responsibilities_home = $em->getRepository(Responsibility_home::class)->findAll()[0];
//        $about = $em->getRepository(About::class)->findAll()[0];
//
//
//        return $this->render('@Frontend/home/index.html.twig', [
//            'seo' => $seo,
//            'resp' => $responsibilities_home,
//            'about' => $about
//        ]);
//    }

    public function is_locale(Request $request){

         if ($request->getSession()->get('_locale') == null){
             $request->getSession()->set('_locale', 'en');
         }
    }

    /**
     * @Route("/{locale}/trans", name="translate")
     */
    public function changeLocalForTranslate(Request $request, $locale)
    {
        $request->getSession()->set('_locale', $locale);

        return $this->redirect('/app_dev.php/');
    }

    /**
     * @Route("/", name="homepage")
     */
    public function aboutAction(Request $request)
    {
        $this->is_locale($request);
        dump($request->getSession()->get('_locale'));
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'about-us']);
        $about = $em->getRepository(About::class)->findAll()[0];

        return $this->render('@Frontend/about/index.html.twig', [
            'seo' => $seo,
            'about' => $about
        ]);
    }

    /**
     * @Route("/responsibility", name="responsibility")
     */
    public function responsibilityAction(Request $request)
    {
        dump($request->getSession()->get('_locale'));

        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'responsibility'] );
        $responsibilities_home = $em->getRepository(Responsibility_home::class)->findAll()[0];
        $responsibilities = $em->getRepository(Responsibility::class)->findAll();
        $risk = $em->getRepository(RiskManagement::class)->findAll();

//        dump($responsibilities[2]->getPart()[0]); die();

        return $this->render('@Frontend/responsibilities/index.html.twig', [
            'seo' => $seo,
            'responsibilities' => $responsibilities,
            'responsibilities_home' => $responsibilities_home,
            'risk' => $risk
        ]);
    }

    /**
     * @Route("/trading", name="trading")
     */
    public function tradingAction(Request $request)
    {
        dump($request->getSession()->get('_locale'));

        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'trading']);
        $trade = $em->getRepository(Trading::class)->findAll()[0];

        return $this->render('@Frontend/trading/index.html.twig', [
            'seo' => $seo,
            'trade' => $trade
        ]);
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function projectsAction(Request $request)
    {
        dump($request->getSession()->get('_locale'));

        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'projects']);
        $project = $em->getRepository(Project::class)->findAll()[0];

        return $this->render('@Frontend/projects/index.html.twig', [
            'seo' => $seo,
            'projects' => $project
        ]);
    }

    /**
     * @Route("/contact-us", name="contact-us")
     */
    public function contactAction(Request $request)
    {
        dump($request->getSession()->get('_locale'));

        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'contact-us']);
        $contacts = $em->getRepository(Contacts::class)->findAll()[0];

        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm, [
            'action' => $this->generateUrl('contact-us'),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $phone = $form['telephone']->getData();
            $body = $form['body']->getData();

            $contactForm->setName($name);
            $contactForm->setEmail($email);
            $contactForm->setTelephone($phone);
            $contactForm->setBody($body);

            $em->persist($contactForm);
            $em->flush();

            $this->get('session')->getFlashBag()->add('success', 'Thank you for your message!' );

            return $this->redirect($this->generateUrl('contact-us'));
        }


        return $this->render('@Frontend/contact-us/index.html.twig', [
            'seo' => $seo,
            'contacts' => $contacts
        ]);
    }

    public function createFormContactUsAction()
    {
        $contactForm = new ContactForm();

        $form = $this->createForm(ContactFormType::class, $contactForm, [
            'action' => $this->generateUrl('contact-us'),
        ]);

        return $this->render('@Frontend/parts/_form.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function footerAction(){
        $em = $this->getDoctrine()->getManager();
        $contacts = $em->getRepository(Contacts::class)->findAll()[0];

        return $this->render('@Frontend/parts/_footer.html.twig', [
            'contacts' => $contacts
        ]);
    }
}
