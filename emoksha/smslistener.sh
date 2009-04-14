#! /bin/sh

export CLASSPATH=/root/freefairelections/smppclient/src:/root/freefairelections/SMPPApi/smppapi-0.3.7/lib/commons-logging.jar:/root/freefairelections/SMPPApi/smppapi-0.3.7/lib/smppapi-0.3.7.jar:/root/freefairelections/emoksha/eMoksha.jar

java com.emoksha.listener.SMSListener >/dev/null 2>> /root/freefairelections/logs/smslistener.log

echo "==========================================================================="

