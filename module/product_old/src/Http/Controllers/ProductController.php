<?php


namespace Product\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Media\Models\Media;
use Media\Repositories\MediaRepository;
use Product\Http\Requests\CatEditRequest;
use Product\Http\Requests\ProductCreateRequest;
use Product\Http\Requests\ProductEditRequest;
use Product\Models\Product;
use Product\Repositories\CatproductRepository;
use Product\Repositories\FactoryRepository;
use Product\Repositories\ProductRepository;
use Product\Repositories\MetaRepository;
use Gallery\Repositories\GalleryRepository;


class ProductController extends BaseController
{
    protected $model;
    protected $cat;
    protected $langcode;
    protected $fac;
    protected $ga;
    protected $meta;
    public function __construct(ProductRepository $productRepository,CatproductRepository $catproductRepository, FactoryRepository $factoryRepository, GalleryRepository $galleryRepository, MetaRepository $metaRepository)
    {
        $this->model = $productRepository;
        $this->cat = $catproductRepository;
        $this->fac = $factoryRepository;
        $this->ga = $galleryRepository;
        $this->meta = $metaRepository;
        $this->langcode = session('lang');
    }

    public function getIndex(Request $request){
        $id = $request->get('id');
        $name = $request->get('name');
        $factory_id = $request->factory_id ;

        $q = Product::query();
        if(!is_null($id)){
           $q = $q->where('id',$id);
        }
        if(!is_null($name)){
            $q = $q->where('name','LIKE','%'.$name.'%');
        }
        if(!is_null($factory_id)){
            $q = $q->where('factory_id',$factory_id);
        }

        $data = $q->orderBy('created_at','desc')
            ->where('lang_code',$this->langcode)->paginate(10);

        $allFactory = $this->fac->orderBy('name','asc')
            ->findWhere(['lang_code'=>$this->langcode])->all();

        return view('wadmin-product::index',['data'=>$data,'allFactory'=>$allFactory,'langcode'=>$this->langcode]);
    }
    public function getCreate(MediaRepository $mediaRepository){
        $currentId = Product::orderBy('id', 'desc')->first()->id + 1;
        $catmodel = $this->cat;
        $factory = $this->fac->findWhere(['status'=>'active','lang_code'=>$this->langcode]);
        $imageAttach = $mediaRepository->findWhere(['table_id'=>$currentId])->all();

        $gallery = $this->ga->orderBy('sort_order')->findWhere(['group_id'=>3])->all();

        return view('wadmin-product::create',['catmodel'=>$catmodel,'factory'=>$factory,'currentId'=>$currentId,'imageAttach'=>$imageAttach,'gallery'=>$gallery]);
    }
    public function postCreate(ProductCreateRequest $request, MediaRepository $mediaRepository){
        try{
            $input = $request->except(['_token','continue_post']);
//            if($request->hasFile('thumbnail')){
//                $image = $request->thumbnail;
//                $path = date('Y').'/'.date('m').'/'.date('d');
//                $newnname = time().'-'.$image->getClientOriginalName();
//                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
//                $input['thumbnail'] = $path.'/'.$newnname;
//                $image->move('upload/'.$path,$newnname);
//            }
            $input['thumbnail'] = replace_thumbnail($input['thumbnail']);
            $input['slug'] = $request->name;
            $input['user_post'] = Auth::id();
            $input['user_edit'] = Auth::id();
            $input['lang_code'] = $this->langcode;
            $input['count_view'] = 0;
            $input['main_display'] = 1;
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $data = $this->model->create($input);
            //upload multi file
            if ($request->hasfile('media')) {
                $files = $request->file('media');
                foreach($files as $file){
                    $path = date('Y').'/'.date('m').'/'.date('d');
                    $newnname = time().'-'.$file->getClientOriginalName();
                    $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
                    $file->move('upload/'.$path,$newnname);
                    $media = [
                        'table'=>'product',
                        'table_id'=> $data->id,
                        'name'=> $path.'/'.$newnname ,
                        'original_name'=> $file->getClientOriginalName(),
                        'path_name'=> 'upload/'.$path.'/'.$newnname
                    ];
                    $mediaRepository->create($media);
                }
            }
            //continue post if click continue
            if($request->has('continue_post')){
                return redirect()
                    ->route('wadmin::product.create.get')
                    ->with('create','Thêm dữ liệu thành công');
            }
            return redirect()->route('wadmin::product.index.get',['id'=>$data->id])
                ->with('create','Thêm dữ liệu thành công');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }

    }

    function getEdit($id,MediaRepository $mediaRepository){
        $data = $this->model->find($id);
        $catmodel = $this->cat;
        $factory = $this->fac->findWhere(['status'=>'active','lang_code'=>$this->langcode]);
        $imageAttach = $mediaRepository->findWhere(['table_id'=>$id])->all();
        $gallery = $this->ga->orderBy('sort_order')->findWhere(['group_id'=>3])->all();
        return view('wadmin-product::edit',['data'=>$data,'catmodel'=>$catmodel,'imageAttach'=>$imageAttach, 'factory'=>$factory,'gallery'=>$gallery]);
    }

    function postEdit($id, ProductEditRequest $request){
        try{
            $input = $request->except(['_token']);

//            if($request->hasFile('thumbnail')){
//                $image = $request->thumbnail;
//                $path = date('Y').'/'.date('m').'/'.date('d');
//                $newnname = time().'-'.$image->getClientOriginalName();
//                $newnname = convert_vi_to_en(str_replace(' ','-',$newnname));
//                $input['thumbnail'] = $path.'/'.$newnname;
//                $image->move('upload/'.$path,$newnname);
//            }
            $input['thumbnail'] = replace_thumbnail($input['thumbnail']);
            $input['slug'] = $request->name;
            $input['user_edit'] = Auth::id();
            //cấu hình seo
            if($request->meta_title==''){
                $input['meta_title'] = $request->name;
            }
            if($request->meta_desc==''){
                $input['meta_desc'] = $request->description;
            }
            $product = $this->model->update($input, $id);
            //nếu check color
            
            return redirect()->route('wadmin::product.index.get')->with('edit','Bạn vừa cập nhật dữ liệu');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    function remove($id){
        try{
            $this->model->delete($id);
            return redirect()->back()->with('delete','Bạn vừa xóa dữ liệu !');
        }catch (\Exception $e){
            return redirect()->back()->withErrors(config('messages.error'));
        }
    }

    public function changeStatus($id){
        $input = [];
        $data = $this->model->find($id);
        if($data->status=='active'){
            $input['status'] = 'disable';
        }elseif ($data->status=='disable'){
            $input['status'] = 'active';
        }
        $this->model->update($input,$id);
        return redirect()->back();
    }

}
