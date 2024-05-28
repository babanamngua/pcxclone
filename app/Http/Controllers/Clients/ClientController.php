<?php
namespace App\Http\Controllers\Clients;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public $data =[];
    public function index()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.home',$this->data);
    }
    public function tintuc()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.listtintuc',$this->data);
    }
    public function lienhe()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.lienhe',$this->data);
    }
    public function cart()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.cart',$this->data);
    }
    public function category()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.listsanpham',$this->data);
    }
    public function product()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.chitietsanpham',$this->data);
    }
    public function login()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.login',$this->data);
    }
    public function register()
    {
        $this->data['title'] = 'ban gmg';
        return view('clients.register',$this->data);
    }
}
