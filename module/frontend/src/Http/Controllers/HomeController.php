<?php


namespace Frontend\Http\Controllers;


use App\Mail\SendMail;
use Barryvdh\Debugbar\Controllers\BaseController;
use Category\Repositories\CategoryRepository;
use Company\Repositories\CompanyRepository;
use Contact\Http\Requests\ContactCreateRequest;
use Contact\Repositories\ContactRepository;
use Faq\Repositories\FaqRepository;
use Gallery\Repositories\GalleryRepository;
use Groups\Repositories\GroupsRepository;
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
    protected $group;
    protected $lang;
    protected $faq;
    protected $ga;
    protected $po;
    protected $com;
    public function __construct(GroupsRepository $groupsRepository,FaqRepository $faqRepository,
                                GalleryRepository $galleryRepository, ProductRepository $productRepository, CompanyRepository $companyRepository)
    {
        $this->lang = session('lang');
        $this->group = $groupsRepository;
        $this->faq = $faqRepository;
        $this->ga = $galleryRepository;
        $this->po = $productRepository;
        $this->com = $companyRepository;
    }

    private $langActive = ['vn','en'];
    public function changeLang(Request $request, $lang){
        if(in_array($lang,$this->langActive)){
            $request->session()->put(['lang'=>$lang]);
            return redirect()->route('frontend::home');
        }
    }
    function getIndex(){

        //cảm nhận khách hàng
        $commentHome = $this->com->findWhere(['status'=>'active','lang_code'=>$this->lang])->toArray();
        $chunkComment = array_chunk($commentHome,ceil(count($commentHome) / 3));
        //Hỏi đáp
        $faqList = $this->faq->orderBy('sort_order','asc')->findWhere(['status'=>'active'])->all();
        //Group nổi bật
        $listHotGroup = $this->group->orderBy('created_at','asc')
            ->findWhere(['status'=>'active','is_home'=>1])->take(9);

        return view('frontend::home.index',[
            'chunkComment'=>$chunkComment,
            'faqList'=>$faqList,
            'listHotGroup'=>$listHotGroup
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
