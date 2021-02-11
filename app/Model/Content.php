<?php

App::uses('AuthComponent', 'Controller/Component');

class Content extends AppModel {

    public $name = 'Content';

    public function booklet_link($type){
        $data = $this->find('all',array(
            'conditions' => array('type' => $type,'display_date <=' => date('Y-m-d')),
            'order' => array('position' => 'ASC'),
            'fields' => array('id','title')
        ));
        return $data;
    }

}

?>