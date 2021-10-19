@extends('layouts.main')
@section('title', '編集画面')
@section('content')
    @include('partial.flash')
    @include('partial.errors')
    <section class="card shadow mb-3">
        <figure class="m-6">
            <div class="row">
                <div class="col-6">
                    <img src="{{ $member->image_url }}" width="100%">
                </div>
                <div class="col-6">
                    <figcaption>
                        <form action="{{ route('members.update', $member) }}" method="post" id="form">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="name" class="form-label">名前</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $member->name) }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">メールアドレス</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    value="{{ old('email', $member->email) }}">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">電話番号</label>
                                <input type="text" name="tel" id="tel" class="form-control"
                                    value="{{ old('tel', $member->tel) }}">
                            </div>
                        </form>

                        <div class="col-6 mx-auto">
                            <input type="submit" value="更新" form="form" class="btn btn-success btn-lg">
                            <a href="{{ route('members.show', $member) }}" class="btn btn-secondary btn-lg">戻る</a>
                        </div>
                </div>
                </figcaption>
            </div>
        </figure>
    </section>
@endsection
