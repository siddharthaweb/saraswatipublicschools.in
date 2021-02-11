<?php
App::uses('AuthComponent', 'Controller/Component');
class User extends AppModel {
    public $name = 'User';
    public $validate = array(
        'oldpass' => array('rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter old password.'
            ),
            'rule2' => array(
                'rule' => 'checkoldpassword',
                'message' => 'Incorrect old password')
        ),
        'password' => array(
            'rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter a password'
            ),
            'rule2' => array(
                'rule' => array('minLength', 5),
                'message' => 'Minimum length of 5 characters'
            ),
            'rule3' => array(
                'rule' => 'comparepassword',
                'message' => 'Please re-enter the password')
        ),
        'password_confirm' => array('rule' => 'notEmpty', 'message' => 'Please enter password.'),
        'email' => array('rule1' => array(
                'rule' => 'notEmpty',
                'message' => 'Please enter your email address'
            ),
            'rule2' => array(
                'rule' => 'checkemailexists',
                'message' => 'Email address already exists')
        ),
        'first_name' => array('rule' => 'notEmpty', 'message' => 'Please enter your surname'),
        'last_name' => array('rule' => 'notEmpty', 'message' => 'Please enter your given name'),
        'group_id' => array('rule' => 'notEmpty', 'message' => 'Please select a category.'),
        'status' => array('rule' => 'notEmpty', 'message' => 'Please select status.'),
        'dob' => array('rule' => 'dateDiff','message' => 'Must be at least 16 years old to register.')
    );

    public function comparepassword() {
        return ($this->data[$this->alias]['password'] === $this->data[$this->alias]['password_confirm']);
    }

    public function checkrecaptcha() {
        return ($this->data[$this->alias]['recaptcha_response_field'] === $this->data[$this->alias]['recaptcha_challenge_field']);
    }

    public function checkoldpassword() {
        $oldpassword = AuthComponent::password($this->data[$this->alias]['oldpass']);
        return $this->findAllByIdAndPassword($this->data[$this->alias]['id'], $oldpassword);
    }

    public function checkemailexists() {
        if (isset($this->data[$this->alias]['id'])) {
            $condition = array('email' => $this->data[$this->alias]['email'], 'id !=' => $this->data[$this->alias]['id']);
        } else {
            $condition = array('email' => $this->data[$this->alias]['email']);
        }
        $data = $this->find('first', array('conditions' => $condition));
        if (empty($data)) {
            return true;
        } else {
            return false;
        }
    }

    public function usernameById($id) {
        $data = false;
        if ($id == '1') {
            $dataval = $this->findById($id, array('first_name'));
            $data = $dataval['User']['first_name'];
        } else if ($id != '') {
            $sql = "SELECT CONCAT(first_name , last_name) AS FullName from users where id = " . $id;
            $dataval = $this->query($sql);
            $data = $dataval[0][0]['FullName'];
        }
        return $data;
    }

    public function userTypeById($id) {
        $data = $this->findById($id, array('type'));
        return $data['User']['type'];
    }

    function dateDiff() {
        $date1 = $this->data[$this->alias]['dob'];
        $date2 = date('Y-m-d');
        $diff = abs(strtotime($date2) - strtotime($date1));
        $years = floor($diff / (365*60*60*24));
        if ($years > 15) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllMember($type) {
        $data = $this->find('all', array('conditions' => array('type' => $type, 'status' => 'A'),
            'fields' => array('id')
                ));
        return $data;
    }

    public function getAllMemberByGroup($group_id) {
        $data = $this->find('all', array('conditions' => array('type' => 'U', 'status' => 'A', 'group_id' => $group_id),
            'fields' => array('id')
                ));
        return $data;
    }

//                            ,
//        'profile_picture' => array(
//                            'rule' => array('extension', array('gif', 'jpeg', 'png', 'jpg')),
//                            'message' => 'Please supply a valid image.'
//                        )
    # genarate password
    public function genaratepassword() {
        $length = 10;
        $alphabets = range('A', 'Z');
        $numbers = range('0', '9');
        $additional_characters = array('1', '3');
        $final_array = array_merge($alphabets, $numbers, $additional_characters);
        $password = '';
        while ($length--) {
            $key = array_rand($final_array);
            $password .= $final_array[$key];
        }
        return $password;
    }

    public function forpostuserdetailsById($user_id) {
        $user_type = $this->query("SELECT  `User`.`type` FROM `users` AS `User` WHERE `User`.`id` = " . $user_id);
        if ($user_type[0]['User']['type'] == 'U') {
            $sql = "SELECT `Group`.`name`, `User`.`profile_image`, CONCAT(`User`.`first_name` ,' ', `User`.`last_name`) AS `FullName`  FROM `users` AS `User` INNER JOIN `user_group_relations` AS `UserGroupRelation` ON (`UserGroupRelation`.`user_id` = `User`.`id`) INNER JOIN `groups` AS `Group` ON (`Group`.`id` = `UserGroupRelation`.`group_id`) WHERE `User`.`id` = " . $user_id;
        } else {
            $sql = "SELECT `User`.`profile_image`, CONCAT(`User`.`first_name` ,' ', `User`.`last_name`) AS `FullName`  FROM `users` AS `User` WHERE `User`.`id` = " . $user_id;
        }
        return $dataval = $this->query($sql);
    }

    public function userListByGroupID($group_id, array $fieldlist, array $condition) {
        $userList = $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'user_group_relations',
                    'alias' => 'UserGroupRelation',
                    'type' => 'inner',
                    'conditions' => array(
                        'User.id = UserGroupRelation.user_id'
                    )
                ),
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'conditions' => array(
                        'Group.id = UserGroupRelation.group_id',
                        'Group.id = ' . $group_id
                    )
                )
            ),
            'conditions' => $condition,
            'fields' => $fieldlist,
            'order' => array('User.first_name ASC')
                ));
        return $userList;
    }

    public function userAddListByGroupID($group_id, array $fieldlist, array $condition) {
        $userList = $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'user_group_add_relations',
                    'alias' => 'UserGroupAddRelation',
                    'type' => 'inner',
                    'conditions' => array('UserGroupAddRelation.user_id = User.id', 'UserGroupAddRelation.add_vertisement = "Y"')
                ),
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'conditions' => array(
                        'Group.id = UserGroupAddRelation.group_id',
                        'Group.id = ' . $group_id
                    )
                )
            ),
            'conditions' => $condition,
            'fields' => $fieldlist
                ));
        return $userList;
    }
    
    
    
    public function userListByGroupIdAndBlock($login_id,$group_id, array $fieldlist, array $condition) {
        $userList = $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'user_group_relations',
                    'alias' => 'UserGroupRelation',
                    'type' => 'inner',
                    'conditions' => array(
                        'User.id = UserGroupRelation.user_id'
                    )
                ),
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'conditions' => array(
                        'Group.id = UserGroupRelation.group_id',
                        'Group.id = ' . $group_id
                    )
                ),
                array(
                    'table' => 'message_block_users',
                    'alias' => 'MessageBlockUser',
                    'type' => 'inner',
                    'conditions' => array(
                        'MessageBlockUser.block_id = User.id',
                        'MessageBlockUser.user_id = '.$login_id                    )
                )
            ),
            'conditions' => $condition,
            'fields' => $fieldlist
                ));
        return $userList;
    }
    
    public function userListByGroupIdAndUnblock($login_user_id,$group_id, array $fieldlist, array $condition) {
            $block_user_list = $this->query('SELECT `block_id` FROM  `message_block_users` WHERE  `user_id` ='.$login_user_id);
            if(is_array($block_user_list)){
                $user_list = array();
                foreach($block_user_list as $val){
                    $user_list[] = $val['message_block_users']['block_id'];
                }
               
                $additional_conditions = array('User.id NOT' => $user_list);
                $condition = array_merge($condition, $additional_conditions);
            }
            
            $userList = $this->find('all', array(
            'joins' => array(
                array(
                    'table' => 'user_group_relations',
                    'alias' => 'UserGroupRelation',
                    'type' => 'inner',
                    'conditions' => array(
                        'User.id = UserGroupRelation.user_id',
                    )
                ),
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'inner',
                    'conditions' => array(
                        'Group.id = UserGroupRelation.group_id',
                        'Group.id = ' . $group_id
                    )
                )
            ),
            'conditions' => $condition,
            'fields' => $fieldlist,
            'order' => array('User.first_name ASC')    
                ));
        
        return $userList;
    }
    
  public function makenewarray(array $user_category_list, array $advertise_category_list){
    $data = array();
   if(is_array($user_category_list)){
       foreach($user_category_list as $key=>$val):
           $is_exist = ClassRegistry::init('UserGroupAddRelation')->findByUserIdAndGroupId($val['UserGroupRelation']['user_id'],$val['UserGroupRelation']['group_id'],array('add_vertisement'));
           if(!empty($is_exist)){
             $add_vertisement = $is_exist['UserGroupAddRelation']['add_vertisement']; 
           }else{
             $add_vertisement = ''; 
           }
       $data[] = array('user_id'=>$val['UserGroupRelation']['user_id'],'group_id'=>$val['UserGroupRelation']['group_id'],'add_vertisement'=>$add_vertisement);  
        endforeach;
   } 
    return $data;
  }
}
?>