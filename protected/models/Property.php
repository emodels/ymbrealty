<?php

/**
 * This is the model class for table "property".
 *
 * The followings are the available columns in table 'property':
 * @property integer $id
 * @property string $ref_no
 * @property string $title
 * @property string $short_desc
 * @property string $full_desc
 * @property integer $bed_rooms
 * @property integer $bath_rooms
 * @property string $min_to_merida
 * @property string $min_to_beach
 * @property string $address
 * @property string $city
 * @property integer $state
 * @property double $price
 * @property double $mexican_peso_price
 * @property string $image_main
 * @property string $image_top_left
 * @property string $image_top_right
 * @property string $image_bottom_left
 * @property string $image_bottom_right
 * @property string $floor_plan
 * @property string $site_plan
 * @property string $keywords
 * @property integer $for_sale
 * @property integer $featured
 * @property integer $status
 * @property string $date_created
 * @property string $date_modified
 * @property string $property_address
 * @property string $cfe_meter
 * @property string $list_date
 * @property double $vendor_price
 * @property string $vendor_name
 * @property string $vendor_address
 * @property string $vendor_contact_home
 * @property string $vendor_contact_cell
 * @property string $vendor_email
 * @property string $vendor_skype
 * @property string $vendor_state_province
 * @property string $vendor_postcode_zip
 * @property string $vendor_country
 *
 * The followings are the available model relations:
 * @property State $state0
 * @property PropertyCategory[] $propertyCategories
 * @property PropertyImages[] $propertyImages
 */
class Property extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Property the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'property';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ref_no, title, short_desc, full_desc, bed_rooms, bath_rooms, min_to_merida, min_to_beach, address, city, state, price, mexican_peso_price, image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right, floor_plan, site_plan, keywords, for_sale, featured, status, date_created, date_modified, property_address, cfe_meter, list_date, vendor_price, vendor_name, vendor_address, vendor_contact_home, vendor_contact_cell, vendor_email, vendor_skype, vendor_state_province, vendor_postcode_zip, vendor_country', 'required'),
			array('bed_rooms, bath_rooms, state, for_sale, featured, status', 'numerical', 'integerOnly'=>true),
			array('price, mexican_peso_price, vendor_price', 'numerical'),
			array('ref_no, min_to_merida, min_to_beach', 'length', 'max'=>20),
			array('title, property_address, vendor_address', 'length', 'max'=>500),
			array('address', 'length', 'max'=>200),
			array('city, floor_plan, site_plan, cfe_meter, vendor_name, vendor_state_province, vendor_country', 'length', 'max'=>100),
			array('image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right, vendor_contact_home, vendor_contact_cell, vendor_email, vendor_skype', 'length', 'max'=>50),
			array('vendor_postcode_zip', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ref_no, title, short_desc, full_desc, bed_rooms, bath_rooms, min_to_merida, min_to_beach, address, city, state, price, mexican_peso_price, image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right, floor_plan, site_plan, keywords, for_sale, featured, status, date_created, date_modified, property_address, cfe_meter, list_date, vendor_price, vendor_name, vendor_address, vendor_contact_home, vendor_contact_cell, vendor_email, vendor_skype, vendor_state_province, vendor_postcode_zip, vendor_country', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'state0' => array(self::BELONGS_TO, 'State', 'state'),
			'propertyCategories' => array(self::HAS_MANY, 'PropertyCategory', 'property'),
			'propertyImages' => array(self::HAS_MANY, 'PropertyImages', 'property'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ref_no' => 'Ref No',
			'title' => 'Title',
			'short_desc' => 'Short Desc',
			'full_desc' => 'Full Desc',
			'bed_rooms' => 'Bed Rooms',
			'bath_rooms' => 'Bath Rooms',
			'min_to_merida' => 'Min To Merida',
			'min_to_beach' => 'Min To Beach',
			'address' => 'Address',
			'city' => 'City',
			'state' => 'State',
			'price' => 'Price',
			'mexican_peso_price' => 'Mexican Peso Price',
			'image_main' => 'Image Main',
			'image_top_left' => 'Image Top Left',
			'image_top_right' => 'Image Top Right',
			'image_bottom_left' => 'Image Bottom Left',
			'image_bottom_right' => 'Image Bottom Right',
			'floor_plan' => 'Floor Plan',
			'site_plan' => 'Site Plan',
			'keywords' => 'Keywords',
			'for_sale' => 'For Sale',
			'featured' => 'Featured',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'date_modified' => 'Date Modified',
			'property_address' => 'Property Address',
			'cfe_meter' => 'Cfe Meter',
			'list_date' => 'List Date',
			'vendor_price' => 'Vendor Price',
			'vendor_name' => 'Vendor Name',
			'vendor_address' => 'Vendor Address',
			'vendor_contact_home' => 'Vendor Contact Home',
			'vendor_contact_cell' => 'Vendor Contact Cell',
			'vendor_email' => 'Vendor Email',
			'vendor_skype' => 'Vendor Skype',
			'vendor_state_province' => 'Vendor State Province',
			'vendor_postcode_zip' => 'Vendor Postcode Zip',
			'vendor_country' => 'Vendor Country',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('ref_no',$this->ref_no,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('short_desc',$this->short_desc,true);
		$criteria->compare('full_desc',$this->full_desc,true);
		$criteria->compare('bed_rooms',$this->bed_rooms);
		$criteria->compare('bath_rooms',$this->bath_rooms);
		$criteria->compare('min_to_merida',$this->min_to_merida,true);
		$criteria->compare('min_to_beach',$this->min_to_beach,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('price',$this->price);
		$criteria->compare('mexican_peso_price',$this->mexican_peso_price);
		$criteria->compare('image_main',$this->image_main,true);
		$criteria->compare('image_top_left',$this->image_top_left,true);
		$criteria->compare('image_top_right',$this->image_top_right,true);
		$criteria->compare('image_bottom_left',$this->image_bottom_left,true);
		$criteria->compare('image_bottom_right',$this->image_bottom_right,true);
		$criteria->compare('floor_plan',$this->floor_plan,true);
		$criteria->compare('site_plan',$this->site_plan,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('for_sale',$this->for_sale);
		$criteria->compare('featured',$this->featured);
		$criteria->compare('status',$this->status);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('date_modified',$this->date_modified,true);
		$criteria->compare('property_address',$this->property_address,true);
		$criteria->compare('cfe_meter',$this->cfe_meter,true);
		$criteria->compare('list_date',$this->list_date,true);
		$criteria->compare('vendor_price',$this->vendor_price);
		$criteria->compare('vendor_name',$this->vendor_name,true);
		$criteria->compare('vendor_address',$this->vendor_address,true);
		$criteria->compare('vendor_contact_home',$this->vendor_contact_home,true);
		$criteria->compare('vendor_contact_cell',$this->vendor_contact_cell,true);
		$criteria->compare('vendor_email',$this->vendor_email,true);
		$criteria->compare('vendor_skype',$this->vendor_skype,true);
		$criteria->compare('vendor_state_province',$this->vendor_state_province,true);
		$criteria->compare('vendor_postcode_zip',$this->vendor_postcode_zip,true);
		$criteria->compare('vendor_country',$this->vendor_country,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}