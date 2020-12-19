<?php

namespace App\Framework;

/**
 * Class Controller
 */
abstract class Controller
{
    protected $view;
    protected $request;
    protected $getMethod;
    protected $postMethod;
    protected $session;
    protected $files;
   
    

<<<<<<< HEAD
    
=======
    /**
     * @return void
     */
>>>>>>> d9907105d01fe29955bb6725efb050d358200041
    public function __construct()
    {
        $this->view = new View;
        $this->request = new Request;
        $this->getMethod = $this->request->getGet();
        $this->postMethod = $this->request->getPost();
        $this->session = $this->request->getSession();
        $this->files = $this->request->getFiles();
    }
}