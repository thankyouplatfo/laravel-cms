@extends('admin.template')
@section('breadcrumb')
    تعيين الصلاحيات إلى الأدوار
@endsection
@section('content')
    <div class="card">
        <form action="{{ route('permissions') }}" method="post">
            @csrf
            @method('post')
            <div class="card-header">
                <p>
                    <label class="w3-large w3-section" for="role_id">قائمة الأدورا</label>
                    <select class="role_id w3-select" name="role_id" id="role_id">
                        @include('lists.roles')
                    </select>
                </p>
            </div>
            <div class="card-body my-3">
                <div class="w3-row">
                    @foreach ($permissions as $per)
                        <p class="w3-col w3-right l4">
                            <label class="w3-large w3-section" for="{{ $per->title }}">
                                <input class="w3-check" name="permission[]" id="{{ $per->title }}" type="checkbox"
                                    value="{{ $per->id }}" {{ $per->roles()->find(1) ? 'checked' : '' }}>
                                {{ $per->desc }}
                            </label>
                            
                        </p>
                    @endforeach
                    <p class="w3-col">
                        <input class="w3-button w3-bat-item w3-left w3-light-blue" type="submit" value="تحديث">
                    </p>
                </div>
            </div>
        </form>

    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#role_id').on('change', function(event) {
                var role_id = $(this).val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('permission_byRole') }}",
                    type: 'post',
                    data: {
                        'id': role_id
                    },
                    success: function(data) {
                        $('input[type=checkbox]').each(function() {
                            var ThisVal = parseInt(this.value);
                            if (data.includes(ThisVal))
                                this.checked = true;
                            else
                                this.checked = false;
                        });
                    }
                })
            });
        });
    </script>
@endsection
