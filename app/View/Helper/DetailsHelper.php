<?php

class detailsHelper extends AppHelper {

    public function usernameById($user_id) {
        App::import('Model', 'User');
        $user = new User();
        return $data = $user->usernameById($user_id);
    }

    public function userTypeById($user_id) {
        App::import('Model', 'User');
        $user = new User();
        return $data = $user->userTypeById($user_id);
    }

    
    
    public function postuserdetailsByid($user_id){
        #get group_name , first_name , last_name , profile_image
        App::import('Model', 'User');
        $user = new User();
        return $data = $user->forpostuserdetailsById($user_id);
        
    }
    
   
    
    
    
    
    

}