<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\EBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function viewHome(Account $account){
        return view('home',[
            'ebooks' => EBook::all(),
            'account' => $account
        ]);
    }

    public function viewIndex(){
        return view('index');
    }

    public function viewSuccess(){
        return view('success');
    }

    public function viewSaved(){
        return view('saved');
    }

    public function viewLogoutSuccess(){
        return view('logoutsuccess');
    }

    public function viewDetail(EBook $ebook){
        return view('ebookdetail',[
            'ebook' => $ebook
        ]);
    }
    
}
