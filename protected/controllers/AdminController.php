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

                //----------Advanced filters------------------------------------
                if ($model->ref_no != '') {
                    $criteria->addCondition("ref_no = '" . $model->ref_no . "'");
                }
                if ($model->status != '') {
                    $criteria->addCondition('status = ' . $model->status);
                }
                if ($model->for_sale != '') {
                    $criteria->addCondition('for_sale = ' . $model->for_sale);
                }
                
                //---------------Status-----------------------------------------
                if (isset($_POST['mode']) && isset($_POST['id']) && $_POST['mode'] == 'status' && $_POST['id'] != '') {
                    $property = Property::model()->findByPk($_POST['id']);
                    
                    if (isset($property)) {
                        if($property->status == 0){
                           $property->status = 1; 
                        } else {
                           $property->status = 0;  
                        }
                        
                        $property->save(false);
                    }
                }
                //--------------------------------------------------------------
                
                //-----------------Type-----------------------------------------
                if (isset($_POST['mode']) && isset($_POST['id']) && $_POST['mode'] == 'type' && $_POST['id'] != '') {
                    $property = Property::model()->findByPk($_POST['id']);
                    
                    if (isset($property)) {
                        if($property->for_sale == 0){
                           $property->for_sale = 1; 
                        } else {
                           $property->for_sale = 0;  
                        }
                        
                        $property->save(false);
                    }
                }
                //--------------------------------------------------------------

                //-----------------Delete Property------------------------------
                if (isset($_POST['mode']) && isset($_POST['id']) && $_POST['mode'] == 'delete' && $_POST['id'] != '') {
                    $property = Property::model()->findByPk($_POST['id']);
                    
                    if (isset($property)) {
                        $property->delete();
                    }
                }
                //--------------------------------------------------------------
                
                $dataProvider = new CActiveDataProvider('Property', array('criteria'=>$criteria, 'pagination' => array('pageSize' => 50)));
            }
            
            $this->render('index', array('model' => $model, 'dataProvider'=>$dataProvider));
	}
        
        public function actionAddProperty(){
            $model = new Property();
            
            //-----Get Max value-----------
            $prop_max = Property::model()->find(array('order'=>'id DESC'));
            $model->ref_no = $prop_max->ref_no + 1;
            //-----------------------------
            
            if (isset($_POST['Property'])) {
                $model->attributes = $_POST['Property'];

                $model->min_to_merida = 'n/a';
                $model->min_to_beach = 'n/a';
                $model->image_top_left = 'n/a';
                $model->image_top_right = 'n/a';
                $model->image_bottom_left = 'n/a';
                $model->image_bottom_right = 'n/a';
                $model->floor_plan = 'n/a';
                $model->site_plan = 'n/a';
                $model->featured = 0;
                $model->status = 1;
                $model->date_created = Yii::app()->dateFormatter->format('yyyy-MM-dd', time());
                $model->date_modified = Yii::app()->dateFormatter->format('yyyy-MM-dd', time());
                $model->list_date = Yii::app()->dateFormatter->format('yyyy-MM-dd', strtotime($model->list_date));
                
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'New Property Added');
                    $this->refresh();
                } else {
                    var_dump($model->getErrors());
                }
            }
            
            $this->render('addproperty', array('model' => $model));
        }
        
        public function actionEditPropery($id){
            echo $id;
        }
        
        public function actionUpload($id)
        {
                Yii::import("ext.EAjaxUpload.qqFileUploader");

                $folder='property_images/';
                $allowedExtensions = array("jpg","jpeg","gif");
                $sizeLimit = 2 * 1024 * 1024;
                
                $uploader = new qqFileUploader($allowedExtensions, $sizeLimit, 'image_' . $id . '_' . time());
                
                $result = $uploader->handleUpload($folder);
                $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

                $fileSize=filesize($folder.$result['filename']);
                $fileName=$result['filename'];

                echo $return;
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