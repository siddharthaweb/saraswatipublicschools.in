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

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class SeosController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Seos';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 */
    
    
    public function admin_list() {
        $this->layout = 'adminDefault';
        $this->data = $this->Seo->find('all', array('order' => array('slug' => 'ASC')));
    }
    
    
    
    public function admin_edit($id) {
        $this->layout = 'adminDefault';
        if ($this->request->is('post')) {
            #$this->ed($this->request->data);
            $this->Seo->save($this->request->data);
            $this->Session->setFlash(__('Seo data has been updated'), 'default', array(), 'auth');
            $this->redirect('/admin/seos/list');
        }
        $this->data = $this->Seo->findById($id);
    }
    
    
    
    
    
    
    
}
