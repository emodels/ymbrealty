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
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
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
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
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