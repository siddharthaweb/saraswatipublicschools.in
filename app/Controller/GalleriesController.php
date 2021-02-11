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
class GalleriesController extends AppController {

/**
 * Controller name
 *
 * @var string
 */
	public $name = 'Gallery';

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
    
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

        $this->Auth->allow('');

        if (isset($this->request->params['users'])) {

            $this->Security->requireSecure();
        }

        $this->Security->blackHoleCallback = 'blackhole';

        /*  if we use authentication from differnent  table  then we need thye below code  start added by anindita 17/5/12 */
    }

    
    public function admin_list() {
        $this->layout = 'adminDefault';
        #$this->data = $this->Gallery->find('all', array('order' => array('position' => 'ASC')));
        $additional_conditions = array();
        $this->paginate = array(
            'conditions' => array($additional_conditions),
            'limit' => ADMIN_DATA_PER_PAGE,
            'order' => array('position' => 'ASC')
        );
        $this->data = $this->paginate('Gallery');
        $count = $this->Gallery->find('count');
        $this->set(compact('count'));
	}
    
    public function admin_add() {
        $this->layout = 'adminDefault';
        $this->loadModel('Gallery');
        if ($this->request->is('post')) {
            $this->Gallery->save($this->request->data);
            if (!empty($this->request->data['Gallery']['add_image']['name'])) {
                $file_ext = end(explode('.', $this->data['Gallery']['add_image']['name']));
                $file_name = $this->Gallery->id . '_image.' . $file_ext;
                move_uploaded_file($this->data['Gallery']['add_image']['tmp_name'], WWW_ROOT . DS . 'img/gallery/' . $file_name);
                $this->Gallery->updateAll(array('image' => "'$file_name'"), array('id' => $this->Gallery->id));
            }
            $this->Session->setFlash(__('Gallery Image has been saved'), 'default', array(), 'auth');
            $this->redirect('/admin/galleries/list');
        }
	}
    
    public function admin_delete($id) {
        $this->layout = 'adminDefault';
        $this->autoRender = false;
        if (!$this->request->is('get')) {
            throw new MethodNotAllowedException();
        }
        $this->Gallery->id = $id;
        if (!$this->Gallery->exists()) {
            throw new NotFoundException(__('Gallery Image  not exists.'));
        }
        if ($this->Gallery->delete()) {
            @unlink('img/gallery/'.$id.'_image.JPG');
            $this->Session->setFlash(__('Gallery Image deleted.'), 'default', array(), 'auth');
            $this->redirect('/admin/galleries/list');
        }
        $this->Session->setFlash(__('Gallery Image was not deleted.'), 'default', array(), 'auth');
        $this->redirect('/admin/galleries/list');
    }

    public function admin_edit($id) {
        $this->layout = 'adminDefault';
        if (!empty($this->request->data)) {
            #$this->ed($this->request->data);
            //$this->Advertise->set($this->request->data);
            //if ($this->Advertise->validates()) {
            $this->Gallery->id = $this->request->data['Gallery']['id'];
            $this->Gallery->save($this->request->data);
            if (!empty($this->request->data['Gallery']['add_image']['name'])) {
                $file_ext = end(explode('.', $this->data['Gallery']['add_image']['name']));
                $file_name = $this->Gallery->id . '_image.' . $file_ext;
                move_uploaded_file($this->data['Gallery']['add_image']['tmp_name'], WWW_ROOT . DS . 'img/gallery/' . $file_name);
                $this->Gallery->updateAll(array('image' => "'$file_name'"), array('id' => $this->Gallery->id));
            }
            $this->Session->setFlash(__('Gallery Image has been updated'), 'default', array(), 'auth');
            $this->redirect('/admin/galleries/list');
            //}
        }
        $this->data = $this->Gallery->findById($id);
    }

    public function admin_changeadvertisesstatus($id) {
        $this->layout = 'adminDefault';
        $this->changestatus($id, $modelname = 'Gallery');
    }

    
}
