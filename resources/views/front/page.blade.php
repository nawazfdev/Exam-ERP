<!-- resources/views/front/page.blade.php -->
@include('front.resources.header')

@section('content')
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div> <!-- Use {!! !!} to render HTML content -->
@endsection
@include('front.resources.footer')
