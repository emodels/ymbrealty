<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
                $criteria=new CDbCriteria(array(
                        'condition' => 'featured = 1',
                        'order' => 'price ASC'
                ));

                $dataProvider = new CActiveDataProvider('Property', array('criteria'=>$criteria, 'pagination' => array('pageSize' => 50)));

                $this->render('index', array('dataProvider' => $dataProvider));
	}

        public function actionCriticalInformation(){
            $this->render('critical_information');
        }
        
        public function actionCheckProperty($mode, $value){
            if ($mode == 'id') {
                $model = Property::model()->findByAttributes(array('ref_no' => $value));

                if (!isset($model)) {
                    echo '';
                } else {
                    echo $model->id;
                }
            } else {
                $model = Property::model()->findByAttributes(array('price' => floatval($value)));

                if (!isset($model)) {
                    echo '';
                } else {
                    echo $model->id;
                }
            }
        }
        
        public function actionProperty($id){
            $model = Property::model()->findByAttributes(array('id' => $id));
            
            if (!isset($model)) {
                Yii::app()->user->setFlash('notice','Invalid Property ID');
                $this->redirect(Yii::app()->baseUrl);
            }
            
            $this->render('property', array('model' => $model));
        }
        
        public function actionPropertyListing($category = NULL){
            if ($category == null) {
                $criteria=new CDbCriteria(array(
                        'condition' => 'status = 1 AND for_sale = 1',
                        'order' => 'price ASC'
                ));
            }
            else {
                $criteria=new CDbCriteria(array(
                        'condition' => 'status = 1 AND for_sale = 1',
                        'order' => 'price ASC'
                ));
            }
            
            if (isset($_GET['price_range'])){
                $criteria->addBetweenCondition('price', $_GET['price_range'], $_GET['price_range'] + 10000);
            }
            
            $dataProvider = new CActiveDataProvider('Property', array('criteria'=>$criteria, 'pagination' => array('pageSize' => 50)));
            
            $this->render('propertylisting', array('dataProvider' => $dataProvider));
        }
        
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

        public function actionAbout(){
		$this->render('pages/about');
        }
        
        public function actionGoogleEarth(){
		$this->render('pages/googleearth');
        }

        /**
	 * Displays the contact page
	 */
	public function actionContact()
	{
            $model=new ClientLedger();
            $prop_array = array();
            
            if (isset(Yii::app()->session['contact_prop_array'])) {
                $prop_array = Yii::app()->session['contact_prop_array'];
            }
            
            if (isset($_GET['PROPID'])) {
               if (!in_array($_GET['PROPID'], $prop_array)){ 
                   $prop_array[] =  $_GET['PROPID'];
                   Yii::app()->session['contact_prop_array'] = $prop_array;
               }
            }
            
            $message = '';
            foreach ($prop_array as $value) {
                $message = $message . 'Property #' . $value . ', ';
            }
            $model->message = $message;
            
            if(isset($_POST['ClientLedger']))
            {
                $model->attributes=$_POST['ClientLedger'];
                $model->entry_date = Yii::app()->dateFormatter->format('yyyy-MM-dd', time());
                $model->status_updated_date = Yii::app()->dateFormatter->format('yyyy-MM-dd', time());
                $model->status = 'Initial Client Contact';
                $model->notes = 'n/a';
                
                if($model->save()){
                    //---------------Email notification to Admin--------------------------------------------------------
                    $message = $this->renderPartial('//email/template/contact_form_submit', array('model'=>$model), true);

                    if (isset($model) && isset($message) && $message != "") {
                        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
                        $mailer->Host = Yii::app()->params['SMTP_Host'];
                        $mailer->Port = Yii::app()->params['SMTP_Port'];
                        if (Yii::app()->params['SMTPSecure'] == TRUE){
                            $mailer->SMTPSecure = 'ssl';
                        }
                        $mailer->IsSMTP();
                        $mailer->SMTPAuth = true;
                        $mailer->Username = Yii::app()->params['SMTP_Username'];
                        $mailer->Password = Yii::app()->params['SMTP_password'];
                        $mailer->From = Yii::app()->params['SMTP_Username'];
                        $mailer->AddReplyTo(Yii::app()->params['SMTP_Username']);
                        $mailer->AddAddress(Yii::app()->params['adminEmail']);
                        $mailer->FromName = 'YMB Realty';
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = 'YMB Realty : Contact enquiry from - ' . $model->name;
                        $mailer->IsHTML();
                        $mailer->Body = $message;
                        $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                        try{     
                            $mailer->Send();
                        }
                        catch (Exception $ex){
                            echo $ex->getMessage();
                        }
                    }
                    //---------------Email confirmation / notification to Client-------------------------------------------------
                    $message = '';
                    $message = $this->renderPartial('//email/template/contact_submit_notification', array('model'=>$model), true);

                    if (isset($model) && isset($message) && $message != "") {
                        $mailer = Yii::createComponent('application.extensions.mailer.EMailer');
                        $mailer->Host = Yii::app()->params['SMTP_Host'];
                        $mailer->Port = Yii::app()->params['SMTP_Port'];
                        if (Yii::app()->params['SMTPSecure'] == TRUE){
                            $mailer->SMTPSecure = 'ssl';
                        }
                        $mailer->IsSMTP();
                        $mailer->SMTPAuth = true;
                        $mailer->Username = Yii::app()->params['SMTP_Username'];
                        $mailer->Password = Yii::app()->params['SMTP_password'];
                        $mailer->From = Yii::app()->params['SMTP_Username'];
                        $mailer->AddReplyTo(Yii::app()->params['SMTP_Username']);
                        $mailer->AddAddress($model->email);
                        $mailer->AddCC(Yii::app()->params['adminEmail']);
                        $mailer->FromName = 'YMB Realty';
                        $mailer->CharSet = 'UTF-8';
                        $mailer->Subject = 'YMB Realty - Contact enquiry confirmation for client : ' . $model->name;
                        $mailer->IsHTML();
                        $mailer->Body = $message;
                        $mailer->SMTPDebug  = Yii::app()->params['SMTPDebug'];

                        try{     
                            $mailer->Send();
                        }
                        catch (Exception $ex){
                            echo $ex->getMessage();
                        }
                    }
                    
                    unset(Yii::app()->session['contact_prop_array']);
                    $model=new ClientLedger();
                    
                    Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
                }
            }
            $this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
            $model=new LoginForm;

            /**
             * Check for Remember me cookie and show user name
             */
            if (isset(Yii::app()->request->cookies['remember_me'])) {
               $model->username = Yii::app()->request->cookies['remember_me']->value;
               $model->rememberMe = 1;
            }
            
            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                    $model->attributes=$_POST['LoginForm'];
                    // validate user input and redirect to the previous page if valid
                    if($model->validate() && $model->login()){
                        
                        /**
                         * Configure remember me cookie
                         */
                        if ($model->rememberMe == 1) {
                            unset(Yii::app()->request->cookies['remember_me']);
                            $cookie = new CHttpCookie('remember_me', $model->username);
                            $cookie->expire = time()+60*60*24*180; 
                            Yii::app()->request->cookies['remember_me'] = $cookie;
                        }
                        else{
                            if (isset(Yii::app()->request->cookies['remember_me'])) {
                                unset(Yii::app()->request->cookies['remember_me']);
                            }
                        }
                        
                        $this->redirect(Yii::app()->user->returnUrl);
                    }        
            }
            // display the login form
            $this->render('login',array('model'=>$model));
        }

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}