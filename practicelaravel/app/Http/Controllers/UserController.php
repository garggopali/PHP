namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use App\User;
class UserController extends Controller
{
    public function facebookLogin(Request $request)
    {               
        FacebookSession::setDefaultApplication(config('services.facebook.APP_ID'),config('services.facebook.APP_SECRET'));
        $redirect_url = route('user.fblogin');
        $helper = new FacebookRedirectLoginHelper($redirect_url);
        $fbloginurl = $helper->getLoginUrl(array('scope' => 'public_profile,email'));
        $state = md5(rand());
        $request->session()->set('g_state', $state);
        return redirect()->to($fbloginurl);
    }
    public function fbSignUp(Request $request)
    {
        FacebookSession::setDefaultApplication(config('services.facebook.APP_ID'),config('services.facebook.APP_SECRET'));        
        $redirect_url = route('user.fblogin');
        $helper = new FacebookRedirectLoginHelper(
            $redirect_url,
            config('services.facebook.APP_ID'),
            config('services.facebook.APP_SECRET')
        );
        try
        {
            $session = $helper->getSessionFromRedirect();       
        } catch (FacebookRequestException $ex)
        {
            return $ex->getMessage();           
        } catch (\Exception $ex)
        {
            return $ex->getMessage();
        }
        if (isset($session) && $session){           
            try
            {
                $user_profile = (new FacebookRequest(
                    $session, 'GET', '/me?fields=id,name,first_name,last_name,email,photos'
                ))->execute()->getGraphObject(GraphUser::className());
                               
                if (User::where('email',$user_profile->getProperty("email"))->first())
                {
                    //logged your user via auth login
                }else{
                    //register your user with response data
                }               
            } catch (FacebookRequestException $e)
            {
                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }
        }
        return redirect()->route('user.list');
   }
    public function listUser(Request $request){
        $users = User::orderBy('id','DESC')->paginate(5);
        return view('users.list',compact('users'))->with('i', ($request->input('page', 1) - 1) * 5);;
    }
}