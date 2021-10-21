<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Member::class, 'member');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\MemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MemberRequest $request)
    {
        $member = new Member($request->all());
        $member->user_id = $request->user()->id;
        $files = $request->file;

        DB::beginTransaction();

        try {
            $member->save();

            $paths = [];

            foreach ($files as $file) {
                $name = $file->getClientOriginalName();

                $path = Storage::putFile('members', $file);
                if (!$path) {
                    throw new Exception('ファイルの保存に失敗しました');
                }

                $paths[] = $path;

                $image = new Image([
                    'member_id' => $member->id,
                    'photo_name' => $name,
                    'name' => basename($path)
                ]);

                $image->save();
            }

            DB::commit();
        } catch (\Exception $e) {
            foreach($paths as $path) {
                if (!empty($path)) {
                    Storage::delete($path);
                }
            }
            DB::rollback();
            return back()->withErrors([$e->getMessage()]);
        }
        return redirect(route('members.index'))->with(['flash_message' => '登録が完了しました']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\MemberRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MemberRequest $request, Member $member)
    {
        $member->fill($request->all());

        try {
            $member->save();
        } catch (\Exception $e) {
            return back()->withErrors($e->getMessage());
        }

        return redirect()->route('members.index')
            ->with(['flash_message' => '更新が完了しました']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        DB::beginTransaction();

        try {
            $paths = $member->image_paths;

            foreach ($paths as $path) {
                if (!Storage::delete($path)) {
                    throw new \Exception('ファイルの削除に失敗しました');
                }
            }

            $image = Image::where('member_id', $member->id);

            $image->delete();
            $member->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors($e->getMessage());
        }
        return redirect()->route('members.index')
            ->with(['flash_message' => '投稿を削除しました']);
    }
}
