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
          <div id="header">
              <div id="menu_top">
                  <div class="row">
                      <div class="column" style="width: 100px; text-align: right; margin-right: 20px"><a href="<?php echo Yii::app()->baseUrl; ?>/index.php" class="active_link">Home</a></div>
                      <div class="column"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sun_2.jpg"></div>
                  </div>
                  <div class="row" style="margin-top: 28px">
                      <div class="column" style="width: 100px; text-align: right; margin-right: 20px"><a href="<?php echo Yii::app()->baseUrl; ?>/contact" class="link">Contact Us</a></div>
                      <div class="column"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sun_1.jpg"></div>
                  </div>
              </div>
              <div id="pay_your_airfare">“I pay your airfare and accommodations when you buy and renovate with YMB Realty.”</div>
              <div id="tag_line">
                  <div class="column" style="padding-left: 140px">Real Estate</div>
                  <div class="column" style="padding-left: 50px">Construction</div>
                  <div class="column" style="padding-left: 50px">Business Opportunities</div>
                  <div class="clearfix"></div>
              </div>
              <a id="google_earth" href="#"></a>
          </div>
          <div class="row" style="height: 100%; display: inline-table;">
              <div class="column" style="width: 916px;"><?php echo $content ?></div>
              <div class="right" id="sidebar">
                  <div class="column orange_line" style="margin: 0px"></div>
                  <div class="column" style="margin: 25px 0 5px 7px">
                      <div style="text-align: center; color: red; font-size: 22px; font-weight: bold; padding-bottom: 25px">$  MILLION  $<br/>Dollar Resources</div>
                      <div><a href="http://retiretomexicoblog.com/" target="_blank"><img border="0" src="<?php echo Yii::app()->request->baseUrl; ?>/images/20secrets.jpg"></a></div>
                      <div style="padding-top: 30px"><a href="about"><img border="0" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Testimonials.jpg"></a></div>
                  </div>
                  <div class="clearfix"></div>
              </div>
          </div> 
          <div class="clearfix"></div>
      </div>
      <div id="footer">
          <div class="outer_layer">
              <div class="inner_layer" style="text-align: center">
                  <div style="margin-left: 510px; font-size: 24px; color: black; font-weight: bold; padding: 10px 0 5px 0; position: absolute">Contact Us</div>
                  <div class="row" style="padding: 10px 10px 20px 10px; display: inline-block">
                      <div class="column" style="width: 545px; padding-right: 10px; margin-left: 10px">
                          <div class="row" style="text-align: center; display: inline-block; padding-left: 17px">
                              <div class="column"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/english_flag.png"/></div>
                              <div class="column" style="font-size: 16px; color: navy; font-weight: bolder; padding-top: 7px">English</div>
                              <div class="clearfix"></div>
                          </div>
                          <div style="margin-top: 10px; padding: 10px; background: white; border-radius: 20px; border: solid 1px gray">
                              <div class="row">
                                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/rob_harker.png"/>
                                  <div style="font-size: 16px; color: black; font-weight: bolder; margin: 10px 0 10px 0">Rob Harker</div>
                              </div>
                              <div class="row" style="text-align: left; padding-left: 65px">
                                  <div class="row">
                                      <div class="column" style="width: 125px; padding-top: 17px; font-size: 14px; color: black; font-weight: bold">Skype :</div>
                                      <div class="column" style="padding-left: 8px"><a href="skype:yucatanrob"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/skype_icon.png" class="opacity_effect"/></a></div>
                                      <div class="column" style="margin-top: 15px"><a href="skype:yucatanrob" style="font-size: 14px"><b>yucatanrob</b></a></div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:20px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Office number :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px">011-52-969-934-8010</div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:25px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Cell :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px">999-129-7321</div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:25px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Email :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px"><a href="mailto:rob@ymbrealty.com">rob@ymbrealty.com</a></div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                      </div>
                      <div class="column" style="width: 545px">
                          <div class="row" style="text-align: center; display: inline-block; padding-left: 17px">
                              <div class="column"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/spanish_flag.png"/></div>
                              <div class="column" style="font-size: 16px; color: navy; font-weight: bolder; padding-top: 6px">Spanish</div>
                              <div class="clearfix"></div>
                          </div>
                          <div style="margin-top: 12px; padding: 10px; background: white; border-radius: 20px; border: solid 1px gray">
                              <div class="row">
                                  <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/roxana_hernandez.png"/>
                                  <div style="font-size: 16px; color: black; font-weight: bolder; margin: 10px 0 10px 0">Roxana Hernandez</div>
                              </div>
                              <div class="row" style="text-align: left; padding-left: 33px">
                                  <div class="row">
                                      <div class="column" style="width: 125px; padding-top: 17px; font-size: 14px; color: black; font-weight: bold">Skype :</div>
                                      <div class="column" style="padding-left: 8px"><a href="skype:roxanahern"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/skype_icon.png" class="opacity_effect"/></a></div>
                                      <div class="column" style="margin-top: 15px"><a href="skype:roxanahern" style="font-size: 14px"><b>roxanahern</b></a></div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:20px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Office number :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px">011-52-969-934-8010</div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:25px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Cell :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px">999-129-7321</div>
                                      <div class="clearfix"></div>
                                  </div>
                                  <div class="row" style="padding-top:25px">
                                      <div class="column" style="width: 125px; font-size: 14px; color: black; font-weight: bold">Email :</div>
                                      <div class="column" style="font-size: 14px; color: gray; font-weight: bold; padding-left: 10px"><a href="mailto:roxana@ymbrealty.com">roxana@ymbrealty.com</a></div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                              <div class="clearfix"></div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row" style="text-align: center; padding: 10px; background: white; font-size: 22px; color: red">Enjoy the life you have always wanted to live...Lower taxes – fewer laws -  near perfect weather <br/> – and a hassle free lifestyle  !!!</div>
              <div class="row" style="text-align: center; padding: 10px; background: white; font-size: 24px; color: black; font-weight: bold">We look forward to speaking with you  !!!</div>
              <div class="row" style="text-align: center">
                  <div style="display: inline-block; width: 300px; padding: 20px 0 20px 50px">
                    <!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style addthis_32x32_style">
                    <a class="addthis_button_preferred_1"></a>
                    <a class="addthis_button_preferred_2"></a>
                    <a class="addthis_button_preferred_3"></a>
                    <a class="addthis_button_preferred_4"></a>
                    <a class="addthis_button_compact"></a>
                    <a class="addthis_counter addthis_bubble_style"></a>
                    </div>
                    <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=lankahotelguide"></script>
                    <!-- AddThis Button END -->
                  </div>
              </div>
          </div>
          <div style="text-align: center; padding: 10px 0 10px 0; color: white">Yucatán México Beach Realty <br/>All Rights Reserved<br/><br/><a href="http://www.emodelslanka.com" target="_blank" style="color: white">Developed by Emodels Technologies (Pvt) Limited</a></div>
      </div>
   </div>
</body>
</html>
