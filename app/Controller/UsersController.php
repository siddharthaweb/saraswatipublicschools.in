<?php

App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController {
    ## define layout ##
    
    
    public $layout = 'adminDefault';
    public $name = 'Users';
    public $uses = array();
    var $paginate;
    public $helpers = array('Session', 'Details');
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

        $this->Auth->allow('admin_forgotpassword');

        if (isset($this->request->params['users'])) {

            $this->Security->requireSecure();
        }

        $this->Security->blackHoleCallback = 'blackhole';

        /*  if we use authentication from differnent  table  then we need thye below code  start added by anindita 17/5/12 */
    }

    public function blackhole($type) { // handle errors.
    }
    
    function beforeRender() {

        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");

        header("Pragma: no-cache");

        header("Expires: " . date("D, d M Y H:i:s") . " GMT");
    }
    

    public function admin_login() {
        $this->layout = 'adminLogin';
        if ($this->request->is('post')) {
            #$this->ed(AuthComponent::password($this->data['User']['password'])); // ecb2175c68bc673c93ea7081053fa81388cdd4a7
            if ($this->Auth->login()) {
                $this->loginUser = AuthComponent::user();
                $this->Session->write('adminlogin', 'yes');
                return $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Username or password is incorrect.'), 'default', array(), 'auth');
            }
        }
    }

    public function admin_display() {

        $this->adminallowed();

        $this->User->id = $this->Session->read('Auth.User.id');

        $this->data = $this->User->read();

        //$this->ep($this->data);
    }

    public function admin_edit_details($id) {

        $this->adminallowed();

        if ($this->request->data) {

            $this->User->set($this->request->data);

            if ($this->User->validates()) {

                #$this->ed($this->request->data);

                $this->User->save($this->request->data);

                $this->Session->setFlash(__('Administrator details has been updated'), 'default', array(), 'auth');

                $this->redirect('/admin/users/display');
            }
        }

        $this->data = $this->User->findById($id = $this->Session->read('Auth.User.id'));
    }

    public function admin_logout() {

        $this->adminallowed();

        $this->Session->delete('adminlogin');

        $this->Session->delete('Auth');

        $this->Session->destroy();

        $this->Session->delete('CAKEPHP');

        $this->redirect($this->Auth->logout());
    }

    public function admin_forgotpassword() {
        $this->layout = 'adminLogin';

        if ($this->request->is('post')) {



            #$this->ed($this->request->data);



            $getemail = $this->User->findByEmail($this->data['User']['email']);

            #$this->ed($getemail);

            if (!empty($getemail)) {



                ## genarate password start ##



                $password = $this->User->genaratepassword(); //'admin'; 



                $username = $getemail['User']['first_name'];



                $authinticatepassword = AuthComponent::password($password);



                $this->User->updateAll(array('password' => "'$authinticatepassword'"), array('id' => $getemail['User']['id']));



                ## genarate password end ##  
                //send email to admin



                $email = new CakeEmail();



                $email->template('forgotpassword', 'default')
                        ->viewVars(array('password' => $password, 'username' => $username))
                        ->emailFormat('html')
                        ->from(array($this->data['User']['email'] => Configure::read('emailheader')))
                        ->to($this->data['User']['email'])
                        ->subject('Administrator Forgot password')
                        ->send('forgot password');



                $this->Session->setFlash(__('Please check your email – we sent an email with your temporary password'), 'default', array(), 'auth');
            } else {

                $this->Session->setFlash(__('Email address is not correct'), 'default', array(), 'auth');
            }
        }
    }

    public function admin_changepass() {

        $this->adminallowed();



        if ($this->request->is('post')) {



            #$this->ed($this->request->data);



            $this->User->set($this->request->data);



            if ($this->User->validates()) {



                $authinticatepassword = AuthComponent::password($this->data['User']['password']);



                $this->User->updateAll(array('password' => "'$authinticatepassword'"), array('id' => $this->Session->read('Auth.User.id')));



                $this->Session->setFlash(__('Password has been changed'), 'default', array(), 'auth');
            }
        }
    }

   

   

}