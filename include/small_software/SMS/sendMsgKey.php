<?php
include("includeSettings.php");							//����� ��� ������� ��� ���� ������� ������� ��������
$mobile = "";											//��� �������� �� �������
$password = "";											//��������  �� �������

$sender = "NEW SMS";									//��� ������ ���� ����� ��� ����� ������� ���� ������ ���  ���� ������ ��� ��� ������� (urlencode)

$numbers = "";											//��� ����� ����� ������� ������� ��� 96650555555 ���� ������� ��� ���� �� ��� ��� ��� ������� (,) ��� ���� ��� ��� ����� ��� �� ����� 
														//�� ���� ��� ���� �� ������� ���� ����� ������� ��� �� ��� �� ������� �� ���� ����� fsockpoen  �� ����� CURL�
														//���� �� ��� �� ������� �� ���� ����� fOpen � ���� ����� ������� ��� 120 ��� ��� �� �� ����� �����
														//������ ����: ��� ������� ��� �� ����� ��� ������� �� msgKey

$msg = "����� �� ��� (1)� ����� ������� ����� (2)";		//������ �����

$msgKey = "(1),*,����,@,(2), *,12/10/2008***(1),*,����,@,(2),*,10/10/2008";	/*  ����� ��������� ����� ��� ������ ������
																				�	(1)� (2)�...: ������� ��� ������ ���� ��� ������� ���� 
																				�	* ���� ��� ����� ������� �������� �� ������� ������� �������� ���.
																				�	@ ���� ��� ����� ����� ����� ������ ������ ������ ������.
																				�	*** ���� ��� ��� ������� ������ ���� ������� �������.
																				
																				������� ��� ����� ������� �������� �������
																				sendSMSWK ����� ������� ����� ��������� ��� ����� ������� ���� ������� 
																				
																				�� ����� ������ �������  70 ���
																				�� ����� ������ ���������� 160 ���
																				�� ��� ����� ���� �� ����� ����� ��� ������� ������� ���� 67
																				�������� ��������� 158
																				*/
									
$timeSend = 0;							//������ ��� ��������� - 0 ���� ������� ����
										//����� ������� ����� �� hh:mm:ss

$dateSend = 0;							//������ ����� ��������� - 0 ���� ������� ����
										//����� ������� ������� �� mm/dd/yyyy
										
$deleteKey = 152485;					//����� �� ���� ��� ������  ������ ����� �� ������ ��� ������� �� ���� ����� ��� �������.
										//����� ����� ��� ���� ������� �� ���������ʡ ���� ��� ����� ���� �����.
										
$resultType = 0;						//���� ����� ��� ������� ������� �� �������
										//0: ����� ������� ��� �� �� �������
										//1: ����� ���� ������� ������� �� �������											

// ���� ����� ����� �������
echo sendSMSWK($mobile, $password, $numbers, $sender, $msg, $msgKey, $timeSend, $dateSend, $deleteKey, $resultType);
?>