<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Flash;
use Response;

class ProductsControllerAPI extends Controller
{
    public $successStatus = 200;

    public function productsAPI()
    {
        $products = Product::all();

        if (count($products) > 0) {
            return response()->json($products, $this->successStatus);
        } else {
            return response()->json(['Error' => 'There is no posts in the database'], 404);
        }
    }

    public function getAllProducts(Request $request)
    {
        $token = $request['t']; // t= token
        $userid = $request['u']; // u= userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $product = Product::all();

            return response()->json($product, $this->successStatus);
        } else {
            return response()->json(['response' => 'Bad Request'], 400);
        }
        
    }

    public function getProducts(Request $request) {
        $id = $request['pid']; // pid = product id
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $product = Product::where('id', $id)->first();

            if ($product != null) {
                return response()->json($product, $this->successStatus);
            } else {
                return response()->json(['response' => 'Students not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Request'], 400);
        }
    }

    public function searchProducts(Request $request) {
        $productno = $request['p']; // p = productno
        $token = $request['t']; // t = token
        $userid = $request['u']; // u = userid

        $user = User::where('id', $userid)->where('remember_token', $token)->first();

        if ($user != null) {
            $product = Product::where('description', 'LIKE', '%' . $productno . '%')
                    ->orWhere('product_name', 'LIKE', '%' . $productno . '%')
                    ->get();

            if ($product != null) {
                return response()->json($product, $this->successStatus);
            } else {
                return response()->json(['response' => 'Students not found!'], 404);
            }
        } else {
            return response()->json(['response' => 'Bad Request'], 400);
        }
    }

}