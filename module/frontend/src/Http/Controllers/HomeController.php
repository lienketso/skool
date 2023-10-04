<?php


namespace Frontend\Http\Controllers;


use App\Mail\SendMail;
use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Company\Repositories\CompanyRepository;
use Contact\Http\Requests\ContactCreateRequest;
use Contact\Repositories\ContactRepository;
use Gallery\Repositories\GalleryRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Newsletter\Repositories\NewsletterRepository;
use Post\Repositories\PostRepository;
use Product\Repositories\CatproductRepository;
use Product\Repositories\ProductRepository;
use Setting\Repositories\SettingRepositories;
use Transaction\Http\Requests\TransactionCreateRequest;
use Transaction\Repositories\TransactionRepository;

class HomeController extends BaseController
{
    protected $catnews;
    protected $lang;
    protected $cat;
    protected $ga;
    protected $po;
    public function __construct(CategoryRepository $categoryRepository,CatproductRepository $catproductRepository,
                                GalleryRepository $galleryRepository, ProductRepository $productRepository)
    {
        $this->lang = session('lang');
        $this->catnews = $categoryRepository;
        $this->cat = $catproductRepository;
        $this->ga = $galleryRepository;
        $this->po = $productRepository;
    }

    private $langActive = ['vn','en'];
    public function changeLang(Request $request, $lang){
        if(in_array($lang,$this->langActive)){
            $request->session()->put(['lang'=>$lang]);
            return redirect()->route('frontend::home');
        }
    }
    function getIndex(PostRepository $postRepository){

        $gallery = $this->ga->scopeQuery(function ($e){
            return $e->orderBy('sort_order','asc')
                ->where('status','active')
                ->where('group_id',1)
                ->where('lang_code',$this->lang);
        })->limit(20);

        $banner = $this->ga->scopeQuery(function ($e){
            return $e->orderBy('sort_order','asc')
                ->where('status','active')
                ->where('group_id',2)
                ->where('lang_code',$this->lang);
        })->limit(20);

        $popularCat = $this->cat->scopeQuery(function($e){
           return $e->orderBy('sort_order','asc')
               ->where('status','active')->where('display',1)->where('parent',0)
               ->where('lang_code',$this->lang)->with('childactive')->get();
        })->limit(10);


        $pageAbout = $postRepository->findWhere(['lang_code'=>$this->lang,'status'=>'active','display'=>1,'post_type'=>'page'])->first();

        $latestNews = $postRepository->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('lang_code',$this->lang)
                ->where('status','active')
                ->where('display',3)
                ->where('post_type','blog')
                ->get();
        })->limit(3);

        //sản phẩm nổi bật
        $productHot = $this->po->scopeQuery(function ($e){
            return $e->orderBy('age','asc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',2)->get();
        })->limit(21);
        //sản phẩm slider
        $productSlider = $this->po->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',3)
                ->get();
        })->limit(20);
        //danh mục tin trang chủ
        $catnewsHome = $this->catnews->with('postCat')->scopeQuery(function($e){
            return $e->orderBy('sort_order','asc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',1)->get();
        })->limit(4);

        //project
        $projectHome = $postRepository->scopeQuery(function ($e){
          return $e->orderBy('created_at','desc')
          ->where('status','active')
          ->where('lang_code',$this->lang)
          ->where('post_type','project')->get();
        })->limit(6);


        return view('frontend::home.index',[
            'gallery'=>$gallery,
            'banner'=>$banner,
            'productHot'=>$productHot,
            'popularCat'=>$popularCat,
            'latestNews'=>$latestNews,
            'pageAbout'=>$pageAbout,
            'productSlider'=>$productSlider,
            'catnewsHome'=>$catnewsHome,
            'projectHome'=>$projectHome
        ]);
    }
    public function about(SettingRepositories $settingRepositories, PostRepository $postRepository){
        $checkList = $settingRepositories->getSettingMeta('about_section_list_1_title_'.$this->lang);
        $decodeCheck = json_decode($checkList);
        $decodeCheck = array_chunk($decodeCheck,4);

        //page to page
        $pageList = $postRepository->scopeQuery(function($e){
            return $e->orderBy('created_at','desc')
                ->where('status','active')
                ->where('lang_code',$this->lang)
                ->where('display',3);
        })->limit(5);

        return view('frontend::home.about',['decodeCheck'=>$decodeCheck,'pageList'=>$pageList]);
    }

    public function contact(){
        return view('frontend::contact.contact');
    }
    public function postContact(ContactCreateRequest $request, ContactRepository $contactRepository){
            $input = $request->except(['_token']);
            $data = [
                'title'=>$input['title'],
                'name'=>$input['name'],
                'phone'=>$input['phone'],
                'email'=>$input['email'],
                'messenger'=>$input['messenger']
            ];
            $contactRepository->create($data);
            $details = [
                'name'=> $input['name'],
                'phone'=> $input['phone'],
                'email'=> $input['email'],
                'title'=>$input['title'],
                'messenger'=>$input['messenger']
            ];
//            Mail::to('thanhan1507@gmail.com')
//                ->send(new SendMail($details));
//            Mail::send('frontend::mail.contact',['name'=>$input['name'],'email'=>$input['email'],'title'=>$input['title'],'messenger'=>$input['messenger']],
//                function ($message){
//                    $message->to('thanhan1507@gmail.com', 'Visitor')->subject('Liên hệ từ thanhbinh-bca.vn !');
//                });
            return view('frontend::contact.success',['data'=>$input]);
    }

    public function createNewletter(Request $request, NewsletterRepository $newsletterRepository){
        $email = $request->get('email');
        $input = ['email'=>$email];
        $newsletterRepository->create($input);
        echo 'Subscribe successful !';
    }

    public function createPartner(TransactionCreateRequest $request, TransactionRepository $transactionRepository){
        $input = $request->except(['_token']);
        try{
            $create = $transactionRepository->create($input);
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    public function getTokenApi(){
        $rawData = [
            'UserName'=>'XPG-KH23-0163',
            'Password'=>'123456'
        ];
        $res = Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('http://stg.247post.vn:51099/api/Client/ClientLogin', $rawData)
            ->throw(function ($response, $e) {
                return $response;
            });
        if($res->successful()){
            $resData =  $res->json();
        }
        return $resData;
    }

}
