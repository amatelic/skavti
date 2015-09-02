@extends('adminMaster')

@section('content')
<h3>Dodaj uporabnika:</h3>
<button type="button" name="button" class="show-add-fields btn btn-info">Prikazi</button>

<form class="form-horizontal add-user">
  <div class="form-group">
    <label for="name" class="col-sm-1 control-label">Ime</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="name" placeholder="Prosim vpisite ime">
    </div>
  </div>
  <div class="form-group">
    <label for="username" class="col-sm-1 text-center control-label">Priimek</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="username" placeholder="Prosim vpisite primek">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-1 control-label">Email</label>
    <div class="col-sm-11">
      <input type="text" class="form-control" id="email" placeholder="Prosim vpisite email">
    </div>
  </div>
  <div class="form-group">
    <label for="role" class="col-sm-1 control-label">Veja:</label>
    <div class="col-sm-11">
      <select class="form-control">
          <option>IV</option>
          <option>PP</option>
          <option>SKVO</option>
        </select>
    </div>
  </div>
  <button type="button" class="btn btn-success center-block" name="add">Dodaj</button>
</form>
<form class="form-horizontal">
  <h3>Filtriraj uporabnike:</h3>
  <div class="form-group">
    <label for="filter" class="col-sm-1 control-label">Filter:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="filter" placeholder="Vpisi iskalno besedo">
    </div>
  </div>
</form>
  <table class="table table-bordered">
    <thead>
      <tr>
        <td>Id</td><td>Ime</td><td>Priimek</td><td>Veja</td><td>Spremeni</td><td>Izbriši</td>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->rights}}</td>
          <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Spremeni</button></td>
          <td><button type="button" id="delete" class="btn btn-danger" data-id="{{$user->id}}">Izbriši</button></td>
        <tr>
      @endforeach
    </tbody>
  </table>

@endsection

@section('script')
  <script src="/js/users.js" type="text/javascript"></script>
@endsection