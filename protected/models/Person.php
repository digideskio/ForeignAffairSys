<?php

/**
 * This is the model class for table "person".
 *
 * The followings are the available columns in table 'person':
 * @property integer $person_id
 * @property string $person_code
 * @property string $name
 * @property string $china_xing
 * @property string $china_ming
 * @property string $spell_xing
 * @property string $spell_ming
 * @property string $gender
 * @property string $health
 * @property string $birth_place
 * @property string $hukou_place
 * @property string $nation
 * @property string $birth_day
 * @property string $cert_name
 * @property string $cert_number
 * @property string $spouse_name
 * @property string $political_status
 * @property string $workunit
 * @property string $department
 * @property string $job
 * @property string $job_attribute
 * @property string $admin_level
 * @property string $is_secret
 * @property string $secret_level
 * @property string $foreign_identity
 *
 * The followings are the available model relations:
 * @property Family[] $families
 */
class Person extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Person the static model class
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
		return 'person';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('person_code, name, china_xing, china_ming, spell_xing, spell_ming, gender, health, birth_place, hukou_place, nation, birth_day, cert_name, cert_number, spouse_name, political_status, workunit, department, job, job_attribute, admin_level, is_secret, secret_level, foreign_identity', 'required'),
			array('name, birth_day, cert_name, cert_number, workunit, department, china_xing, china_ming, spell_ming, spell_xing, birth_place, hukou_place, nation, gender, health, political_status', 'required'),
			array('person_code, department, foreign_identity', 'length', 'max'=>30),
			array('name', 'length', 'max'=>40),
			array('china_xing, china_ming, spell_xing, spell_ming, health, nation, spouse_name, job, admin_level', 'length', 'max'=>20),
			array('gender', 'length', 'max'=>4),
			array('birth_place, hukou_place, workunit', 'length', 'max'=>50),
			array('cert_name, political_status, job_attribute, is_secret, secret_level', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('person_id, person_code, name, china_xing, china_ming, spell_xing, spell_ming, gender, health, birth_place, hukou_place, nation, birth_day, cert_name, cert_number, spouse_name, political_status, workunit, department, job, job_attribute, admin_level, is_secret, secret_level, foreign_identity', 'safe', 'on'=>'search'),
			array('birth_day', 'match', 'pattern'=>'%^(?:(?!0000)[0-9]{4}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-8])|(?:0[13-9]|1[0-2])-(?:29|30)|(?:0[13578]|1[02])-31)|(?:[0-9]{2}(?:0[48]|[2468][048]|[13579][26])|(?:0[48]|[2468][048]|[13579][26])00)-02-29)$%', 'message'=>'日期格式不正确'),
			array('cert_number', 'match', 'pattern'=>'%^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X|x)$|^(政字第(\d{8})号)$%', 'message'=>'证件号码格式不正确'),
			array('name, china_ming, china_xing', 'match', 'pattern'=>'/^[\x{4e00}-\x{9fa5}]+$/u', 'message'=>'请输入中文姓、名'),
			array('spell_xing, spell_ming', 'match', 'pattern'=>'%^[A-Za-z]+$%', 'message'=>'请输入中文姓、名拼音'),
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
			'families' => array(self::HAS_MANY, 'Family', 'person_id'),
			'visits' => array(self::HAS_MANY, 'Visit', 'create_person_id'),//new
			'visitors' => array(self::HAS_MANY, 'Visitors', 'person_id'),//new
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'person_id' => '人员id',
			'person_code' => '账号ID',
			'name' => '姓名',
			'china_xing' => '中文姓',
			'china_ming' => '中文名',
			'spell_xing' => '姓拼音',
			'spell_ming' => '名拼音',
			'gender' => '性别',
			'health' => '健康状况',
			'birth_place' => '出生地',
			'hukou_place' => '户口所在地',
			'nation' => '民族',
			'birth_day' => '出生日期',
			'cert_name' => '证件名称',
			'cert_number' => '证件号码',
			'spouse_name' => '配偶姓名',
			'political_status' => '政治面貌',
			'workunit' => '工作单位',
			'department' => '学院/部门',
			'job' => '职务/职称',
			'job_attribute' => '职业属性',
			'admin_level' => '行政级别',
			'is_secret' => '是否涉密人员',
			'secret_level' => '涉密等级',
			'foreign_identity' => '对外身份（选填）',
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

		$criteria->compare('person_id',$this->person_id);
		$criteria->compare('person_code',$this->person_code,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('china_xing',$this->china_xing,true);
		$criteria->compare('china_ming',$this->china_ming,true);
		$criteria->compare('spell_xing',$this->spell_xing,true);
		$criteria->compare('spell_ming',$this->spell_ming,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('health',$this->health,true);
		$criteria->compare('birth_place',$this->birth_place,true);
		$criteria->compare('hukou_place',$this->hukou_place,true);
		$criteria->compare('nation',$this->nation,true);
		$criteria->compare('birth_day',$this->birth_day,true);
		$criteria->compare('cert_name',$this->cert_name,true);
		$criteria->compare('cert_number',$this->cert_number,true);
		$criteria->compare('spouse_name',$this->spouse_name,true);
		$criteria->compare('political_status',$this->political_status,true);
		$criteria->compare('workunit',$this->workunit,true);
		$criteria->compare('department',$this->department,true);
		$criteria->compare('job',$this->job,true);
		$criteria->compare('job_attribute',$this->job_attribute,true);
		$criteria->compare('admin_level',$this->admin_level,true);
		$criteria->compare('is_secret',$this->is_secret,true);
		$criteria->compare('secret_level',$this->secret_level,true);
		$criteria->compare('foreign_identity',$this->foreign_identity,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getGenders()
	{
		return array(
		'男'=>'男',
		'女'=>'女',
		);
	}
	public function getHealths()
	{
		return array(
		'健康'=>'健康',
		'良好'=>'良好',
		'一般'=>'一般',
		);
	}
	public function getCertNames()
	{
		return array(
		'身份证'=>'身份证',
		'军官证'=>'军官证',
		);
	}
	public function getPoliticalStatuss()
	{
		return array(
		'党员'=>'党员',
		'团员'=>'团员',
        ''=>'无'
		);
	}
	public function getJobAttributes()
	{
		return array(
			'国家公务员' =>'国家公务员' , 
			'事业单位人员'=>'事业单位人员',
			'国企人员'=>'国企人员',
			'非国企人员'=>'非国企人员',
			'军人'=>'军人',
			'其他'=>'其他'
			);
	}
	public function getAdminLevel()
	{
		return array(
			'正副省级' =>'正副省级' , 
			'正副厅局级'=>'正副厅局级',
			'正副县处级'=>'正副县处级',
			'普通'=>'普通',
			);
	}
	public function getIsSecrets()
	{
		return array(
			'是' =>'是' , 
			'否'=>'否',
			);
	}
}