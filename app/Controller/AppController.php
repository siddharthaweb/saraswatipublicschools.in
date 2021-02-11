<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    
    
    public function beforeRender() {
        $this->response->disableCache();
    }

   
    ### error debuger ###

    public function ed($data) {
        die('<pre>' . print_r($data, true) . '</pre>');
    }

    public function ep($data) {
        echo('<pre>' . print_r($data, true) . '</pre>');
    }
    
    public function adminallowed() {
        if ($this->Session->read('adminlogin') != 'yes') {
            $this->redirect('/admin');
        } else if ($this->Session->read('userlogin') == 'yes') {
            $this->Session->delete('Auth');
            $this->Session->delete('adminlogin');
            $this->Session->delete('userlogin');
            $this->redirect('/admin');
        }
    }
    
    public function changeStatus($id, $modelname) {
        // Set the model and controller
        //$current_model = $this->modelClass; 
        $current_model = $modelname;
        $current_controller = $this->params['controller'];
        //$current_function = $this->params['action'];
        // Read the record
        $this->$current_model->id = $id;
        $record = $this->$current_model->read();
        if ($record[$current_model]['status'] == 'A') {
            $record[$current_model]['status'] = 'I';
        } else {
            $record[$current_model]['status'] = 'A';
        }
        $this->request->data[$current_model]['status'] = $record[$current_model]['status'];
        #$this->ed($this->request->data);
        $this->$current_model->save($this->request->data);
        $this->Session->setFlash(__('status change sucessfuly'), 'default', array(), 'auth');
        $this->redirect($_SERVER['HTTP_REFERER']);
    }

    
    

    
    
    
    
    
}
