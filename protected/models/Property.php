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
			array('ref_no, title, short_desc, full_desc, bed_rooms, bath_rooms, min_to_merida, min_to_beach, address, city, state, price, image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right, floor_plan, site_plan, keywords, for_sale, featured, status, date_created, date_modified', 'required'),
			array('bed_rooms, bath_rooms, state, for_sale, featured, status', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('ref_no, min_to_merida, min_to_beach', 'length', 'max'=>20),
			array('title', 'length', 'max'=>500),
			array('address', 'length', 'max'=>200),
			array('city, floor_plan, site_plan', 'length', 'max'=>100),
			array('image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, ref_no, title, short_desc, full_desc, bed_rooms, bath_rooms, min_to_merida, min_to_beach, address, city, state, price, image_main, image_top_left, image_top_right, image_bottom_left, image_bottom_right, floor_plan, site_plan, keywords, for_sale, featured, status, date_created, date_modified', 'safe', 'on'=>'search'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}