<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function getSearch(){
        return view('client.Trangchu');
    }
    public function getSearchAjax(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('users')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
               <li><a href="data/'. $row->id .'">'.$row->name.'</a></li>
               ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
