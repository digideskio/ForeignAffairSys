<?php

/**
 * This is the model class for table "visitors".
 *
 * The followings are the available columns in table 'visitors':
 * @property integer $visitors_id
 * @property integer $visit_id
 * @property integer $person_id
 *
 * The followings are the available model relations:
 * @property Visit $visit
 * @property Person $person
 */
class Visitors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Visitors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

 	public function getVisitDescript(){
 		//Visit::model->findAll();
 	}


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'visitors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visit_id, person_id', 'required','message'=>'不能为空'),//{attribute}
			//array('person_id,visit_id','alreadyset'),
			array('visit_id','alreadyset', 'on'=>'vcreate'),//
			array('visit_id','dontExist','on'=>'create,update'),
			array('visit_id, person_id', 'numerical', 'integerOnly'=>true),
			array('aspire_duty', 'length', 'max'=>30),//如果是文本
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('visitors_id, visit_id, person_id,aspire_duty', 'safe', 'on'=>'search'),//,visitTask
			
		);
	}
	public function alreadyset($attribute,$params)
	{
		//$visit_id=$params['visit_id'];
		$one=Visitors::model()->findByAttributes(array('visit_id'=>$this->visit_id,'person_id'=>$this->person_id));
		if($one!=null){
			//$this->addError($attribute, 'shit'.$one->visit_id.'---'.$one->person_id);
			$this->addError($attribute, '你已经参加了本次访问');
		}else {
			//$this->addError($attribute, 'shit2');
		}
	}
	public function dontExist($attribute,$params){
		$visit=Visit::model()->findByPk($this->visit_id);
		if($visit===null){
			$this->addError($attribute, '不存在本次出访');
		}
		//$this->addError($attribute, '不存在本次出访');
	}

	//public $visit_task=$this->visit_task;

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'visit' => array(self::BELONGS_TO, 'Visit', 'visit_id'),
			'person' => array(self::BELONGS_TO, 'Person', 'person_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'visitors_id' => 'Visitors的唯一标示id',
			'visit_id' => '本次出访的id',
			'person_id' => '该成员的id',
			'aspire_duty'=>'在团组中拟任职务'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	/*public $visit_task;
	//public function afterFind(){
		$this->visit_task=$this->visit->visit_task;
	}*/
	/*private $_visitTask = null;
	public function getVisitTask()
	{
	    if ($this->_visitTask === null && $this->visit !== null)
	    {
	        $this->_visitTask = $this->visit->visit_task;
	    }
	    return $this->_visitTask;
	}
	public function setVisitTask($value)
	{
	    $this->_visitTask = $value;
	}*/
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		//$criteria->with = "visit"; // Make sure you query with the post table.

		$criteria->compare('visitors_id',$this->visitors_id);
		$criteria->compare('visit_id',$this->visit_id);
		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('aspire_duty',$this->aspire_duty);
		//$criteria->compare('visit.visit_task', $this->visitTask,true);//
		//$criteria->with='visit';
		//$this->visit_task=$this->visit->visit_task;
		//$criteria->compare('visit_task',$this->visit_task);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}