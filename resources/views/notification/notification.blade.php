@if ($message = Session::get('success'))
    <x-alert type="success" :message="$message"/>
    @if ($message = Session::get('file'))
        <x-alert type="success" :message="$message"/>
    @endif
@endif
@if ($message = Session::get('fail'))
    <x-alert type="danger" :message="$message"/>
@endif
<!-- lấy thông tin lỗi khi validate hiển thị trên màn hình -->
@if (count($errors) > 0)
    @foreach ($errors->all() as $message)
        <x-alert type="info" :message="$message"/>
    @endforeach
@endif
