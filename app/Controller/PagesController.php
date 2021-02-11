<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Pages';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
    //public $helpers = array('Editor');

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
	
    public $helpers = array('Session');
    public $components = array('Session', 'Cookie', 'Security', 'Auth');
    public $persistModel = true;

    public function beforeFilter() {

        if ($this->params['prefix'] == 'admin') {
            $this->Auth->authenticate = array('Form' => array('fields' => array('username' => 'email'), 'scope' => array()));
            $this->Auth->loginAction = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
            $this->Auth->loginRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_display');
            $this->Auth->logoutRedirect = array('admin' => true, 'controller' => 'users', 'action' => 'admin_login');
        } else if (!isset($this->request->params['admin']) && Configure::read('Site.status') == 0) {
			$this->layout = 'error';
			$this->response->statusCode(503);
			$this->set('title_for_layout', __('Site down for maintenance'));
			$this->render('/Errors/maintenance');
		}

        $this->Auth->allow('display','gallery','about','display_data','contact_us','send_mail_to_admin');

        if (isset($this->request->params['users'])) {

            $this->Security->requireSecure();
        }

        $this->Security->blackHoleCallback = 'blackhole';

        /*  if we use authentication from differnent  table  then we need thye below code  start added by anindita 17/5/12 */
    }
    

    public function display() {
        
        
	}
    
    public function gallery() {
        
	}
    
    public function about() {
       
	}
    
    public function display_data() {
        
        
	}
    
    public function contact_us() {

	}  
    
    public function admin_list() {
        $this->layout = 'adminDefault';
        $this->data = $this->Page->find('all', array('order' => array('title' => 'ASC')));
    }
    
    public function admin_edit($id) {
        $this->layout = 'adminDefault';
        if ($this->request->is('post')) {
            #$this->ed($this->request->data);
            $this->Page->save($this->request->data);
            $this->Session->setFlash(__('Page content has been updated'), 'default', array(), 'auth');
            $this->redirect('/admin/pages/list');
        }
        $this->data = $this->Page->findById($id);
    }
    
     public function send_mail_to_admin() {
        if ($this->request->is('post')) {
            #$this->ed(count($this->request->data['Page']));
            if (count($this->request->data['Page']) == 5 ) {
                $email = new CakeEmail();
                $email->template('sendtoadmin', 'default')
                        ->viewVars(array('first_name' => $this->request->data['Page']['first_name'], 'last_name' => $this->request->data['Page']['last_name'],'email' => $this->request->data['Page']['email'],'message' => $this->request->data['Page']['message']))
                        ->emailFormat('html')
                        ->from(array($this->request->data['Page']['email'] => Configure::read('emailheader')))
                        ->to(Configure::read('ADMIN_EMAIL'))
                        ->subject($this->request->data['Page']['subject'])
                        ->send('Contact Admin');

                $this->Session->setFlash(__('Email send succesfully'), 'default', array(), 'auth');
            }
            else
            {
               $this->Session->setFlash(__('All fields are mandatory'), 'default', array(), 'auth'); 
            }
            $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }   
        
    
    

    
}
