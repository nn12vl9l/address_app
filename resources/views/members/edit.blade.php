<x-app-layout>
    <div class="container lg:w-3/5 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">編集画面</h2>

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
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$member->name) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">メールアドレス</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email',$member->email) }}">
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">電話番号</label>
                                    <input type="text" name="tel" id="tel" class="form-control" value="{{ old('tel',$member->tel) }}">
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
</x-app-layout>
