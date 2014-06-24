<?
class cript { 
	static public function enc_encode($str) {
		return base64_encode(strrev(base64_encode($str)));
	}

	static public function enc_decode($str) {
		return base64_decode(strrev(base64_decode($str)));
	}
	
	static public function auth_encode($str) { #main encode
		$str=base64_encode($str);
		$str=cript::exch2_encode($str);
		$str=strrev($str);
		$str=cript::xor_encode($str,1);
		$str=strrev($str);
		$str=cript::ordmov_encode($str,0,4);
		$str=base64_encode($str);
		$str=cript::exch2_encode($str);
		$str=base64_encode($str);
		return $str;
	}
	
	static public function auth_decode($str) { #main decode
		$str=base64_decode($str);
		$str=cript::exch2_decode($str);
		$str=base64_decode($str);
		$str=cript::ordmov_decode($str,0,4);
		$str=strrev($str);
		$str=cript::xor_decode($str,1);
		$str=strrev($str);
		$str=cript::exch2_decode($str);
		$str=base64_decode($str);
		return $str;
	}
	#//
	static private function xor_encode($str,$num) {  
		for ($i=0;$i<strlen($str);$i+=$num)
			$str[$i]=~$str[$i];
		return $str;
	}
	
	static private function ordmov_encode($str,$srt,$num) {
		for ($i=0;$i<strlen($str);$i++,$srt+=$num)
			$str[$i]=chr(ord($str[$i])+$srt);
		return $str;
	}
	
	static private function exch2_encode($str) {
		$len=strlen($str)/2;
		is_real($len)?$len-=0.5:NULL;
		$tmp1=substr($str,0,$len);
		$tmp2=substr($str,$len);
		return $tmp2.$tmp1;
	}
	
	static private function xor_decode($str,$num) {
		for ($i=0;$i<strlen($str);$i+=$num)
		 $str[$i]=~$str[$i];
		return $str;
	}
	
	static private function ordmov_decode($str,$srt,$num) {
		for ($i=0;$i<strlen($str);$i++,$srt+=$num)
		 $str[$i]=chr(ord($str[$i])-$srt);
		return $str;
	}
	
	static private function exch2_decode($str) {
		$len=strlen($str)/2;
		is_real($len)?$len+=0.5:NULL;
		$tmp1=substr($str,0,$len);
		$tmp2=substr($str,$len);
		return $tmp2.$tmp1;
	}
	
}