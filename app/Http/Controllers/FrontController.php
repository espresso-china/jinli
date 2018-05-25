<?php

namespace App\Http\Controllers;

use App\Helpers\ResultHelper;
use App\Http\Requests;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\DesignerWorks;
use App\Models\Sms;
use App\Models\Floor;
use App\Repositories\DesignerRepository;
use App\Repositories\DesignerWorksRepository;
use App\Repositories\FloorRepository;
use Carbon\Carbon;
use EasyWeChat\Foundation\Application;

class FrontController extends Controller
{

    private $designer;
    private $works;
    private $floor;
    private $answer;
    public function __construct(DesignerWorksRepository $works,DesignerRepository $designer,FloorRepository $floor,AnswerRepository $answer)
    {

        $this->reg='101100-WEB-HUAX-757458';
        $this->pwd='IKRAKMMJ';


        $this->config = [
            'debug'  => true,
            'app_id' => 'wx130e7e44e94247bb',
            'secret' => 'a8390f6f0edddde63c69e9022bd300f7',
            'token'  => 'wechat',
            'aes_key' => '', // 可选
        ];
        $this->designer = $designer;
        $this->works = $works;
        $this->floor =$floor;
        $this->answer =$answer;

    }


    public function show($id){

        $info = Activity::find($id);
        if (!$info) {
            return '非法链接';
        }
        return view('front.show', ['info' => $info]);

    }

    public function test(){
        $this->view_data['designers'] = $this->designer->get();
        return view('front.test', $this->view_data);
    }

    public function home(){
        $this->view_data['floors']=Floor::where('type',Floor::TYPE_1)->orderBy(\DB::raw('RAND()'))->take(10)->get();

        $this->view_data['w1']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_1)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w2']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_2)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w3']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_3)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w4']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_4)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w5']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_5)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w6']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_6)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        $this->view_data['w7']=DesignerWorks::where('type',DesignerWorks::TYPE_J)->where('stype',DesignerWorks::STYPE_7)->orderBy(\DB::raw('RAND()'))->take(3)->get();

        return view('front.home', $this->view_data);
    }
    public function project($type){
        $this->view_data['floors']=Floor::where('type',Floor::TYPE_2)->orderBy(\DB::raw('RAND()'))->take(10)->get();
        $arr =[
            '1'=>6,
            '2'=>5,
            '3'=>4,
            '4'=>6,
            '5'=>5,
            '6'=>5,
            '7'=>3,
            '8'=>6,
        ];

        for ($i=1;$arr[$type]>=$i;$i++){
            $this->view_data['w'.$i]=DesignerWorks::where('type',DesignerWorks::TYPE_G)->where('stype',$type)->where('projecttype',$i)->orderBy(\DB::raw('RAND()'))->take(3)->get();
        }

        $this->view_data['nums']=$arr[$type];
        $this->view_data['type']=$type;
        return view('front.project', $this->view_data);
    }

    public function projectSave(Request $request){
        $data=[
            'floorid'=>$request->input('floorid'),
            'type'=>$request->input('type'),
            'a1'=>$request->input('q1'),
            'a2'=>$request->input('q2'),
            'a3'=>$request->input('q3'),
            'a4'=>$request->input('q4')?:'',
            'a5'=>$request->input('q5')?:'',
            'a6'=>$request->input('q6')?:'',
            'created_at'=>time(),
            'updated_at'=>time()
        ];
         $result = $this->designer->find(4);
         $info=[
             'name'=>$result->name,
            'thumb'=>asset($result->cover),
            'ewm'=>asset($result->ewm)
         ];
         return ResultHelper::json_result('请求成功',$info);
    }


    public function tencentshow($id)
    {
        $info = Activity::find($id);
        if (!$info) {
            return '非法链接';
        }

        return view('front.tencentshow', ['info' => $info]);
    }
    public function store(Request $request){

        $tel = $request->input('tel');
        $name = $request->input('name');
        $aid = $request->input('aid');//活动id
        $callback = $request->input('callback');

        $info = Activity::find($aid);
        $arr = [];

        if (empty($tel)) {
            $arr['status'] = 1;
            $arr['msg'] = '联系方式不能为空!';

            return  response($callback . "('" . json_encode($arr) . "')");
        }

        if (!$info) {
            $arr['status'] = 2;
            $arr['msg'] = '非法活动id!';
            return response($callback . "('" . json_encode($arr) . "')");
        }


        if (!preg_match("/1[34578]{1}\d{9}$/", $tel)) {
            $arr['status'] = 3;
            $arr['msg'] = '手机号码非法!';
            return response($callback . "('" . json_encode($arr) . "')");
        }

        $r = Member::where('tel', $tel);

        if ($r->count() == 0) {
            $data = [];
            $data['tel'] = $tel;
            $data['name'] = $name;
            Member::create($data);
        }
        $MemberInfo = $r->first();
        if (Siguplist::where('memberid', $MemberInfo->id)->where('activityid', $aid)->count() == 0) {
            $data = [];
            $data['memberid'] = $MemberInfo->id;
            $data['activityid'] = $aid;
            $data['num'] = $request->input('num') ? $request->input('num') : 1;
            $data['desc'] = $request->input('desc');
            $data['desc2'] = $request->input('desc2');
            $data['area'] = $request->input('area');
            $data['budget'] = $request->input('budget');
            $data['decoratedate'] = $request->input('decoratedate');
            $data['fid'] = $request->input('fid');
            $data['ip'] = $request->ip();
            Siguplist::create($data);
        } else {
            $arr['status'] = 4;
            $arr['msg'] = '您已经报过名了!';
            return response($callback . "('" . json_encode($arr) . "')");
        }

        /*
         * 发送短信
         * */

        if ($info->issms) {
            $url = 'http://www.stongnet.com/sdkhttp/sendsms.aspx?reg=' . $this->reg . '&pwd=' . $this->pwd . '&sourceadd=&phone=' . $tel . '&content=' . $info->smstpl;
            $result = $this->getSend($url);

            $url = 'http://122.114.123.61/WebAPI/SmsAPI.asmx/SendSmsExt?user=dxwlb&pwd=123456&mobiles='.$tel.'&contents='.urlencode($info->smstpl).'&chid=0&sendtime=';
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
            $string = curl_exec($ch);
            $xml = simplexml_load_string($string);
            $res = (string) $xml->Code;

            $data = [];
            $data['smsid'] = $res;
            $data['tel'] = $tel;
            $data['content'] = $info->smstpl;
            $data['typeid'] = $request->input('typeid') ? $request->input('typeid') : 2;
            Sms::create($data);
        }


        $arr['status'] = 0;
        $arr['msg'] = '报名成功!';
        return response($callback . "('" . json_encode($arr) . "')");

    }

    public function getSend($url){
        $ch = curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true) ;
        $output = curl_exec($ch);
        parse_str($output,$output);
        return $output;
    }

    public function count($aid)
    {
        $info = Activity::find($aid);
        if($info){
            $count = Siguplist::where('activityid',$aid)->count();
            return json_encode(['code'=>200,'data'=>$count]);
        }

    }
    public function topic($id,$tid){

        $info = Activity::find($id);
        if (!$info) {
            return '非法链接';
        }
        $this->view_data['info'] = $info;
        $this->view_data['list'] = Siguplist::where('activityid',$info->id)->where('status',0)->take(10)->get();
        $this->view_data['listed'] = Siguplist::where('activityid',$info->id)->where('status',1)->take(10)->get();

        return view('topic.topic'.$tid,$this->view_data);

    }

    public function zt($id,$fid=''){

        $info = Topic::find($id);
        if (!$info) {
            return '非法链接';
        }
        $this->view_data['info'] = $info;
        $this->view_data['fid'] = $fid?$fid:'';
        $this->view_data['web'] = $this->is_mobile();
        if($info->ismobile&&$this->is_mobile()=='mobile'){
            $app = new Application($this->config);
            $this->view_data['js']=$app->js;
            return view('zt.'.$id.'.mobile',$this->view_data);
        }
        if($this->is_mobile()=='mobile'){

            $app = new Application($this->config);
            $this->view_data['js']=$app->js;
            if($info->ismobile==0){
                $app = new Application($this->config);
                $this->view_data['js']=$app->js;
                return view('zt.'.$id.'.index',$this->view_data);
            }
            return view('zt.'.$id.'.mobile',$this->view_data);
        }
        if($this->is_mobile()!='mobile'&&$info->ispc==0){

            $app = new Application($this->config);
            $this->view_data['js']=$app->js;
            return view('zt.'.$id.'.mobile',$this->view_data);
        }
        // $this->view_data['count']=Siguplist::where('activityid','53')->count();
        // $this->view_data['list']=Siguplist::where('activityid','53')->take(70)->get();
        return view('zt.'.$id.'.index',$this->view_data);

    }


    public function saveCalc(Request $request){

        $tel = $request->input('tel');
        $name = $request->input('name');
        $aid = $request->input('aid');//活动id
        $callback = $request->input('callback');

        $info = Activity::find($aid);
        $arr = [];

        if (empty($tel)) {
            $arr['status'] = 1;
            $arr['msg'] = '联系方式不能为空!';

            return  response($callback . "('" . json_encode($arr) . "')");
        }

        if (!$info) {
            $arr['status'] = 2;
            $arr['msg'] = '非法活动id!';
            return response($callback . "('" . json_encode($arr) . "')");
        }


        if (!preg_match("/1[34578]{1}\d{9}$/", $tel)) {
            $arr['status'] = 3;
            $arr['msg'] = '手机号码非法!';
            return response($callback . "('" . json_encode($arr) . "')");
        }

        $r = Member::where('tel', $tel);

        if ($r->count() == 0) {
            $data = [];
            $data['tel'] = $tel;
            $data['name'] = $name;
            Member::create($data);
        }
        $MemberInfo = $r->first();
        if (Siguplist::where('memberid', $MemberInfo->id)->where('activityid', $aid)->count() == 0) {
            $data = [];
            $style = $request->input('style');
            $data['memberid'] = $MemberInfo->id;
            $data['activityid'] = $aid;
            $data['num'] = $request->input('num') ? $request->input('num') : 1;
            $data['desc'] = $request->input('shi').$request->input('ting').$request->input('chu').$request->input('wei').$request->input('yang');
            if($style==700){
                $data['desc'] .='简装';
            }elseif($style==900){
                $data['desc'] .='经济装';
            }else{
                $data['desc'] .='豪装';
            }

            $data['area'] = $request->input('area');

            $data['decoratedate'] = $request->input('decoratedate');
            $data['fid'] = $request->input('fid');
            $data['ip'] = $request->ip();
            Siguplist::create($data);

        } else {
            $arr['status'] = 4;
            $arr['msg'] = '您已经报过名了!';
            return response($callback . "('" . json_encode($arr) . "')");
        }

        /*
         * 发送短信
         * */

        if ($info->issms) {
            $url = 'http://www.stongnet.com/sdkhttp/sendsms.aspx?reg=' . $this->reg . '&pwd=' . $this->pwd . '&sourceadd=&phone=' . $tel . '&content=' . $info->smstpl;
            $result = $this->getSend($url);

            $url = 'http://122.114.123.61/WebAPI/SmsAPI.asmx/SendSmsExt?user=dxwlb&pwd=123456&mobiles='.$tel.'&contents='.urlencode($info->smstpl).'&chid=0&sendtime=';
            $ch = curl_init();
            curl_setopt ($ch, CURLOPT_URL, $url);
            curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
            $string = curl_exec($ch);
            $xml = simplexml_load_string($string);
            $res = (string) $xml->Code;

            $data = [];
            $data['smsid'] = $res;
            $data['tel'] = $tel;
            $data['content'] = $info->smstpl;
            $data['typeid'] = $request->input('typeid') ? $request->input('typeid') : 2;
            Sms::create($data);
        }


        $arr['status'] = 0;
        $arr['msg'] = '报名成功!';
        return response($callback . "('" . json_encode($arr) . "')");

    }


    function is_mobile() {
        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
        $mobile_browser = '0';
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) $mobile_browser++;
        if ((isset($_SERVER['HTTP_ACCEPT'])) and (strpos(strtolower($_SERVER['HTTP_ACCEPT']) , 'application/vnd.wap.xhtml+xml') !== false)) $mobile_browser++;
        if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) $mobile_browser++;
        if (isset($_SERVER['HTTP_PROFILE'])) $mobile_browser++;
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ',
            'acs-',
            'alav',
            'alca',
            'amoi',
            'audi',
            'avan',
            'benq',
            'bird',
            'blac',
            'blaz',
            'brew',
            'cell',
            'cldc',
            'cmd-',
            'dang',
            'doco',
            'eric',
            'hipt',
            'inno',
            'ipaq',
            'java',
            'jigs',
            'kddi',
            'keji',
            'leno',
            'lg-c',
            'lg-d',
            'lg-g',
            'lge-',
            'maui',
            'maxo',
            'midp',
            'mits',
            'mmef',
            'mobi',
            'mot-',
            'moto',
            'mwbp',
            'nec-',
            'newt',
            'noki',
            'oper',
            'palm',
            'pana',
            'pant',
            'phil',
            'play',
            'port',
            'prox',
            'qwap',
            'sage',
            'sams',
            'sany',
            'sch-',
            'sec-',
            'send',
            'seri',
            'sgh-',
            'shar',
            'sie-',
            'siem',
            'smal',
            'smar',
            'sony',
            'sph-',
            'symb',
            't-mo',
            'teli',
            'tim-',
            'tosh',
            'tsm-',
            'upg1',
            'upsi',
            'vk-v',
            'voda',
            'wap-',
            'wapa',
            'wapi',
            'wapp',
            'wapr',
            'webc',
            'winw',
            'winw',
            'xda',
            'xda-'
        );
        if (in_array($mobile_ua, $mobile_agents))
            $mobile_browser++;
        if (strpos(strtolower($_SERVER['ALL_HTTP']) , 'operamini') !== false)
            $mobile_browser++;
        // Pre-final check to reset everything if the user is on Windows
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']) , 'windows') !== false)
            $mobile_browser = 0;
        // But WP7 is also Windows, with a slightly different characteristic
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']) , 'windows phone') !== false)
            $mobile_browser++;
        if ($mobile_browser > 0){
            return 'mobile';
        }else{
            return 'pc';
        }
    }
}
