<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    連絡先一覧
                </div>

                {{-- <div class="container mt-5">
                    <div class="row" style="padding-bottom: 30px; margin-left: 0px; margin-right: 15px;">
                        <div class="col-sm-10" style="padding-left:0;">
                            <form method="get" action="" class="form-inline">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control" value=""
                                        placeholder="検索キーワード">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="検索" class="btn btn-info"
                                        style="margin-left: 15px; color:white;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}


                <div class="table-responsive">
                    <table class="table" style="mx-auto;">
                        <tr class="table-info">
                            <th scope="col" width="10%">#</th>
                            <th scope="col" width="15%">名前</th>
                            <th scope="col" width="30%">Email</th>
                            <th scope="col" width="15%">TEL</th>
                            <th scope="col" width="30%" colspan="3">OPTION</th>
                        </tr>

                        @foreach ($members as $member)
                            <tr>
                                <th scope="row">{{ $member->id }}</th>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->email }}</td>
                                <td>{{ $member->tel }}</td>
                                <td><button type="button" class="btn btn-success">詳細</button></td>
                                <td><button type="button" class="btn btn-primary">編集</button></td>
                                <td><button type="button" class="btn btn-danger">削除</button></td>
                                {{-- <td><a href="/members/{{ $member->id }}">詳細</a></td>
                                <td><a href="/members/{{ $member->id }}/edit">編集</a></td>
                                <td>
                                    <form action="/members/{{ $member->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="削除する"
                                            onclick="if(!confirm('削除しますか？')){return false};">
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                </div>
                {{-- {{ $members->links() }} --}}
            </div>
</x-app-layout>
