<?php echo $this->Html->script('ddaccordion',array('inline' => false));?>
    <script type="text/javascript">
   /***********************************************
    * Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
    * Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
    * This notice must stay intact for legal use
    ***********************************************/
    ddaccordion.init({
	    headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	    contentclass: "categoryitems", //Shared CSS class name of contents group
	    revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	    mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	    collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	    defaultexpanded: [1], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	    onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	    animatedefault: true, //Should contents open by default be animated into view?
	    persiststate: true, //persist state of opened contents within browser session?
	    toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	    togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	    animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	    oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		    //do nothing
	    },
	    onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		    //do nothing
	    }
    })
    </script>
	<div class="left_sec" >
			<div class="left_sec_box">					
			  <h2 class="menuheader expandable">Manage Account Information</h2>
			  <ul class="categoryitems">
				  <li><a href="<?php echo $this->Html->url('/admin/users/display/') ;?>">Home</a></li>
				  <li><a href="<?php echo $this->Html->url('/admin/users/changepass/') ;?>">Change Password</a></li>
				  <li><a href="<?php echo $this->Html->url('/admin/users/logout/') ;?>">Logout</a></li>
			  </ul>
                          
                          
                          <div class="menu_spliter">&nbsp;</div>			  
			  <!--<h2 class="menuheader expandable">Manage Content </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php //echo $this->Html->url('/admin/pages/list/') ;?>">List Content</a></li>
			  </ul>-->
                
              <h2 class="menuheader expandable">Manage Notice </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/contents/index/N') ;?>">List Notice</a></li>
                                <li><a href="<?php echo $this->Html->url('/admin/contents/add/N') ;?>">Add Notice</a></li>
			  </ul>
                
              <h2 class="menuheader expandable">Manage Event </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/contents/index/E') ;?>">List Event</a></li>
                                <li><a href="<?php echo $this->Html->url('/admin/contents/add/E') ;?>">Add Event</a></li>
			  </ul>
              
              <h2 class="menuheader expandable">Manage Student Corner </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/contents/index/S') ;?>">List Student Corner</a></li>
                                <li><a href="<?php echo $this->Html->url('/admin/contents/add/S') ;?>">Add Student Corner</a></li>
			  </ul>    
                
              
              <h2 class="menuheader expandable">Manage Seo </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/seos/list/') ;?>">List Seo</a></li>
			  </ul>   
                
              <h2 class="menuheader expandable">Manage Gallery </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/galleries/list/') ;?>">list Gallery img</a></li>
                                <li><a href="<?php echo $this->Html->url('/admin/galleries/add/') ;?>">Add Gallery img</a></li>
			  </ul>

			  <h2 class="menuheader expandable">Manage Booklet </h2>
			  <ul class="categoryitems">
                                <li><a href="<?php echo $this->Html->url('/admin/contents/index/B') ;?>">list Booklet</a></li>
                                <li><a href="<?php echo $this->Html->url('/admin/contents/add/B') ;?>">Add Booklet</a></li>
			  </ul>      
                                                    
		</div>		
	</div>