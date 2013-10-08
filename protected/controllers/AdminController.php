<?php

class AdminController extends Controller
{
        public $layout = 'main_admin';
    
        public function filters()
	{
            return array(
                    'AccessControl'
            );
	}
        
	public function actionIndex()
	{
            $model = new Property();
            $dataProvider = new CActiveDataProvider('Property', array('pagination' => array('pageSize' => 50)));
        
            if (isset($_POST['Property'])) {
                $model->attributes = $_POST['Property'];
                
                $criteria = new CDbCriteria();
                
                if ($model->property_address != '') {
                    $criteria->addSearchCondition('property_address', $model->property_address, true);
                }
                if ($model->vendor_name != '') {
                    $criteria->addSearchCondition('vendor_name', $model->vendor_name, true);
                }
                if ($model->vendor_contact_home != '') {
                    $criteria->addSearchCondition('vendor_contact_home', $model->vendor_contact_home, true);
                }
                if ($model->vendor_contact_cell != '') {
                    $criteria->addSearchCondition('vendor_contact_cell', $model->vendor_contact_cell, true);
                }
                if ($model->vendor_email != '') {
                    $criteria->addSearchCondition('vendor_email', $model->vendor_email, true);
                }
                if ($model->cfe_meter != '') {
                    $criteria->addSearchCondition('cfe_meter', $model->cfe_meter, true);
                }

                //----------Advanced filters--------------------------------
                if ($model->ref_no != '') {
                    $criteria->addCondition("ref_no = '" . $model->ref_no . "'");
                }
                if ($model->status != '') {
                    $criteria->addCondition('status = ' . $model->status);
                }
                if ($model->for_sale != '') {
                    $criteria->addCondition('for_sale = ' . $model->for_sale);
                }
                
                $dataProvider = new CActiveDataProvider('Property', array('criteria'=>$criteria, 'pagination' => array('pageSize' => 50)));
            }
            
            $this->render('index', array('model' => $model, 'dataProvider'=>$dataProvider));
	}
        
        public function filterAccessControl($filterChain)
        {
            if (Yii::app()->user->isGuest){
                Yii::app()->user->setReturnUrl(Yii::app()->request->requestUri);
                $this->redirect(Yii::app()->baseUrl . '/site/login');
            }

            $filterChain->run();
        }         
}