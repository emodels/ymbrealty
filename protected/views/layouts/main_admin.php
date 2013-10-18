<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style type="text/css">
            #content { border-top: 0px; }
        </style>
        <script type="text/javascript">
            function NavigateSearch(str_URL){
                var mydiv = document.getElementById('redirect_form').innerHTML = '<form id="form_redirect" method="post" action="' + str_URL + '"><input name="mode" type="hidden" value="init_session" /></form>';
                f=document.getElementById('form_redirect');
                if(f){
                    f.submit();
                }
            }
        </script>
</head>
<body>
    <?php
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {
            echo '<ul class="flashes" style="list-style-type:none; margin: 0px; padding: 0px">';
            foreach($flashMessages as $key => $message) {
                echo '<li><div class="flash-' . $key . '">' . $message . "</div></li>\n";
            }
            echo '</ul>';
            Yii::app()->clientScript->registerScript(
            'myHideEffect',
            '$(".flashes").animate({opacity: 1.0}, 3000).fadeOut("slow");',
            CClientScript::POS_READY
            );            
        }
    ?>
   <div class="container">
      <div class="primary_background">
          <div class="row" style="height: 100%; display: inline-table;">
              <div class="column" style="width: 1176px; margin: 0 0 0 8px; border-top: solid 2px gray">
                  <div class="row" style="border-bottom: solid 2px gray; background: white">
                      <div class="row" style="padding: 16px 10px 10px 10px; font-size: 28px; color: black"><strong>Ymb Admin Control</strong></div>
                      <div class="column right" style="margin-right: 0px">
                          <div class="row" style="padding-top: 12px">
                              <div id="menu_add_new_property" class="column box_top_header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/addproperty" style="color: white; text-decoration: none">Add New Property</a></div>
                              <div id="menu_search_property" class="column box_top_header"><a href="javascript:NavigateSearch('<?php echo Yii::app()->request->baseUrl; ?>/admin'); return false;" style="color: white; text-decoration: none">Search Property</a></div>
                              <div id="menu_featured_property" class="column box_top_header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/featuredproperty" style="color: white; text-decoration: none">Featured Properties</a></div>
                              <div id="menu_profile"  class="column box_top_header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin/profile" style="color: white; text-decoration: none">Edit Profile</a></div>
                              <div class="column box_top_header"><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout" style="color: white; text-decoration: none">Logout</a></div>
                              <div class="clearfix"></div>
                          </div>
                      </div>
                      <div class="clearfix"><div id="redirect_form"></div></div>
                  </div>
                  <div class="row" style="padding: 10px; background: white">
                      <?php echo $content ?>
                  </div>
              </div>
          </div> 
          <div class="clearfix"></div>
      </div>
      <div id="footer">
          <div style="text-align: center; padding: 10px 0 10px 0; color: white">Yucatán México Beach Realty <br/>All Rights Reserved<br/><br/><a href="http://www.emodelslanka.com" target="_blank" style="color: white">Developed by Emodels Technologies (Pvt) Limited</a></div>
      </div>
   </div>
</body>
</html>
