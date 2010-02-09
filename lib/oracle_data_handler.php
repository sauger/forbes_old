<?php
	function get_oracle_db() {
		global $oracle_db;
		if(!is_object($oracle_db)){
			$oracle_db = OCILogon('hoau_web', 'wtnt2008', '//192.168.1.240/hydb');
		}
		return $oracle_db;				
	}
	
	function query_oracle($sql){
		$db = get_oracle_db();
		if(!$db){
			return false;
		}
		
		$r = oci_parse($db, $sql);
		if ($r === false){
			return false;
		}
		
		$qresult =  ociexecute($r);
		if ($qresutl === false) return false;
		//var_dump(oci_fetch_array($r));
		//oci_fetch_all($r, $result);
		return oci_fetch_array($r);
		return $result;
	}
	
	
	/*
	 * 签约客户登录,如果登录失败,返回false,如果登录成功,返回一个数组,数组第一个元素为"客户名称",第二个字段为判断是否为大客户,1为大客户
	 */
	function kh_login($user, $pwd) {
		$r = query_oracle("SELECT SFNRDKHGL,KHMC FROM LD_KHXX WHERE SWID='$user' AND MM='$pwd'");
		if($r=== false || count($r)<=0 ) return false;
		return array($r[0]->KHMC,$r[0]->SFNRDKHGL);
	}	
	
	class ydgz_info {
		public $qyd;
		public $mdd;
		public $hwmc;
		public $bz;
		public $zl;
		public $tj;
		public $js;
		public $thfs;		
		public $gzjl = array();
		public $thgsmc;
		public $thgsdh;
		public $thgsdz;
		public $kfdh;
		function get_goods_info(){
			$num = func_num_args();
			if ($num <=0) return false;
			$params = func_get_args();
			$sql = "SELECT a.YDBH,a.QYDMC,a.MDDMC,a.SHFS,a.HWMC,a.JS,a.BZBH,a.ZL,a.TJ,a.YDZT,a.FSZT,a.DHCDH,b.GSJC,b.DH,b.ZS FROM HYDATA.LD_YD a LEFT JOIN HYDATA.LD_GS b ON a.MDDZBH=b.GSBH";
			//$sql = "SELECT * FROM "
			if($num==1){
				//根据运单编号查询			
				$sql .= " WHERE YDBH='{$params[0]}'";
			}else if($num == 2){
				$a = explode('-', $params[0]);
				$sql .= " WHERE SUBSTR(a.HH,-5,5)='{$a[0]}' AND a.JS = {$a[1]}";
			}
			$ret = query_oracle($sql);
			if($ret === false || count($ret)<= 0) return false;
			$this->thfs = $ret[SHFS];
			$this->thgsmc = $ret[GSJC];
			//$this->thgsmc = iconv('GBK','UTF-8',$this->thgsmc);
			$this->qyd = $ret[QYDMC];
			$this->mdd = $ret[MDDMC];
			$this->hwmc = $ret[HWMC];
			$this->bz = $ret[BZBH];
			$this->zl = $ret[ZL];
			$this->tj = $ret[TJ];
			$this->js = $ret[JS];
			$this->thgsdh = $ret[DHCDH];
			$this->thgsdz = $ret[ZS];
			$this->kfdh = $ret[DH];
			return $ret[YDBH];
		}
		function get_info() {
			$num = func_num_args();
			if ($num == 1){
				$ydbh = $this->get_goods_info(func_get_arg(0));
			}else if($num == 2){
				$ydbh = $this->get_goods_info(func_get_arg(0),func_get_arg(1));				
			}
			if($ydbh){
				$this->_get_info();			
			}
		    
		}
		
	}	
	
	class ydgz_info_pt extends ydgz_info{
		function _get_info($bh) {			
			//$tmp1 = query_oracle("SELECT * FROM LD_YDGZJLNEW WHERE YDBH={$bh}");
			$tmp1 = '2009/09/25 13:59 送达	N南通8		+NT8JL-002860高伟
2009/09/25 13:59 送货	N南通8	黑D02993            	调度员:002860高伟 送货单号:01569951
2009/09/25 13:55 回单登记	N南通8		用户名:+NT8JL-002860高伟 签收人:张建林 签收信息: 证件号:公章（南通弘文图书发行有先公司）
2009/09/25 13:31 接收下转	N南通8	黑D02993            	下转移单号：XZY5700-20090924-025接单员:002860高伟 实际入库件数:4
2009/09/25 07:44 下转	N南通	黑D02993            	发车编号:XZY5700-20090924-025 调度员:180906纪忠伟  目的地公司:N南通8
2009/09/25 01:42 接收上转	N南通	黑D04329            	上转移单号：SZY5701-20090924-001接单员:180906纪忠伟 实际入库件数:4
2009/09/24 16:28 上转	N南通0	黑D04329            	发车编号:SZY5701-20090924-001 调度员:167875韩萍  目的地公司:N南通
2009/09/22 09:19 接收下转	N南通0	黑D04329            	下转移单号：XZY5700-20090921-021接单员:167875韩萍 实际入库件数:4
2009/09/22 08:05 下转	N南通	黑D04329            	发车编号:XZY5700-20090921-021 调度员:180906纪忠伟  目的地公司:N南通0
2009/09/21 18:05 到货	N南通	黑B61582            	发车编号：N南京N扬州N南通-09090397  发货单号:5184411 接单员:180906纪忠伟 实际入库件数:4
2009/09/20 23:38 发货	N南京	黑B61582            	调度员:006367张万忠 发车编号:N南京N扬州N南通-09090397起始地:N南京目的地:N南通
2009/09/19 23:29 中转到货	N南京	黑B62262            	发车编号：N成都N南京N无锡-09090138  发货单号:5163362接单员:002470张克兵 实际入库件数:4
2009/09/16 04:22 发货	N成都	黑B62262            	调度员:008543郭强 发车编号:N成都N南京N无锡-09090138起始地:N成都目的地:N南京
2009/09/15 19:23 接收上转	N成都	川A44607            	上转移单号：SZY9751-20090915-007接单员:187729陈志刚 实际入库件数:4
2009/09/15 17:44 上转	N成都0	川A44607            	发车编号:SZY9751-20090915-007 调度员:021943杨蕾  目的地公司:N成都
2009/09/15 16:51 开单	N成都0	上门提货	录单员（工号:021943 姓名:021943杨蕾 系统用户名:+CD0SYY)
';
			$array1 = explode(chr(10),$tmp1);
			$this->gzjl = array();
			$record_name = array('sj','gs','cp','czy');
			foreach ($array1 as $v) {
				$items = explode('	',$v);
				array_push($this->gzjl, array_combine($record_name, $items));
			}
		}

	}
	
	class ydgz_info_dkh extends ydgz_info{
		function _get_info($bh) {
			//$this->gzjl = query_oracle("SELECT * FROM LD_YDGZJL_DKH WHERE YDBH={$bh}");
			//$sql = "select rq,gzhjdyid,gsjc,czr from ld_dkh_cx_v where ydbh={$bh}";
			//$this->gzjl = query_oracle($sql);
			$this->gzjl = array();
			array_push($this->gzjl, array('rq' => '2009 12-12','gzhjdyid' => "开单",'gsjc' => 'N南京','czy' => '录单员（工号:021943 姓名:021943杨蕾 系统用户名:+CD0SYY)'));
			array_push($this->gzjl, array('rq' => '2009 12-12','gzhjdyid' => "送货",'gsjc' => 'N南京2','czy' => '录单员（工号:021943 姓名:021943杨蕾 系统用户名:+CD0SYY)'));
			array_push($this->gzjl, array('rq' => '2009 12-12','gzhjdyid' => "提货",'gsjc' => 'N南京4','czy' => '录单员（工号:021943 姓名:021943杨蕾 系统用户名:+CD0SYY)'));
		}
	}
?>