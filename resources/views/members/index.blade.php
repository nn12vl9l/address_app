<x-app-layout>
    <div class="container lg:w-3/5 md:w-4/5 w-11/12 mx-auto mt-8 px-0 bg-white shadow-md text-center ">
        <h2 class="text-center text-lg font-bold pt-6 tracking-widest">一覧画面</h2>

        <table class="table" style="mx-auto;">
            <tr class="table-info">
                <th scope="col" width="15%">#</th>
                <th scope="col" width="20%">名前</th>
                <th scope="col" width="30%">写真</th>
                <th scope="col" width="15%">OPTION</th>
            </tr>

            @foreach ($members as $member)
                <tr>
                    <th scope="row">{{ $member->id }}</th>
                    <td>{{ $member->name }}</td>
                    <td><img src="{{ $member->image_url }}" class="d-block mx-auto"></td>
                    <td><a href="{{ route('members.show', $member) }}">
                            <button type="button" class="btn btn-success">詳細</button>
                        </a></td>
                </tr>
            @endforeach
    </div>
    {{-- {{ $members->links() }} --}}
    </div>
</x-app-layout>
