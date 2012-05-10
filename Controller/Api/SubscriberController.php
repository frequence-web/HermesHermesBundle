<?php

namespace Hermes\Bundle\HermesBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Hermes\Bundle\HermesBundle\Document\Subscriber;

class SubscriberController extends Controller
{
    /**
     * Add a new subscriber
     * Use method PUT and support POST send
     *
     * Receive data:
     *   - name     (string, ex: "Nek")
     *   - email    (string, ex: "noob@nekoro.fr")
     *   - params   (json array as string, ex: { 'realname': 'Kenny' })
     *   - list     (string, ex: "nekland-blog")
     *   - locale   (string, ex: "en_EN")
     *
     * @return Response|\Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function addAction(Request $request)
    {
        $subscriber = Subscriber::createFromRequest($request);
        $errors = $this->get('validator')->validate($subscriber);

        // If the request is from post, it is possible that the client is a webbrowser
        // We also support redirecting
        if ($request->getMethod() == 'POST' && $url = $request->request->get('callbackUrl')) {
            return $this->redirect($url);
        }

        if (0 === count($errors)) {
            $om = $this->getDoctrine()->getManager('mongo');
            $om->persist($subscriber);
            $om->flush();

            return $this->formatJsonResponse(array(
                'success' => true,
            ));
        }

        return $this->formatJsonResponse(array(
            'success'   => false,
            'errors'    => $errors
        ));
    }

    /**
     * Make and return a Respons object with json headers
     *
     * @return Response
     */
    private function formatJsonResponse(array $data)
    {
        $response = new Response(json_encode($data), 400);
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Cache-Control', 'no-cache, must-revalidate');
        $response->headers->set('Expires', 'Mon, 26 Jul 1997 05:00:00 GMT');

        return $response;
    }
}
