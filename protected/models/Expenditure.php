<?php

/**
 * This is the model class for table "expenditure".
 *
 * The followings are the available columns in table 'expenditure':
 * @property integer $ID
 * @property string $country_name
 * @property string $city_name
 * @property string $currency
 * @property integer $accommodation_expenses
 * @property integer $diet_expenses
 * @property integer $miscellaneous_expenses
 *
 * The followings are the available model relations:
 * @property Itinerary[] $itineraries
 */
class Expenditure extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expenditure the static model class
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
		return 'expenditure';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_name, currency, accommodation_expenses, diet_expenses, miscellaneous_expenses', 'required'),
			array('accommodation_expenses, diet_expenses, miscellaneous_expenses', 'numerical', 'integerOnly'=>true),
			array('country_name, city_name', 'length', 'max'=>20),
			array('currency', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ID, country_name, city_name, currency, accommodation_expenses, diet_expenses, miscellaneous_expenses', 'safe', 'on'=>'search'),
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
			'itineraries' => array(self::HAS_MANY, 'Itinerary', 'visit_place'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID' => 'ID',
			'country_name' => '出访国家',
			'city_name' => '出访地区',
			'currency' => '币种',
			'accommodation_expenses' => '住宿费（每人每天）',
			'diet_expenses' => '伙食费（每人每天）',
			'miscellaneous_expenses' => '公杂费（每人每天）',
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

		$criteria->compare('ID',$this->ID);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('city_name',$this->city_name,true);
		$criteria->compare('currency',$this->currency,true);
		$criteria->compare('accommodation_expenses',$this->accommodation_expenses);
		$criteria->compare('diet_expenses',$this->diet_expenses);
		$criteria->compare('miscellaneous_expenses',$this->miscellaneous_expenses);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}