<x-app-layout>
    <div class="container lg:w-3/5 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">詳細画面</h2>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mx-8 my-2" role="alert">
                <p>
                    <b>{{ count($errors) }}件のエラーがあります。</b>
                </p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section member class="card shadow position-relative">
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

                            <div class="mt-8 px-8">
                                @can('update', $member)
                                    <a href="{{ route('members.edit', $member) }}" class="btn btn-primary btn-lg">編集</a>
                                @endcan
                                {{-- @can('delete', $member) --}}
                                    <form action="{{ route('members.destroy', $member) }}" method="post" id="form">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <input form="form" type="submit" value="削除"
                                        onclick="if(!confirm('削除していいですか')){return false}" class="btn btn-danger btn-lg">
                                {{-- @endcan --}}
                                <a href="{{ route('members.index') }}" class="btn btn-secondary btn-lg">戻る</a>
                            </div>
                        </div>
                    </figcaption>
                </div>
            </figure>
    </section>
</x-app-layout>
