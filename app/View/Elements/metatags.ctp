<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<?php
$seo_id = 0;
$seo_data['Seo'] = array('seo_title'=>'','seo_meta_tag'=>'','seo_meta_desc'=>'');
if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'display' ) // index page
{
    $seo_id = 1;
}
else if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'about' ) // about page
{
    $seo_id = 2;
}
else if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'gallery' ) // gallery page
{
    $seo_id = 3;
}
else if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'display_data' &&  $this->request['type'] == 'E' ) // event page
{
    $seo_id = 4;
}
else if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'display_data' &&  $this->request['type'] == 'N' ) // event page
{
    $seo_id = 5;
}
else if( $this->request['controller'] == 'pages' &&  $this->request['action'] == 'display_data' &&  $this->request['type'] == 'S' ) // event page
{
    $seo_id = 6;
}    
$seo_data = ClassRegistry::init("Seo")->find('first',array(
                            'conditions' => array('id' => $seo_id)
                        ));
if( isset($seo_data['Seo']['seo_title']) && $seo_data['Seo']['seo_title'] != '' 
   && isset($seo_data['Seo']['seo_meta_tag']) && $seo_data['Seo']['seo_meta_tag'] != '' 
   && isset($seo_data['Seo']['seo_meta_desc']) && $seo_data['Seo']['seo_meta_desc'] != '')
{
?>
<meta name="keywords" content="<?php echo $seo_data['Seo']['seo_meta_tag'];?>" />
<meta name="description" content="<?php echo $seo_data['Seo']['seo_meta_desc'];?>" />
<title><?php echo $seo_data['Seo']['seo_title'];?></title>   
<?php }else{ ?>
 <title>Saraswati Public Schools</title>     
<?php }?>    
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">