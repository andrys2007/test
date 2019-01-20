<?php
/**
 * smsservice.wsdl.php
 */
header("Content-Type: text/xml; charset=utf-8");
echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<definitions xmlns:soap="http://schemas.xmlsoap.org/wsdl/soap/"
             xmlns:soapenc="http://schemas.xmlsoap.org/soap/encoding/"
             xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
             xmlns:mime="http://schemas.xmlsoap.org/wsdl/mime/"
             xmlns:tns="http://<?=$_SERVER['HTTP_HOST']?>/"
             xmlns:xs="http://www.w3.org/2001/XMLSchema"
             xmlns:soap12="http://schemas.xmlsoap.org/wsdl/soap12/"
             xmlns:http="http://schemas.xmlsoap.org/wsdl/http/"
             name="SmsWsdl"
             xmlns="http://schemas.xmlsoap.org/wsdl/">
    <types>
        <xs:schema elementFormDefault="qualified"
                   xmlns:tns="http://schemas.xmlsoap.org/wsdl/"
                   xmlns:xs="http://www.w3.org/2001/XMLSchema"
                   targetNamespace="http://<?=$_SERVER['HTTP_HOST']?>/">
                   
            <xs:element name="UserInfo">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="FIO" type="xs:string" />
                        <xs:element name="ADRES" type="xs:string" />
                        <xs:element name="STATUS" type="xs:string" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>

            <xs:element name="InfoOrgan">
                <xs:complexType>
                    <xs:sequence>
                        <xs:element name="NAME" type="xs:string" />
                        <xs:element name="IIN" type="xs:string" />
                        <xs:element name="ADRES" type="xs:string" />
                    </xs:sequence>
                </xs:complexType>
            </xs:element>

            
        </xs:schema>
    </types>

    <!-- Сообщения процедуры sendSms -->
    <message name="sendSmsUserInfo">
        <part name="UserInfo" element="tns:UserInfo" />
    </message>

    <message name="messageInfoOrgan">
        <part name="InfoOrgan" element="tns:InfoOrgan" />
    </message>



    <!-- Привязка процедуры к сообщениям -->
    <portType name="SmsServicePortType">
    
        <operation name="getInfoUser">
            <output message="sendSmsUserInfo" />
        </operation>

        <operation name="getInfoOrgan">
            <output message="messageInfoOrgan" />
        </operation>

    </portType>


    <!-- Формат процедур веб-сервиса -->
    <binding name="SmsServiceBinding" type="tns:SmsServicePortType">
        <soap:binding transport="http://schemas.xmlsoap.org/soap/http" />
        
        <operation name="getInfoUser">
            <output>
                <soap:body use="literal" />
            </output>
        </operation>


        <operation name="getInfoOrgan">
            <output>
                <soap:body use="literal" />
            </output>
        </operation>
        
    </binding>


    <!-- Определение сервиса -->
    <service name="SmsService">
    
        <port name="SmsServicePort" binding="tns:SmsServiceBinding">
            <soap:address location="http://www.sp.com/smsservice.php" />
        </port>
        
    </service>
    
</definitions>







