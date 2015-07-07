<?php
	class Db{
		//成员属性
		protected $dbHost;//数据库地址
		protected $dbUser;//数据库用户名称
		protected $dbPass;//数据库的密码
		protected $dbName;//数据库名称
		protected $dbCharset;//数据库字符集
		protected $dbPrefix;//数据表前缀
		protected $tabName;//数据表名称
		protected $errInfo;//接收错误信息
		protected $link;//数据库连接资源
		protected $sql;//要执行的sql语句
		protected $fields;//数据表的所有的字段
		protected $where;//用来存储where条件
		protected $order;//用来存储order子句
		protected $limit;//用来存储limit子句
		protected $field;//用来存储设置的字段信息
		
		protected static $obj=null;
		
		//成员方法
		protected function __construct($tabName){
			$this->dbHost = DB_HOST;
			$this->dbUser = DB_USER;
			$this->dbPass = DB_PASS;
			$this->dbName = DB_NAME;
			$this->dbCharset = DB_CHARSET;
			$this->dbPrefix = DB_PREFIX;
			$this->tabName = $tabName;
			$this->link = $this->connect();
			$this->getFields();
		}
		
		public static function getObj($tabName){
			if(is_null(self::$obj)){
				self::$obj = new self($tabName);
			}
			return self::$obj;
		}
		
		protected function connect(){
			//连接数据库
			$link = mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
			//判断错误
			if(mysql_errno()){
				$this->errInfo = mysql_error();
				return false;
			}
			//设置字符集
			mysql_set_charset($this->dbCharset);
			//选择数据库
			mysql_select_db($this->dbName);
			//将资源返回
			return $link;
		}
		
		//缓存字段的方法
		protected function cacheFields(){
			//获取当前表当中的所有字段
			$sql = "desc ".$this->dbPrefix.$this->tabName;
			$data = $this->query($sql);
			
			//组装数组
			foreach($data as $val){
				//判断当前字段是否为主键自增
				if($val['Key']=='PRI'){
					$fields['_pk'] = $val['Field'];
				}
				if($val['Extra']=='auto_increment'){
					$fields['_auto'] = $val['Field'];
				}
				if(!in_array($val['Field'],$fields)){
					$fields[] = $val['Field'];
				}
			}
			
			//将这些字段存入缓存文件
			$str = "<?php\n";
			$str .= "return ";
			$str .= var_export($fields,true)."\n?>";
			if(!file_exists("./runtime/cache")){
				mkdir("./runtime/cache",0755);
			}
			file_put_contents("./runtime/cache/".$this->dbPrefix.$this->tabName."_cache.php",$str);
			
			//将字段的数组返回
			return $fields;
		}
		
		//获取当前表当中的所有字段
		public function getFields(){
			if(file_exists("./cache/".$this->dbPrefix.$this->tabName."_cache.php")){
				$this->fields = include "./cache/".$this->dbPrefix.$this->tabName."_cache.php";
			}else{
				$this->fields = $this->cacheFields();
			}
		}
		
		//将一个关联数组插入到数据库当中
		//array('username'=>'zhangsan','password'=>'123123',rtime=>123123,rip=>123123)
		public function insert($data=array()){
			//1.判断参数
			if(!is_array($data)){
				$this->errInfo = "This is not an array";
				return false;
			}
			
			if(empty($data)){
				$data = $_POST;
			}
			//2.组装sql语句
			//insert into bbs_user(username,password,rtime,rip) values('zhangsan','123123123','123123','123123');
			
			//对非法字段进行过滤
			
			foreach($data as $key=>$val){
				if(!in_array($key,$this->fields)){
					unset($data[$key]);
				}
			}
			
			$sql = "insert into ".$this->dbPrefix.$this->tabName."(";
			
			//获取所有要插入数据的字段
			$sql .= join(",",array_keys($data));
			$sql .= ") values('";
			$sql .= join("','",array_values($data));
			$sql .= "')";
			$this->sql = $sql;
			
			return $this->execute($sql);
		}
		//delete from bbs_user where id>1
		//delete from bbs_user where id>1 order by id desc
		//delete from bbs_user where id>1 order by id desc limit 1
		//1,2,3,4,5,6,7    7,6,5,4,3,2
		public function delete($where,$order="",$limit=""){
			$this->sql = "delete from ".$this->dbPrefix.$this->tabName;
			$this->where($where);
			
			//$order的判断
			$this->order($order);
			
			//开始操作$limit
			$this->limit($limit);
			
			$this->sql .= $this->where.$this->order.$this->limit;
			
			//组装完毕以后对条件进行清空
			$this->clearVar();
			
			return $this->execute($this->sql);
		}
		
		//update bbs_user set username='zhangsan',password='123' where id=1
		//update bbs_user set username='zhangsan',password='123' where id>1 order by id desc limit 1
		public function update($data,$where="",$order="",$limit=""){
			$this->sql = "update ".$this->dbPrefix.$this->tabName;
			//如果$data不为空，并且为一个数组
			if(empty($data)||!is_array($data)){
				return 0;
			}
			if(array_key_exists($this->fields['_pk'],$data)){
				$w = " where ".$this->fields['_pk']."=".$data[$this->fields["_pk"]];
				unset($data[$this->fields['_pk']]);
			}
			foreach($data as $key=>$val){
				//array('id'=>1,"username"=>"zhangsan",'password'=>'123')
				//set username="zhangsan",password='123'
				$set .= $key."='".$val."',";
			}
			$set = " set ".rtrim($set,",");
			
			if(empty($w)){
			
				$this->where($where);
			
			}else{
				$this->where = $w;
			}
			
			//$order的判断
			$this->order($order);
			
			//开始操作$limit
			$this->limit($limit);
			
			$this->sql .= $set.$this->where.$this->order.$this->limit;
			
			//组装完毕以后对条件进行清空
			$this->clearVar();
			
			return $this->execute($this->sql);
		}
		
		//select id,username from bbs_user where id>1 order by id desc limit 1,2
		public function select($fields="*",$where="",$order="",$limit=""){
		
			$this->field($fields);	
			$this->sql = "select ".$this->field." from ".$this->dbPrefix.$this->tabName;

			//========================//
			$this->where($where);
			
			//$order的判断
			$this->order($order);
			
			//开始操作$limit
			$this->limit($limit);
			
			//=======================//
			$this->sql .= $this->where.$this->order.$this->limit;
			
			//组装完毕以后对条件进行清空
			$this->clearVar();
			
			return $this->query($this->sql);
		}
		
		//select count(*) from bbs_user where id>1
		public function total($where=""){
			$this->sql = "select count(*) from ".$this->dbPrefix.$this->tabName;
			$this->where($where);
			$this->sql .= $this->where;
			//组装完毕以后对条件进行清空
			$this->clearVar();
			
			$data = $this->query($this->sql);
			//var_dump($data);
			return $data[0]['count(*)'];
		}
		
		//select * from bbs_user where id = 1
		public function findOne($fields="*",$where="",$order=""){
			$this->field($fields);
			$this->sql = "select ".$this->field." from ".$this->dbPrefix.$this->tabName;
			
			$this->where($where);
			
			$this->order($order);
			
			$this->sql .= $this->where.$this->order;
			
			//组装完毕以后对条件进行清空
			$this->clearVar();
			
			$data = $this->query($this->sql);
			return $data[0];
		}
		
		public function where($where=""){
			if(!empty($this->where)){
				return $this;
			}
			if(!empty($where)){
				//如果$where为字符串
				if(is_string($where)){
					$this->where = " where ".$where;
				}
				//如果$where为整型
				if(is_int($where)){
					$this->where = " where ".$this->fields['_pk']."=".$where;
				}
				//如果$where为数组
				if(is_array($where)){
					//array('id'=>1,'username'=>"zhangsan")
					//where id=1 and username='zhangsan' and
					foreach($where as $key=>$val){
						if(!is_array($val)){
							//echo 123;
							$w .= ($key."='".$val."' and ");
						}else{
							//array(array(id=>1),array(username=>zhangsan)))
							//id=1 or username=zhangsan
							foreach($val as $k=>$v){
								$w .= $k."='".$v."' or ";
							}
						}
					}
					
					$this->where = " where ".substr($w,0,-3);
				}
			}else{
				$this->where = "";
			}
			return $this;
		}
		
		public function order($order=""){
			if(!empty($this->order)){
				return $this;
			}
			if(!empty($order)){
				//如果$order是一个字符串
				if(is_string($order)){
					$this->order = " order by ".$order;
				}
				//如果$order是一个数组
				if(is_array($order)){
					//array('id'=>'desc','age'=>'asc')
					//id desc,age asc
					foreach($order as $key=>$val){
						$o .= $key." ".$val.",";
					}
					$this->order = " order by ".rtrim($o,",");
				}
			}else{
				$this->order = "";
			}
			return $this;
		}
		
		public function group(){
			
		}
		
		public function limit($limit){
			if(!empty($this->limit)){
				return $this;
			}
			if(!empty($limit)){
				//如果$limit为整型
				if(is_int($limit)){
					$this->limit = " limit ".$limit;
				}
				if(is_array($limit)){
					//array(1,2)
					//limit 1,2
					$this->limit = " limit ".$limit[0].",".$limit[1];
				}
			}else{
				$this->limit = "";
			}
			return $this;
		}
		
		public function field($fields="*"){
			if(!empty($this->field)){
				return $this;
			}
			if(is_array($fields)){
				$this->field = array_intersect($fields,$this->fields);
				$this->field = join(",",$fields);
			}else{
				$this->field = $fields;
			}
			return $this;
		}
		
		public function getSql(){
			return $this->sql;
		}
		
		public function getError(){
			
		}
		
		
		//DML insert  update  delete
		public function execute($sql){
			$this->sql = $sql;
			DeBug::addError("[<font color='green'>SQL语句</font>]:".$sql."<br />");
			//发送sql语句
			$res = mysql_query($sql);
			//处理结果
			if($res){
				return mysql_affected_rows();
			}else{
				return false;
			}
		}
		
		//DQL  select
		public function query($sql){
			$this->sql = $sql;
			DeBug::addError("[<font color='green'>SQL语句</font>]:".$sql."<br />");
			//发送sql语句
			$res = mysql_query($sql);
			//处理结果
			if($res){
				if(mysql_num_rows($res)>0){
					while($row=mysql_fetch_assoc($res)){
						$data[] = $row;
					}
					return $data;
				}else{
					return array();
				}
			}else{
				return false;
			}
		}
		
		public function setTable($tabName){
			$this->tabName = $tabName;
		}
		
		protected function clearVar(){
			$this->where = "";
			$this->order = "";
			$this->limit = "";
		}

		//关闭连接
		public function __destruct(){
			mysql_close($this->link);
		}
	}
	
	
	
	