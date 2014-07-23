<?php

/**
 * This is the model class for table "itinerary".
 *
 * The followings are the available columns in table 'itinerary':
 * @property integer $itinerary_id
 * @property string $invit_unit
 * @property string $visit_place
 * @property integer $stay_days
 * @property integer $visit_id
 *
 * The followings are the available model relations:
 * @property Visit $visit
 */
class Itinerary extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Itinerary the static model class
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
		return 'itinerary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invit_unit, visit_place, stay_days, exchange_rate, travel_fee, passport_manage_fee,', 'required'),//, visit_id
			array('visit_id', 'numerical', 'integerOnly'=>true),
			array('invit_unit, visit_place', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('itinerary_id, invit_unit, visit_place, stay_days, visit_id, exchange_rate, travel_fee', 'safe', 'on'=>'search'),
			array('exchange_rate', 'match', 'pattern'=>'%^([1-9]\d*\.\d+|0\.\d*[1-9]\d*)$%', 'message'=>'汇率格式不正确'),
			array('stay_days', 'match', 'pattern'=>'%^([1-9]\d*)$%', 'message'=>'停留天数必须为正整数'),
			array('travel_fee, passport_manage_fee, insurance_fee, conference_regist_fee', 'match', 'pattern'=>'%^([1-9]\d*\.\d+|0\.\d*[1-9]\d*|[1-9]\d*)$%', 'message'=>'费用格式不正确'),
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
			'visit' => array(self::BELONGS_TO, 'Visit', 'visit_id'),
			'expenditure' => array(self::BELONGS_TO, 'Expenditure', 'visit_place'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'itinerary_id' => '访问行程的id',
			'invit_unit' => '邀请单位',
			'visit_place' => '出访国家/地区',
			'stay_days' => '停留天数',
			'visit_id' => '出访的id',
			'exchange_rate' => '当前汇率',
			'travel_fee' => '国际旅费',
			//'other_fee' => '其它费用',
			'passport_manage_fee' => '其它费用1:护照及管理办理费',
			'insurance_fee' => '其它费用2:保险费',
			'conference_regist_fee' => '其它费用3:会议注册费',
		);
	}

	public function getAllRegion()
	{
		$arrResult=array();
		$arrCountryName=Expenditure::model()->findAllBySql("SELECT * from expenditure");
		foreach ($arrCountryName as $key => $value) {
			$arrResult[$key+1]=$value->country_name."/"
							.$value->city_name
							."(".$value->currency
							.":住宿费-".$value->accommodation_expenses
							.";伙食费-".$value->diet_expenses
							.";公杂费-".$value->miscellaneous_expenses.")";
			//$arrResult[$key]=$value->country_name."/".$value->city_name;
		}
		return $arrResult;
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

		$criteria->compare('itinerary_id',$this->itinerary_id);
		$criteria->compare('invit_unit',$this->invit_unit,true);
		$criteria->compare('visit_place',$this->visit_place,true);
		$criteria->compare('stay_days',$this->stay_days);
		$criteria->compare('visit_id',$this->visit_id);
		$criteria->compare('exchange_rate',$this->exchange_rate);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}