<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $phone
 * @property string $email
*/
class Client extends Model
{
    use SoftDeletes;
 
    protected $fillable = ['card_number','first_name', 'last_name', 'phone', 'email', 'dob'
        , 'sex', 'addr_line_1', 'addr_line_2', 'addr_city', 'addr_state', 'addr_country', 'place_of_origin'
        , 'nok_name', 'nok_address', 'nok_relationship'];
    protected $hidden = [
        'pivot'
    ];
    
    public function relative()
    {
        return $this->hasOne(LOV::class,'id','nok_relationship');
    }
    public function gender()
    {
        return $this->hasOne(LOV::class,'id','sex');
    }
    public function country()
    {
        return $this->hasOne(LOV::class,'id','addr_country');
    }
    public function state()
    {
        return $this->hasOne(LOV::class,'id','addr_state');
    }
    
    public function sendSMS() {
        $data = array('cmd' => 'sendquickmsg', 'owneremail' => \config('database.sms.main_eml'), 'subacct'=>\config('database.sms.sub_acc'),
             'subacctpwd'=>\config('database.sms.sub_pwd'), 'sender' => \config('database.sms.sender'), 'message' => 'Test', 'sendto' => $this->phone);

       dd( $data);
        $sms = $this->callAPI('GET', \config('database.sms.end_pt'), $data);
        $smsResp = explode(':', $sms);
        //    dd( $smsResp);
        if ($smsResp[0] == 'OK') {
            return array("success"=>true, 'message' => "SMS successfully sent to the recipients");
        }else {
            return array("success" => false, 'message' => "Error " . $smsResp[1] . ": " . $smsResp[2]);
        }
    }
    public function callAPI($method, $url, $data = false) {
        $curl = curl_init();
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }

    
}
