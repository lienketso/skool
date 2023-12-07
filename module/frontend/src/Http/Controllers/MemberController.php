<?php


namespace Frontend\Http\Controllers;



use App\Rules\MatchOldPassword;
use Barryvdh\Debugbar\Controllers\BaseController;
use Groups\Models\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Users\Models\Users;
use Users\Repositories\UsersRepository;

class MemberController extends BaseController
{
    protected $model;
    public function __construct(UsersRepository $usersRepository)
    {
        $this->model = $usersRepository;
    }

    function register(){
        return view('frontend::member.register');
    }
    public function postRegister(Request $request){
        $input = $request->except(['_token']);
        $validatedData = $request->validate([
            'full_name' => 'required',
            'phone'=>'',
            'password' => 'required|min:5',
            'email' => 'required|email|unique:users'
        ], [
            'full_name.required' => 'Bạn chưa nhập họ tên',
            'email.required' => 'Bạn chưa nhập email',
            'email.email' => 'Địa chỉ email không chính xác',
            'email.unique' => 'Tài khoản đã được đăng ký trước đó',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải nhiều hơn 5 ký tự'
        ]);

        try {
            $create = $this->model->create($validatedData);
            $create->code = 'TRIKI'.$create->id;
            $create->save();
            $create->roles()->sync(10);
            return redirect()->route('frontend::member.login.get');
        }catch (\Exception $e){
            return redirect()->back()->with(['exception'=>$e->getMessage()]);
        }
    }
    public function login(){
//        dd(Hash::make('123456'));
        return view('frontend::member.login');
    }

    public function postLogin(Request $request){
        $validatedData = $request->validate([
            'password' => 'required|min:5',
            'email' => 'required|email'
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        try{
            $credentials = $request->only(['email', 'password']);
            if (Auth::attempt($credentials)) {
                return redirect()->route('frontend::home');
            } else {
                return redirect()->back()->withInput();
            }
        }catch (\Exception $e){
            return redirect()->back()->with(['exception'=>$e->getMessage()]);
        }

    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect()->route('frontend::member.login.get');
    }

    public function profile(){
        $userLogin = Auth::user();
        $myGroup = Groups::query()->where('admin_id',$userLogin->id)->get();
        return view('frontend::member.profile',compact('userLogin','myGroup'));
    }
    public function editProfile(){
        $userLogin = Auth::user();
        return view('frontend::member.edit-profile',compact('userLogin'));
    }
    public function postEditProfile(Request $request){
        $input = $request->all();
        $validatedData = $request->validate([
            'full_name' => 'required|min:5',
            'phone' => 'required|numeric'
        ], [
            'full_name.required' => 'Bạn chưa họ và tên',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.numeric' => 'Số điện thoại không đúng',
        ]);
        if($request->hasFile('thumbnail')){
            $image = $request->thumbnail;
            $path = convert_vi_to_en(str_replace(' ','-',$input['full_name']));
            $newnname = time().'-'.$image->getClientOriginalName();
            $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
            $input['thumbnail'] = $path.'/'.$newnname;
            $image->move('upload/'.$path,$newnname);
        }

        $userLogin = Auth::user();
        $data = $this->model->update($input,$userLogin->id);
        return redirect()->back()->with(['success'=>'Cập nhật profile thành công']);

    }

    public function changePassword(){
        return view('frontend::member.change-password');
    }

    public function postChangePassword(Request $request){
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        Users::find($user->id)->update(['password'=> $request->new_password]);
        return redirect()->back()->with(['success'=>'Đổi mật khẩu thành công !']);
    }


}
