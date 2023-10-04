<?php


namespace Product\Models;


use Company\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Users\Models\Users;

class Product extends Model
{
    protected $table = 'product';
   protected $fillable = ['name','slug','cat_id','factory_id','age','chapter','price','disprice','discount','description','content','product_meta','meta_desc','meta_title','thumbnail','banner','display','main_display','count_view','user_post'
    ,'user_edit','status','meta_keyword','sku','freeship','lapdat','thuoctinh','lang_code','category_ids'];

   protected $productMetaClass;

   public function __construct(array $attributes = [])
   {
       parent::__construct($attributes);
       $this->productMetaClass = ProductMeta::class;
   }

   public function meta(){
       return $this->hasOne($this->productMetaClass,'product_id');
   }
   public function saveMeta(\Illuminate\Http\Request $request){
        $meta = $this->productMetaClass::where('product_id',$this->id)->first();
           if (!$meta) {
               $meta = new $this->productMetaClass();
               $meta->product_id = 1;
           }
           $arg = $request->input();

           if (!empty($arg['colors'])) {
               $arg['colors'] = array_values($arg['colors']);
           }
           if (!empty($arg['size'])) {
               $arg['size'] = array_values($arg['size']);
           }
            $meta->fill($arg);
           try{
               return $meta->save();
           }catch (\Exception $e){
               return $e->getMessage();
           }

   }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value,'-','');
    }
    public function setPriceAttribute($value){
        $this->attributes['price'] = str_replace(',','',$value);
    }
    public function setDispriceAttribute($value){
        $this->attributes['disprice'] = str_replace(',','',$value);
    }

    public function getCompany(){
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function getCompanyName(){
        $com = $this->getCompany()->first();
        if (!empty($com)) {
            return $com->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn công ty</span>';
        }
    }

    public function getUserPost(){
        return $this->belongsTo(Users::class,'user_post','id');
    }

    public function getUserEdit(){
        return $this->belongsTo(Users::class,'user_edit','id');
    }

    public function category(){
        return $this->belongsTo(Catproduct::class,'cat_id','id');
    }

    public function getCategory()
    {
        $cat = $this->category()->first();
        if (!empty($cat)) {
            return $cat->name;
        } else {
            echo '<span style="color:#c00">Chưa chọn danh mục</span>';
        }
    }

    public function factory(){
        return $this->belongsTo(Factory::class,'factory_id','id');
    }
    public function getFactory(){
        $fac = $this->factory()->first();
        if (!empty($fac)) {
            return $fac->name;
        } else {
            echo '<span style="color:#c00">Công ty</span>';
        }
    }


//    public function fill(array $attributes)
//    {
//        if(!empty($attributes)){
//            foreach ( $this->fillable as $item ){
//                $attributes[$item] = $attributes[$item] ?? null;
//            }
//        }
//        return parent::fill($attributes); // TODO: Change the autogenerated stub
//    }

public function options(){
    return $this->hasMany(Options::class,'product_id');
}
public function optionValues(){
    return $this->hasMany(OptionValue::class);
}
public function skus()
    {
        return $this->hasMany(Sku::class,'product_id');
    }

public function variants()
    {
        return $this->hasMany(Variants::class);
    }

    public function generateVariant(array $input): array
    {
        if (! count($input)) return [];

        $result = [[]];

        foreach ($input as $key => $values) {
            $append = [];
            foreach ($values as $value) {
                foreach ($result as $data) {
                    $append[] = $data + [$key => $value];
                }
            }
            $result = $append;
        }

        return $result;
    }

    public function saveVariant(array $variants)
    {
        $skus = $this->skus()->createMany(array_fill(0, count($variants), []));

        $variantOptions = [];

        foreach ($skus as $index => $sku) {
            foreach ($variants[$index] as $optionValue) {
                $variantOptions[] = [
                    'product_id' => $this->id,
                    'sku_id' => $sku->id,
                    'option_id' => $optionValue['option_id'],
                    'option_value_id' => $optionValue['id'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        $this->variants()->insert($variantOptions);
    }

    public function categories(){
       return $this->belongsToMany(Catproduct::class,'catproduct_product','catproduct_id','product_id');
    }

}
