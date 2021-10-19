@extends('layouts.main')
@section('title', '詳細画面')
@section('content')
    @include('partial.flash')
    @include('partial.errors')
    <section>
        <article class="card shadow position-relative">
            <figure class="m-6">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ $member->image_url }}" width="100%">
                    </div>
                    <div class="col-6">
                        <figcaption>
                            <p class="mt-8 px-8 bg-white">
                                名前: {{ $member->name }}
                            </p>
                            <p class="mt-8 px-8 bg-white">
                                メールアドレス: {{ $member->email }}
                            </p>
                            <p class="mt-8 px-8 bg-white">
                                電話番号: {{ $member->tel }}
                            </p>
                        </figcaption>

                        <div class="flex flex-row text-center my-4 mt-8 px-8">
                            @can('update', $member)
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-primary btn-lg mr-2">編集</a>
                            @endcan
                                @can('delete', $member)
                            <form action="{{ route('members.destroy', $member) }}" method="post" id="form">
                                @csrf
                                @method('DELETE')
                            </form>
                            <input form="form" type="submit" value="削除"
                                onclick="if(!confirm('削除していいですか')){return false}" class="btn btn-danger btn-lg mr-2">
                            @endcan
                            <a href="{{ route('members.index') }}" class="btn btn-secondary btn-lg ">戻る</a>
                        </div>
                    </div>
                </div>
            </figure>
    </section>
@endsection
