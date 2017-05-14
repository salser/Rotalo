@extends('rotaloLayout')
@section('title')
  <title>Historial Trueques | {!! Auth::user()->username !!}</title>
@endsection
@section('content')
  <main>
    <h4>Historial de Trueques</h4>
    @foreach ($trueques as $t)
      <h6>holo</h6>
    @endforeach
  </main>
@endsection
