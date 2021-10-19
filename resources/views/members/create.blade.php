@extends('layouts.main')
@section('title', '新規登録')
@section('content')
    <div class="col-8 col-offset-2 mx-auto">
        @include('partial.flash')
        @include('partial.errors')

        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="col-form-label">名前</label>
                <div class="col-sm-12">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @if ($errors->has('name')) is-invalid @endif" placeholder="スパルタ 太郎" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="email" class="col-form-label">メールアドレス</label>
                <div class="col-sm-12">
                    <input type="text" name="email" value="{{ old('email') }}"
                        class="form-control @if ($errors->has('email')) is-invalid @endif" placeholder="sparta@mail" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="tel" class="col-form-label">電話番号</label>
                <div class="col-sm-12">
                    <input type="text" name="tel" value="{{ old('tel') }}"
                        class="form-control @if ($errors->has('tel')) is-invalid @endif" placeholder="000-0000-0000"
                        required>
                </div>
            </div>
            <div class="mb-4">
                <label for="file" class="col-form-label">画像</label>
                <div class="col-sm-12">
                    <input type="file" name="file" value="{{ old('file') }}" class="form-control" required>
                </div>
            </div>
                <div class="mb-4">
                    <input type="submit" value="登録"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
        </form>
    </div>
@endsection

