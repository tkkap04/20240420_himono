<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\UserAdminRequest;

class AdminController extends Controller
{
    // checkをadminに変更


    // 一覧表示
    public function show()
    {
        $genders = Contact::distinct('gender')->pluck('gender');
        $contacts = Contact::Paginate(7);
        $categories = Category::all();

        return view('/check', compact('genders', 'contacts', 'categories'));
    }


    // 検索機能
    public function search(Request $request)
    {
        $contacts = Contact::keywordSearch($request->keyword)
                            ->genderSearch($request->gender)
                            ->categorySearch($request->category)
                            ->dateSearch($request->date)
                            ->paginate(7);
        $categories = Category::all();

        return view('check.search-results', compact('contacts', 'categories'));
    }


    // 削除機能
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();

        return redirect('/check');
    }


    
}
