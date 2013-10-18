<?php

/**
 * This is the model class for table "client_ledger".
 *
 * The followings are the available columns in table 'client_ledger':
 * @property integer $id
 * @property string $name
 * @property string $address
 * @property string $contact_number
 * @property string $email
 * @property string $message
 * @property string $entry_date
 * @property string $status_updated_date
 * @property string $status
 * @property string $notes
 */
class ClientLedger extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ClientLedger the static model class
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
		return 'client_ledger';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, address, contact_number, email, message, entry_date, status_updated_date, status, notes', 'required'),
			array('name, contact_number', 'length', 'max'=>100),
			array('address', 'length', 'max'=>500),
			array('email', 'length', 'max'=>50),
			array('status', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, address, contact_number, email, message, entry_date, status_updated_date, status, notes', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'address' => 'Address',
			'contact_number' => 'Contact Number',
			'email' => 'Email',
			'message' => 'Message',
			'entry_date' => 'Entry Date',
			'status_updated_date' => 'Status Updated Date',
			'status' => 'Status',
			'notes' => 'Notes',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('contact_number',$this->contact_number,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('entry_date',$this->entry_date,true);
		$criteria->compare('status_updated_date',$this->status_updated_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('notes',$this->notes,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}