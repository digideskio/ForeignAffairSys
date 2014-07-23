<?php

/**
 * This is the model class for table "visit".
 *
 * The followings are the available columns in table 'visit':
 * @property integer $visit_id
 * @property string $approve_unit
 * @property string $assign_unit
 * @property string $group_unit
 * @property string $claim_unit
 * @property integer $leader_id
 * @property string $start_date
 * @property string $end_date
 * @property string $visit_task
 * @property string $fees
 * @property integer $create_person_id
 *
 * The followings are the available model relations:
 * @property Person $leader
 * @property Person $createPerson
 */
class Visit extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Visit the static model class
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
		return 'visit';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('approve_unit, assign_unit, group_unit, claim_unit, start_date, end_date, visit_task, fees', 'required'),
			array('leader_id, create_person_id', 'numerical', 'integerOnly'=>true),
			array('approve_unit, assign_unit, group_unit, claim_unit', 'length', 'max'=>30),
			array('visit_task', 'length', 'max'=>1000),
			array('fees', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lName,visit_id, approve_unit, assign_unit, group_unit, claim_unit, leader_id, start_date, end_date, visit_task, fees, create_person_id', 'safe', 'on'=>'search'),
			array('start_date, end_date', 'match', 'pattern'=>'%^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$%', 'message'=>'日期格式不正确'),
		);
	}

	public function getLeaderName(){
		if (isset($this->leader_id))
		{
			$leader=Person::model()->findByPk($this->leader_id);
			if (isset($leader->name)) {
				return $leader->name;
			}
		}
	}

	public function getCreatorName(){
		$creator=Person::model()->findByPk($this->create_person_id);
		if (isset($creator->name)) {
			return $creator->name;
		}
	}

	private $_lName = null;
	public function getLName()
	{
	    if ($this->_lName === null && $this->leader !== null)
	    {
	        $this->_lName = $this->leader->name;
	    }
	    return $this->_lName;
	}
	public function setLName($value)
	{
	    $this->_lName = $value;
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'leader' => array(self::BELONGS_TO, 'Person', 'leader_id'),
			'createPerson' => array(self::BELONGS_TO, 'Person', 'create_person_id'),
			'itineraries' => array(self::HAS_MANY, 'Itinerary', 'visit_id'),
			'visitors' => array(self::HAS_MANY, 'Visitors', 'visit_id'),
		);
	}

	public function getAllPersons(){
		$narr=array();
		$arr=Visitors::model()->findAllByAttributes(array('visit_id'=>$this->visit_id));
		//$arr=Visit::model()->findAllByAttributes(array('visit_id'=>$this->visit_id));
		//$visitors=Visitors::model()->findByAttributes(array('visit_id'=>$visit->visit_id));
		foreach($arr as $k=>$v)
		{
			$person=Person::model()->findByPk($v['person_id']);
		    $narr[$v['person_id']]=$person->name;
		    //$arr[$k['person_id']]=$person->name;
		}
		return $narr;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'visit_id' => '出访ID',
			'approve_unit' => '人员审批单位',
			'assign_unit' => '派员单位',
			'group_unit' => '组团单位',
			'claim_unit' => '申报单位',
			'leader_id' => '领队ID',
			'start_date' => '出访开始时间',
			'end_date' => '出访结束时间',
			'visit_task' => '出访任务',
			'fees' => '费用来源',
			'create_person_id' => '创建人',
			//'leader_name' => '领队'
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
		$criteria->with="leader";
		//$criteria->with="createPerson";
		$criteria->compare('leader.name', $this->lName,true);
		$criteria->compare('visit_id',$this->visit_id);
		$criteria->compare('approve_unit',$this->approve_unit,true);
		$criteria->compare('assign_unit',$this->assign_unit,true);
		$criteria->compare('group_unit',$this->group_unit,true);
		$criteria->compare('claim_unit',$this->claim_unit,true);
		$criteria->compare('leader_id',$this->leader_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('visit_task',$this->visit_task,true);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('create_person_id',$this->create_person_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function Vsearch()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->with="leader";
		//$criteria->with="createPerson";
		$criteria->compare('leader.name', $this->lName,true);
		$criteria->compare('visit_id',$this->visit_id);
		$criteria->compare('approve_unit',$this->approve_unit,true);
		$criteria->compare('assign_unit',$this->assign_unit,true);
		$criteria->compare('group_unit',$this->group_unit,true);
		$criteria->compare('claim_unit',$this->claim_unit,true);
		$criteria->compare('leader_id',$this->leader_id);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('visit_task',$this->visit_task,true);
		$criteria->compare('fees',$this->fees,true);
		$criteria->compare('create_person_id',$this->create_person_id);

		$criteria->condition="TO_DAYS(NOW()) - TO_DAYS(start_date) <= 0";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}