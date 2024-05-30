<?php
#------------------------------------------------------------------------------
# 작업내용	:	메세지 출력 관련
# 인    수	:
# 작성일자	:	2021-05-26
# 작 성 자	:	webtick@gmail.com
# 변경이력	:
#------------------------------------------------------------------------------

class Message
{
	private $result;
	private $msg;
	private $data;
	private $etc;

	public function __construct($result=false, $msg='', $data='', $etc='')
	{
		$this->result			=	$result;
		$this->msg				=	$msg;
		$this->data				=	$data;
		$this->etc				=	$etc;
	}

	public function isResult()
	{
		return $this->result;
	}

	public function setResult($result)
	{
		$this->result			=	$result;
	}

	public function getMessage()
	{
		return $this->msg;
	}

	public function setMessage($msg)
	{
		$this->msg				=	$msg;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data				=	$data;
	}

	public function getEtc()
	{
		return $this->etc;
	}

	public function setEtc($etc)
	{
		$this->etc				=	$etc;
	}
}
?>