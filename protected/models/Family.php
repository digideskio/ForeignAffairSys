<?php

/**
 * This is the model class for table "family".
 *
 * The followings are the available columns in table 'family':
 * @property integer $family_id
 * @property integer $person_id
 * @property string $name
 * @property integer $age
 * @property string $political
 * @property string $work_unit
 * @property string $job
 * @property string $domicile
 * @property string $get_cityzenship
 * @property string $get_long_stay
 * @property string $get_permenent_stay
 *
 * The followings are the available model relations:
 * @property Person $person
 */
class Family extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Family the static model class
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
		return 'family';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, age, work_unit, job, domicile, get_cityzenship, called', 'required'),
			array('person_id, age', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>30),
			array('called', 'length', 'max'=>30),
			array('political', 'length', 'max'=>10),
			array('work_unit, domicile', 'length', 'max'=>50),
			array('job, get_cityzenship, get_long_stay', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('family_id, person_id, name, age, political, work_unit, job, domicile, get_cityzenship, get_long_stay', 'safe', 'on'=>'search'),
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
			'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'family_id' => '家庭成员id',
			'person_id' => '人员id',
			'name' => '姓名',
			'age' => '年龄',
			'political' => '政治面貌',
			'work_unit' => '工作单位',
			'job' => '职务',
			'domicile' => '居住地',
			'get_cityzenship' => '取得外国国籍',
			'get_long_stay' => '国外居留权',
			'called' =>'称谓',
			//'get_permenent_stay' => 'Get Permenent Stay',
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

		$criteria->compare('family_id',$this->family_id);
		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('called',$this->called,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('political',$this->political,true);
		$criteria->compare('work_unit',$this->work_unit,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('domicile',$this->domicile,true);
		$criteria->compare('get_cityzenship',$this->get_cityzenship,true);
		$criteria->compare('get_long_stay',$this->get_long_stay,true);
		//$criteria->compare('get_permenent_stay',$this->get_permenent_stay,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getPoliticalStatuss()
	{
		return array(
		'其他'=>'其他',
		'党员'=>'党员',
		'团员'=>'团员',
        
		);
	}
	public function getCityzenships()
	{
		return array(
		'否'=>'否',
		'是'=>'是',
		
		);
	}
	public function getStays()
	{
		return array(
		'无'=>'无',
		'国外长期居留权'=>'国外长期居留权',
		'国外永久居留权'=>'国外永久居留权',
		
		);
	}	
}