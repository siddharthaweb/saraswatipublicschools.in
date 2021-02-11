<?php

class ContentsController extends AppController {
    public $name = 'Contents';
    public $uses = array();
    public $layout = 'adminDefault';
    var $paginate;
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

        $this->Auth->allow('index','details');

        #$this->Security->blackHoleCallback = 'blackhole';

          

    }

    

    public function admin_index($type) {

        if ($this->request->is('get') && !empty($this->request->query['title'])) {

            #$this->ed($this->request->query);

            $title = $this->request->query['title'] . '%';

            $additional_conditions = array('title' . " LIKE" => $title,'type' => $type);

        } else {

            $additional_conditions = array('type' => $type);

        }



        $this->paginate = array(

            'conditions' => array($additional_conditions),

            'limit' => ADMIN_DATA_PER_PAGE,

            'order' => array('position' => 'DESC')

        );

        $this->data = $this->paginate('Content');

        $count = $this->Content->find('count');

        $this->set(compact('count'));

    }



    public function admin_changestatus($id) {

        $this->changestatus($id, $modelname = 'Content');

    }

    

    public function admin_add() {

        $this->loadModel('Content');

        if ($this->request->is('post')) {

            #$this->ed($this->request->data);

            $this->Content->save($this->request->data);

            if (!empty($this->request->data['Content']['add_image']['name'])) {

                $file_ext = end(explode('.', $this->data['Content']['add_image']['name']));

                $file_name = $this->Content->id . '_event.' . $file_ext;

                move_uploaded_file($this->data['Content']['add_image']['tmp_name'], WWW_ROOT . DS . 'img/gallery/' . $file_name);

                $this->Content->updateAll(array('image' => "'$file_name'"), array('id' => $this->Content->id));

            }

        $this->Session->setFlash(__('Content has been saved'), 'default', array(), 'auth');

        $this->redirect('/admin/contents/index/'.$this->request->data['Content']['type']);

        }

    }



    public function admin_edit($id) {

        $this->layout = 'adminDefault';

        if (!empty($this->request->data)) {

            #$this->ed($this->request->data);

            $this->Content->id = $this->request->data['Content']['id'];

            $this->Content->save($this->request->data);

            if (!empty($this->request->data['Content']['edit_image']['name'])) {

                $file_ext = end(explode('.', $this->data['Content']['edit_image']['name']));

                $file_name = $this->Content->id . '_event.' . $file_ext;

                move_uploaded_file($this->data['Content']['edit_image']['tmp_name'], WWW_ROOT . DS . 'img/gallery/' . $file_name);

                $this->Content->updateAll(array('image' => "'$file_name'"), array('id' => $this->Content->id));

            }

            $this->Session->setFlash(__('Content has been updated'), 'default', array(), 'auth');

            $this->redirect('/admin/contents/index/'.$this->request->data['Content']['type']);

        }

        $this->data = $this->Content->findById($id);

    }    

    



    public function admin_delete($id,$type) {

        $this->autoRender = false;

        if (!$this->request->is('get')) {

            throw new MethodNotAllowedException();

        }

        $this->Content->id = $id;

        if (!$this->Content->exists()) {

            throw new NotFoundException(__('Content Group.'));

        }

        if ($this->Content->delete()) {

            @unlink('img/gallery/'.$id.'_event.JPG');

            $this->Session->setFlash(__('Content deleted.'), 'default', array(), 'auth');

        }else{

            $this->Session->setFlash(__('Content was not deleted.'), 'default', array(), 'auth');

        }

        $this->redirect('/admin/contents/index/'.$type);

    }

    

    public function index() {

         $this->changelayout();

         $this->data = $this->Content->find('all', array('conditions' => array('status' => 'A')));

         #$this->ep($this->data);

    }

    

      public function details($id) {

       $this->layout = 'default';          

       $this->data = $this->Content->findById($id);

	}

    

}