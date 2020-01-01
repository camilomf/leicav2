@extends('layouts.inventario')

@section('indice')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Agregar Inventario</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> Hay problemas con tus entradas.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('inventory.store')}}" method="post">
            @csrf
            <div class="row">
              <div class="col-md-12">
                  <strong>Número de serie :</strong>
                  <input type="text" name="serialnumber" class="form-control" placeholder="" required='required'>
              </div>
              <div class="col-md-12">
                  <strong>SKU :</strong>
                  <input type="text" name="sku" class="form-control" placeholder="" required='required'>
              </div>
              <div class="col-md-12">
                  <strong>Precio (CLP):</strong>
                  <input type="number" name="price" class="form-control" placeholder="">
              </div>
              <div class="col-md-12">
                  <strong>Observación :</strong>
                  <textarea class="form-control" name="observation" rows="4" cols="80"></textarea>
              </div>

              <div class="col-md-12">
                      <strong>Lugar: </strong>
                      <select class="form-control" name="place_id">
                          {{-- <option value=''>No asignar lugar</option> --}}
                          @foreach ($places as $place)
                              <option value="{{$place->id}}">{{$place->name}}</option>
                          @endforeach
                      </select>
              </div>

              <div class="col-md-12">
                      <strong>Categoría: </strong>
                      <select class="form-control" name="category_id">
                          {{-- <option value=''>No asignar categoria</option> --}}
                          @foreach ($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                  </select>
              </div>

              <div class="col-md-12">
                  <strong>Modelo: </strong>
                  <select class="form-control" name="model_id">
                          {{-- <option value=''>No asignar modelo</option> --}}
                          @foreach ($models as $model)
                              <option value="{{$model->id}}">{{ $model->trademark->name }} {{$model->name}}</option>
                          @endforeach
                  </select>
              </div>

              <div class="col-md-12">
                      <strong>Plan de mantención: </strong>
                      <select class="form-control" name="maintenance_plan_id">
                              {{-- <option value=''>No asignar plan de mantencion</option> --}}
                              @foreach ($maintenance_plans as $maintenance_plan)
                                  <option value="{{$maintenance_plan->id}}">{{$maintenance_plan->name}}</option>
                             @endforeach
                  </select>
              </div>

            </div>
            <br>
            <div class="row">
                  <div class="col-md-12">
                          <a href="{{route('inventory.index')}}" class="btn btn-sm btn-outline-success">Atrás</a>
                          <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
                  </div>
            </div>
          </form>

  </div>
@endsection
