<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    連絡先一覧
                </div>

                <div class="table-responsive">
                    <table class="table" style="mx-auto;">
                        <tr class="table-info">
                            <th scope="col" width="15%">#</th>
                            <th scope="col" width="20%">名前</th>
                            <th scope="col" width="30%">画像</th>
                            <th scope="col" width="15%">OPTION</th>
                        </tr>

                        @foreach ($members as $member)
                            <tr>
                                <th scope="row">{{ $member->id }}</th>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->image }}</td>
                                <td><a href="{{ route('members.show', $member) }}">
                                        <button type="button" class="btn btn-success">詳細</button>
                                    </a></td>
                            </tr>
                        @endforeach
                </div>
                {{-- {{ $members->links() }} --}}
            </div>
</x-app-layout>
