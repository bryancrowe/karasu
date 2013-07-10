<?php
App::uses('AppController', 'Controller');

class SessionsController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(array('login', 'logout'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $user = $this->Auth->user();
                $this->Session->setFlash('You are now logged in!');
                $this->redirect($this->Auth->loginRedirect);
            } else {
                $this->Session->setFlash('Invalid login details, please try again.');
            }
        }
    }

    public function logout()
    {
        $this->Session->destroy();
        $this->redirect($this->Auth->logout());
    }

}