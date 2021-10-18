<x-app-layout>
    <div class="container lg:w-1/2 md:w-4/5 w-11/12 mx-auto mt-8 px-8 bg-white shadow-md">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">新規登録</h2>
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
        <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data"
            class="rounded pt-3 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">お名前</label>
                <div class="col-sm-12">
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="form-control @if ($errors->has('name')) is-invalid @endif" id="inputName" placeholder="スパルタ 太郎" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">email</label>
                <div class="col-sm-12">
                    <input type="text" name="email" value="{{ old('email') }}"
                        class="form-control @if ($errors->has('email')) is-invalid @endif" id="inputName" placeholder="sparta@mail" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">tel</label>
                <div class="col-sm-12">
                    <input type="text" name="tel" value="{{ old('tel') }}"
                        class="form-control @if ($errors->has('tel')) is-invalid @endif" id="inputName" placeholder="000-0000-0000"
                        required>
                </div>
            </div>
            <div class="mb-4">
                <label for="inputName" class="col-sm-2 col-form-label">画像</label>
                <div class="col-sm-12">
                    <input type="file" name="image_id" class="border-gray-300">
                </div>
            </div>
                <div class="mb-4">
                    <input type="submit" value="登録"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                </div>
        </form>
    </div>
</x-app-layout>
