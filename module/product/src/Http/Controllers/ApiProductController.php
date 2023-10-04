<?php


namespace Product\Http\Controllers;


use Barryvdh\Debugbar\Controllers\BaseController;
use Company\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Mockery\Exception;
use Product\Models\Options;
use Product\Models\OptionValue;
use Product\Models\Sku;
use Product\Models\Variants;
use Product\Repositories\ProductRepository;


class ApiProductController extends BaseController
{
    protected $model;
    protected $com;
    public function __construct(Request $request, ProductRepository $productRepository)
    {
        $this->model = $productRepository;
    }

    public function ajaxCreateOption(Request $request){
        $name = $request->get('name');
        $visual = $request->get('visual');
        $product_id = $request->get('product_id');
        $product = $this->model->find($product_id);
        $data = [
            'name'=>$name,
            'visual'=>$visual,
            'product_id'=>$product_id
        ];
        $this->option = new Options();
        if(is_null($product) || !$product){
            $create = Options::create($data);
        }
        $product->options()->create($data);
        $product->skus()->delete();
        $optionValues = $product->optionValues->groupBy('option_id')->values()->toArray();
        $variants = $product->generateVariant($optionValues);
        $product->saveVariant($variants);
        return \GuzzleHttp\json_encode($product);
    }

    public function ajaxRemoveOption(Request $request){
        $id = $request->get('remove');
        $option = Options::find($id);
        if($option){
           $option->delete();
            return '200';
        }else{
            return 'error';
        }
    }
    //create option value
    public function ajaxCreateOptionValue(Request $request){
        $name = $request->get('name');
        $label = $request->get('label');
        $option = $request->get('option');
        $product_id = $request->get('product_id');
        $data = [
          'product_id'=>$product_id,
          'option_id'=>$option,
          'value'=>$name,
          'label'=>$label
        ];
        $product = $this->model->find($product_id);
        try{
            $create = OptionValue::create($data);

            $optionValues = [];

            if ($product->optionValues->count() > 1) {
                $previousOptionValues = $product->optionValues
                    ->whereNotIn('option_id', $create->option_id)
                    ->groupBy('option_id')
                    ->values()
                    ->toArray();
                $optionValues = array_merge($previousOptionValues, [[$create->toArray()]]);
            } else {
                $optionValues[] = [$create->toArray()];
            }
            $variants = $product->generateVariant($optionValues);
            $product->saveVariant($variants);
            return \GuzzleHttp\json_encode($create);
        }catch (Exception $e){
            return response()->json($e->getMessage());
        }

    }
    //ajax remove option value
    public function ajaxRemoveOptionValue(Request $request){
        $id = $request->get('id');
        $optionValue = OptionValue::find($id);
        if($optionValue){
            $optionValue->delete();
            return '200';
        }else{
            return 'error';
        }
    }

    public function postVariant(Request $request){
        $data = array();
        $product_id = $request->get('product_id');
        $option_id = $request->get('option_id');
        $option_value = $request->get('option_value');
        $sku_price = $request->get('sku_price');
        $sku_variant = $request->get('sku_variant');
        $sku_barcode = $request->get('sku_barcode');
        try{

            $data_sku = [
                'product_id'=>$product_id,
                'price'=>$sku_price,
                'name'=>$sku_variant,
                'barcode'=>$sku_barcode
            ];
            $createSku = Sku::create($data_sku);

            foreach($option_id as $key=>$val){
                $data = [
                    'product_id'=>$createSku->product_id,
                    'sku_id'=>$createSku->id,
                    'option_id'=>$val['value'],
                    'option_value_id'=>$option_value[$key]['value'],
                ];
                try{
                    Variants::create($data);
                }catch (Exception $e){
                    return $e->getMessage();
                }

            }
            return response()->json($createSku);
        }catch (Exception $exception){
          return $exception->getMessage();
        }

    }

    //edit sku
    public function getEditVariant(Request $request){
        $sku = $request->get('sku');
        $itemSku = Sku::find($sku);
        $option_value = $request->get('option_value');
        $productid = $request->get('product');
        $ops = $productid;
        foreach($option_value as $v){
            $ops .=$v['value'];
        }
        $itemSku->price = $request->get('sku_price');
        $itemSku->name = $request->get('sku_variant');
        $itemSku->barcode = $ops;
        $itemSku->thumbnail = replace_thumbnail($request->get('thumbnail'));
        $itemSku->option_value_id = $request->get('value');
        $itemSku->save();

        return response()->json($ops);
    }
    //remove sku
    public function getRemoveSku(Request $request){
        $id = $request->get('id');
        $sku = Sku::find($id);
        $variant = Variants::where('sku_id',$id);
        $variant->delete();
        if($sku){
            $sku->delete();
            return '200';
        }else{
            return 'error';
        }
    }

}
