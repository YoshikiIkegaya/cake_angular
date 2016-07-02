<?php
namespace App\Controller;
 
use App\Controller\AppController;
 
class UserController extends AppController{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function add(){
        if ($this->request->is('post')) {
            $person = $this->Persons->newEntity();
            $person = $this->Persons->patchEntity($person, $this->request->data);
            if ($this->Persons->save($person)) {
                return $this->redirect(['action' => 'index']);
            }
        }
    }
    
    public function index(){
    $user = $this->User->find('all');
        $this->set(array(
            'user' => $user,
            '_serialize' => array('user')
        ));
    }
 
}