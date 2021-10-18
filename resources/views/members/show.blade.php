<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
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
        {{-- <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data" --}}
        <div class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">お名前</label>
                <div class="col-sm-12">
                    <input type="text" name="name" value="{{ $member->name }}"
                        class="form-control @if ($errors->has('name')) is-invalid @endif" id="inputName" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-12">
                    <input type="text" name="email" value="{{ $member->email }}"
                        class="form-control @if ($errors->has('email')) is-invalid @endif" id="inputName" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">tel</label>
                <div class="col-sm-12">
                    <input type="text" name="tel" value="{{ $member->tel }}"
                        class="form-control @if ($errors->has('tel')) is-invalid @endif" id="inputName" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">画像</label>
                <div class="col-sm-12">
                    <input type="file" name="image_id" class="border-gray-300">
                </div>
            </div>
            <div class="mb-4">
                <a href="{{ route('members.edit', $member) }}"
                    class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">編集</a>
            </div>
            <div class="mb-4">
                <form action="{{ route('members.destroy', $member) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                        class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </form>
            </div>
        </div>
    </div>
    </div>
    </form>
    </div>
</x-app-layout>





{{-- <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    連絡先詳細
                </div>
                <article class="mb-2">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-bold">お名前</label>
                        <div class="col-sm-10">{{ $member->name }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-bold">email</label>
                        <div class="col-sm-10">{{ $member->email }}</div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label font-bold">tel</label>
                        <div class="col-sm-10">{{ $member->tel }}</div>
                    </div>
                    <img src="{{ Storage::url($member->image) }}" alt="" class="mb-4">
                </article>
                <div class="flex flex-row text-center my-4">
                    <a href="{{ route('members.edit', $member) }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20 mr-2">編集</a>
                    <form action="{{ route('members.destroy', $member) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除" onclick="if(!confirm('削除しますか？')){return false};"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-20">
                    </form>
                </div>
            </div>
        </div>
</x-app-layout> --}}
