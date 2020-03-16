<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memo;
use App\AllMemo;

class MemoController extends Controller
{
    public function open()
    {
        return view ('memo.open');
    }
    
    public function index()
    {
        return view ('memo.date_input');
    }
    
    public function create()
    {
        return view ('memo.index');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, Memo::$rules);
        $memo = new Memo;
        $which = $request->which;
        
        $id = $request->id;
        $all_id = AllMemo::max('id');
        
        $saveData = [
            'all_id' => $all_id,
            'which' => $which,
            'comment' => $request->comment,
        ];
        
        $memo->fill($saveData);
        $memo->save();

        return view ('memo.index');
    }
    
    
    public function exit(Request $request)
    {
        $this->validate($request, Memo::$rules);
        $memo = new Memo;
        $which = $request->which;
        
        $all_id = AllMemo::max('id');
        
        $saveData = [
            'all_id' => $all_id,
            'which' => $which,
            'comment' => $request->comment,
        ];
        
        $memo->fill($saveData);
        $memo->save();

        return view ('memo.date_input');
    }
    
    public function date(Request $request)
    {
        
    
        $this->validate($request, AllMemo::$rules);
        $allmemo = new AllMemo;
        
        $date = $request->date;
        $member = $request->member;
        
        $saveDateData = [
            'date'=> $date,
            'member'=> $member,
        ];
        
        $allmemo->fill($saveDateData);
        $allmemo->save();

        return view ('memo.index');
    }
    
    public function all(Request $request)
    {
        $cond_title = $request->cond_title;
        
        if ($cond_title != '') {
            $posts = AllMemo::where('member','like','%'. $cond_title.'%')->orderBy('date', 'asc')->get();
        } else {
            $posts = AllMemo::orderBy('date', 'asc')->get();
        }
        
        return view('memo.all', compact('posts','cond_title')); 
    }
    
    public function detail(Request $request)
    {
        $cond_all_id = $request->id;
        $allmemo = AllMemo::find($cond_all_id);
        $date = $allmemo->date;
        $member = $allmemo->member;
        
        $memos = Memo::all();
        
        foreach ($memos as $memo) {
            $all_id = $memo->all_id;
            if ($all_id == $cond_all_id) {
                $detail_memo[] = $memo;
            }
        }
        
        if (empty($detail_memo)) {
            abort(404); 
        }
        
        return view('memo.detail', compact('detail_memo', 'member', 'date')); 
    }
    
    public function delete(Request $request)
    {
      $cond_all_id = $request->id;
      $allmemo = AllMemo::find($request->id);
      
      $memos = Memo::all();
        foreach ($memos as $memo) {
            $all_id = $memo->all_id;
            if ($all_id == $cond_all_id) {
                $memo->delete();
            }
        }
      $allmemo->delete();
      
      return redirect('memo/all');
  }  
  
  public function detail_delete(Request $request)
    {
      $memo = Memo::find($request->id);
      $all_id = $request->all_id;
      
      $memo->delete();
      return redirect('memo/detail'."?id=".$all_id);
    
      
  } 
  
  public function edit(Request $request)
    {
      $memo = Memo::find($request->id);
      
      if (empty($memo)) {
        abort(404);    
      }
      
      return view('memo.edit', compact('memo'));
  }
  
  public function update(Request $request)
  {
      $this->validate($request, Memo::$rules);
    
      $id = $request->id;
      $all_id = $request->all_id;
      
      $memo = Memo::find($id);
      $saveMemoData = [
          'all_id' => $all_id,
          'which' => $request->which,
          'comment' => $request->comment,
          ];
      
      $memo->fill($saveMemoData)->save();
      
      return redirect('memo/detail'."?id=".$all_id);
  }
  
}
