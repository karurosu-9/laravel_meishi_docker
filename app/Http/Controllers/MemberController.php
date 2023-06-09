<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $members = Member::all();
        return view('member.index', ['members' => $members]);
    }

    public function show(Member $member)
    {
        $data = [
            'member' => $member,
        ];

        return view('member.show', $data);
    }

    public function add(Request $request)
    {
        return view('member.add');
    }

    public function create(MemberRequest $request)
    {
        $member = new Member;
        $form = $request->validated();
        $member->fill($form)->save();
        return redirect()->route('member.list');
    }

    public function edit(Member $member)
    {
        $data = [
            'member' => $member,
        ];
        return view('member.edit', $data);
    }

    public function update(Member $member, MemberRequest $request)
    {
        $form = $request ->validated();
        $member->fill($form)->save();
        return redirect()->route('member.list');
    }

    public function delete(Member $member)
    {
        $data = [
            'member' => $member,
        ];
        return view('member.delete', $data);
    }

    public function remove(Member $member)
    {
        $member->delete();
        return redirect()->route('member.list');
    }

}
