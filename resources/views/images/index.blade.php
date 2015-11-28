@extends('adminMaster')
@section('content')
  <div class="row">
    <div class="col-md-6">
      <h2>Izberite dogodek</h2>
      <select id="articleSection"  multiple class="form-control">
        @foreach ($articles as $article)
        <option value="{{$article->id}}">{{$article->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
      <h3>Dodaj slike za dogodek:</h3>
      <p id="articleName">Prosim najprej izberite ime dogodka nato dodajte slike</p>
      <form action="/admin/images" class="dropzone" id="my-dropzone" method="POST">
        {{ csrf_field() }}
      </form>
    </div>
    <div  class="col-md-12">
      <h2>Prikaži galerijo</h2>
      <b>ob kliku se slika izbriše</b>
      <div id="images" class="col-md-12"></div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/js/gallerys.js" type="text/javascript"></script>
@endsection
