<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Pro_category;
use App\Models\Brand;
use App\Models\Tax;
use App\Models\Attribute;
use App\Models\Media_option;
use App\Models\Pro_image;
use App\Models\Related_product;

class ProductsController extends Controller
{
	//Products page load
	public function getProductsPageLoad()
	{

		$AllCount = Product::count();

		$storeList = DB::table('users')
			->select('users.id', 'users.shop_name')
			->where('users.role_id', '=', 3)
			->where('users.status_id', '=', 1)
			->orderBy('users.shop_name', 'asc')
			->get();
		$datalist = DB::table('products')
			->join('users', 'products.user_id', '=', 'users.id')
			->select(
				'products.id',
				'products.title',
				'products.slug',
				'products.f_thumbnail',
				'products.description',
				'products.cost_price',
				'products.sale_price',
				'products.stock_qty',
				'products.user_id',
				'products.created_at',
				'users.name',
				'users.email',
				'users.shop_name',
				'users.shop_url',
				'users.role_id',
				)
			->orderBy('products.id', 'desc')
			->paginate(20);
		return view('backend.products', compact('AllCount','storeList', 'datalist'));
	}

	//Get data for Products Pagination
	public function getProductsTableData(Request $request)
	{

		$search = $request->search;
		$status = $request->status;
		$user_id = $request->store_id;

		if ($request->ajax()) {

			if ($search != '') {
				$datalist = DB::table('products')
					->join('tp_status', 'products.is_publish', '=', 'tp_status.id')
					->join('users', 'products.user_id', '=', 'users.id')
					->select('products.*', 'tp_status.status', 'users.shop_name')
					->where(function ($query) use ($search) {
						$query->where('products.title', 'like', '%' . $search . '%');
					})

					->where(function ($query) use ($user_id) {
						$query->whereRaw("products.user_id = '" . $user_id . "' OR '" . $user_id . "' = '0'");
					})
					->orderBy('products.id', 'desc')
					->paginate(20);
			} else {

				$datalist = DB::table('products')
					->join('tp_status', 'products.is_publish', '=', 'tp_status.id')
					->select('products.*', 'tp_status.status', 'users.shop_name')
					->join('users', 'products.user_id', '=', 'users.id')
					->where(function ($query) use ($user_id) {
						$query->whereRaw("products.user_id = '" . $user_id . "' OR '" . $user_id . "' = '0'");
					})

					->orderBy('products.id', 'desc')
					->paginate(20);
			}

			return view('backend.partials.products_table', compact('datalist'))->render();
		}
	}

	//Save data for Products
	public function saveProductsData(Request $request)
	{
		$res = array();

		$id = $request->input('RecordId');
		$title = esc($request->input('title'));
		$slug = esc(str_slug($request->input('slug')));
		$user_id = $request->input('storeid');

		$validator_array = array(
			'product_name' => $request->input('title'),
			'slug' => $slug,
			'store' => $request->input('storeid')
		);

		$rId = $id == '' ? '' : ',' . $id;
		$validator = Validator::make($validator_array, [
			'product_name' => 'required',
			'slug' => 'required|max:191|unique:products,slug' . $rId,
			'store' => 'required'
		]);

		$errors = $validator->errors();

		if ($errors->has('product_name')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('product_name');
			return response()->json($res);
		}

		if ($errors->has('slug')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('slug');
			return response()->json($res);
		}

		if ($errors->has('store')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('store');
			return response()->json($res);
		}

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'user_id' => $user_id
		);

		if ($id == '') {
			$response = Product::create($data)->id;
			if ($response) {
				$res['id'] = $response;
				$res['msgType'] = 'success';
				$res['msg'] = __('New Data Added Successfully');
			} else {
				$res['id'] = '';
				$res['msgType'] = 'error';
				$res['msg'] = __('Data insert failed');
			}
		} else {
			$response = Product::where('id', $id)->update($data);
			if ($response) {

				$res['id'] = $id;
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Updated Successfully');
			} else {
				$res['id'] = '';
				$res['msgType'] = 'error';
				$res['msg'] = __('Data update failed');
			}
		}

		return response()->json($res);
	}

	//Delete data for Products
	public function deleteProducts(Request $request)
	{

		$res = array();

		$id = $request->id;

		if ($id != '') {
			Pro_image::where('product_id', $id)->delete();
			Related_product::where('product_id', $id)->delete();
			$response = Product::where('id', $id)->delete();
			if ($response) {
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Removed Successfully');
			} else {
				$res['msgType'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}

		return response()->json($res);
	}


	//has Product Slug
	public function hasProductSlug(Request $request)
	{
		$res = array();

		$slug = str_slug($request->slug);
		$count = Product::where('slug', $slug)->count();
		if ($count == 0) {
			$res['slug'] = $slug;
		} else {
			$incr = $count + 1;
			$res['slug'] = $slug . '-' . $incr;
		}

		return response()->json($res);
	}

	//get Product
	public function getProductPageData($id)
	{
		
		$datalist = Product::where('id', $id)->first();
		$media_datalist = Media_option::orderBy('id', 'desc')->paginate(28);

		$storeList = DB::table('users')
			->select('users.id', 'users.shop_name')
			->where('users.role_id', '=', 3)
			->where('users.status_id', '=', 1)
			->orderBy('users.shop_name', 'asc')
			->get();

		return view('backend.product', compact('datalist', 'media_datalist', 'storeList'));
	}

	//Update data for Products
	public function updateProductsData(Request $request)
	{
		$res = array();

		$id = $request->input('RecordId');
		$title = esc($request->input('title'));
		$slug = esc(str_slug($request->input('slug')));
		$description = $request->input('description');
		$f_thumbnail = $request->input('f_thumbnail');
		$user_id = $request->input('storeid');
		$sale_price = $request->input('sale_price');
		$stock_qty = $request->input('stock_qty');

		$validator_array = array(
			'product_name' => $request->input('title'),
			'slug' => $slug,
			'featured_image' => $request->input('f_thumbnail'),
			'store' => $request->input('storeid'),
			'sale_price' => $request->input('sale_price')
		);

		$rId = $id == '' ? '' : ',' . $id;
		$validator = Validator::make($validator_array, [
			'product_name' => 'required',
			'slug' => 'required|max:191|unique:products,slug' . $rId,
			'featured_image' => 'required',
			'store' => 'required',
			'sale_price' => 'required',
			'stock_qty' => 'required',
		]);

		$errors = $validator->errors();

		if ($errors->has('product_name')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('product_name');
			return response()->json($res);
		}

		if ($errors->has('slug')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('slug');
			return response()->json($res);
		}


		if ($errors->has('featured_image')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('featured_image');
			return response()->json($res);
		}

		if ($errors->has('store')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('store');
			return response()->json($res);
		}

		if ($errors->has('sale_price')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('sale_price');
			return response()->json($res);
		}

		$data = array(
			'title' => $title,
			'slug' => $slug,
			'f_thumbnail' => $f_thumbnail,
			'description' => $description,
			'user_id' => $user_id,
			'sale_price' => $sale_price,
			'stock_qty' => $stock_qty,
		);

		$response = Product::where('id', $id)->update($data);
		if ($response) {

			//Update Parent and Child Menu
			// gMenuUpdate($id, 'product', $title, $slug);

			$res['msgType'] = 'success';
			$res['msg'] = __('Data Updated Successfully');
		} else {
			$res['msgType'] = 'error';
			$res['msg'] = __('Data update failed');
		}

		return response()->json($res);
	}


	//get Product Images
	public function getProductImagesPageData($id)
	{

		$datalist = Product::where('id', $id)->first();
		$imagelist = Pro_image::where('product_id', $id)->orderBy('id', 'desc')->paginate(15);
		$media_datalist = Media_option::orderBy('id', 'desc')->paginate(28);

		return view('backend.product-images', compact('datalist', 'imagelist', 'media_datalist'));
	}

	//Get data for Product Images Pagination
	public function getProductImagesTableData(Request $request)
	{

		$id = $request->id;

		if ($request->ajax()) {
			$imagelist = Pro_image::where('product_id', $id)->orderBy('id', 'desc')->paginate(15);

			return view('backend.partials.product_images_list', compact('imagelist'))->render();
		}
	}

	//Save data for Product Images
	public function saveProductImagesData(Request $request)
	{
		$res = array();

		$product_id = $request->input('product_id');
		$thumbnail = $request->input('thumbnail');
		$large_image = $request->input('large_image');

		$validator_array = array(
			'image' => $request->input('thumbnail')
		);

		$validator = Validator::make($validator_array, [
			'image' => 'required'
		]);

		$errors = $validator->errors();

		if ($errors->has('image')) {
			$res['msgType'] = 'error';
			$res['msg'] = $errors->first('image');
			return response()->json($res);
		}

		$data = array(
			'product_id' => $product_id,
			'thumbnail' => $thumbnail,
			'large_image' => $large_image
		);

		$response = Pro_image::create($data);
		if ($response) {
			$res['msgType'] = 'success';
			$res['msg'] = __('New Data Added Successfully');
		} else {
			$res['msgType'] = 'error';
			$res['msg'] = __('Data insert failed');
		}

		return response()->json($res);
	}

	//Delete data for Product Images
	public function deleteProductImages(Request $request)
	{
		$res = array();

		$id = $request->id;

		if ($id != '') {
			$response = Pro_image::where('id', $id)->delete();
			if ($response) {
				$res['msgType'] = 'success';
				$res['msg'] = __('Data Removed Successfully');
			} else {
				$res['msgType'] = 'error';
				$res['msg'] = __('Data remove failed');
			}
		}

		return response()->json($res);
	}

}
