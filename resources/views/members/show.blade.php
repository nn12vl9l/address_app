{{-- <x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    連絡先詳細
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">お名前</label>
                    <div class="col-sm-10">{{ $member->name }}</div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">email</label>
                    <div class="col-sm-10">{{ $member->email }}</div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">tel</label>
                    <div class="col-sm-10">{{ $member->tel }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
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
</x-app-layout>
